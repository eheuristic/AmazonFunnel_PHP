<?php

class ProductsController{
    public $title = "Products";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        
                //getdata from url
                $DbCon = new DBConnection();
                $url_array = explode("/", $_SERVER['REQUEST_URI']);
                            //declare variable
                            $product_data = array();
                            $promotional_data_all = array();

                            $name = array();
                            $asin = array();
                            $order_data = array();
                            $product_id = array();
                            $promo_id = array();
                            $final_product_array = array();
                            $temp_order_array = array();

                            if(isset($_SESSION['like_val'])): unset($_SESSION['like_val']); endif;
                //$email = isset($_GET['email']) ? $_GET['email'] : '';
                $email = @$url_array[5];
                $email = (isset($_SESSION['email']) && empty($email)) ? $_SESSION['email'] : $email;

                //$phone1 = (isset($_GET['phone'])) ? $_GET['phone'] : '';
                $phone1 = @$url_array[6];
                $_SESSION['phone'] = $phone1; /* set session */

                $name1 = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';
                $purchase_date = '';    
                $delivery_date = '';
                $_SESSION['email'] = $email;
                $user_id = '';

                $email = str_replace("'", "", $email);
                $phone1 = str_replace("'", "", $phone1);
                //$order_id = str_replace("'", "", $order_id);
                $name1 = str_replace("'", "", $name1);
                $selc = "SELECT order_id,product_id,order_date,ASIN,mail FROM promo1";
                $allPro = $DbCon->select($selc);
                $allPro = json_decode(json_encode($allPro), 1);

                include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Samples/ListOrdersSample.php';
                include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Model/GetOrderResult.php';

                        $request->setBuyerEmail($email);
                    $order_data_all = invokeListOrders($service, $request);

                if (isset($order_data_all['status'])) {
                    //echo "<script type='text/javascript'>window.location.href = 'error.php?error=1';</script>";
                //    header("Location: error.php?error=1");
                    header("Location:" . BASE_URL . "errors");
                    exit;
                }
                if (count($order_data_all) > 0) {

                    include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Model/ListOrderItemsRequest.php';
                    include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Samples/ListOrderItemsSample.php';

                    for ($i = 0; $i < count($order_data_all); $i++) {

                        $orders = $order_data_all->ListOrdersResult->Orders->Order;
                //        if ($i == count($order_data_all)): exit; else: echo var_dump($orders);  endif; 
                        for ($k = 0; $k < count($orders); $k++) {
                            $request->setAmazonOrderId($orders[$k]->AmazonOrderId);
                            $promotional_data_all[] = invokeListOrderItems($service, $request);
                        }

                        $user_id = json_decode(json_encode($orders[$i]->MarketplaceId), 1);
                        $purchase_date = json_decode(json_encode($orders[$i]->PurchaseDate), 1);
                        $delivery_date = json_decode(json_encode($orders[$i]->EarliestShipDate), 1);
                        $shipping_address = json_decode(json_encode($orders[$i]->ShippingAddress), 1);
                        $promotional_data_all = json_decode(json_encode($promotional_data_all), 1);
                        $purchase_date_local = strtotime($purchase_date[0]);
                        $final_purchase_date = date('Y-m-d', $purchase_date_local);

                        $delivery_date_local = strtotime($delivery_date[0]);
                        $final_delivery_date = date('Y-m-d', $delivery_date_local);

                        for ($z = 0; $z < count($promotional_data_all); $z++) {
                    
                            $purchase_date_temp = json_decode(json_encode($orders[$z]->PurchaseDate), 1);
                            $purchase_date_local_temp = strtotime($purchase_date_temp[0]);
                            $final_purchase_date_temp = date('Y-m-d', $purchase_date_local_temp);

                            $delivery_date_temp = json_decode(json_encode($orders[$z]->EarliestShipDate), 1);
                            $delivery_date_local_temp = strtotime($delivery_date_temp[0]);
                            $final_delivery_date_temp = date('Y-m-d', $delivery_date_local_temp);
                //            $temp_product_id = $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['OrderItemId'];
                            $temp_product_id = $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['OrderItemId'];

                            if (!in_array($temp_product_id, @$temp_order_array[$z]) && isset($purchase_date[0]) && isset($delivery_date[0]) && array_key_exists('ASIN', $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'])) {
                                if (isset($purchase_date[0]) && isset($promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['PromotionIds']['PromotionId'])) {
                                    $temp_order_array[] = array(
                                        'delivery_date' => $final_delivery_date,
                                        'purchase_date' => $final_purchase_date_temp,
                                        'user_id' => $user_id[0],
                                        'promo_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['PromotionIds']['PromotionId'],
                                        'order_id' => $promotional_data_all[$z]['ListOrderItemsResult']['AmazonOrderId'],
                                        'product_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['OrderItemId'],
                                        'product_name' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['Title'],
                                        'asin' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['ASIN']
                                    );
                                    $promo_id[] = $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['PromotionIds']['PromotionId'];
                                } else {
                                    $temp_order_array[] = array(
                                        'delivery_date' => $final_delivery_date,
                                        'purchase_date' => $final_purchase_date_temp,
                                        'user_id' => $user_id[0],
                                        'promo_id' => '',
                                        'order_id' => $promotional_data_all[$z]['ListOrderItemsResult']['AmazonOrderId'],
                                        'product_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['OrderItemId'],
                                        'product_name' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['Title'],
                                        'asin' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']['ASIN']
                                    );
                                    $promo_id[] = '';
                                }
                            } // END IF
                            elseif (!in_array($temp_product_id, $temp_order_array[$z]) && isset($purchase_date[0]) && isset($delivery_date[0]) && (array_key_exists('0', $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']))) {
                                $total_sub_orders = count($promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem']);
                                for ($y = 0; $y < $total_sub_orders; $y++) {
                                    if (isset($promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['PromotionIds']['PromotionId'])) {
                                        //echo "inner if";echo "<br>";
                                        $temp_order_array[] = array(
                                            'delivery_date' => $final_delivery_date,
                                            'purchase_date' => $final_purchase_date_temp,
                                            'user_id' => $user_id[0],
                                            'promo_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['PromotionIds']['PromotionId'],
                                            'order_id' => $promotional_data_all[$z]['ListOrderItemsResult']['AmazonOrderId'],
                                            'product_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['OrderItemId'],
                                            'product_name' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['Title'],
                                            'asin' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['ASIN']);
                                        $promo_id[] = $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['PromotionIds']['PromotionId'];
                                    } else {
                                        //echo "inner else";echo "<br>";
                                        $temp_order_array[] = array(
                                            'delivery_date' => $final_delivery_date,
                                            'purchase_date' => $final_purchase_date_temp,
                                            'user_id' => $user_id[0],
                                            'promo_id' => '',
                                            'order_id' => $promotional_data_all[$z]['ListOrderItemsResult']['AmazonOrderId'],
                                            'product_id' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['OrderItemId'],
                                            'product_name' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['Title'],
                                            'asin' => $promotional_data_all[$z]['ListOrderItemsResult']['OrderItems']['OrderItem'][$y]['ASIN']);
                                        $promo_id[] = '';
                                    }
                                } // END FOR LOOP $y
                            } // END ELSEIF
                        } // END FOR LOOP $z
                        
                        if (count($shipping_address) > 0) {
                            $_SESSION['AddressLine1'] = $shipping_address['AddressLine1'];
                            $_SESSION['City'] = $shipping_address['City'];
                            $_SESSION['name'] = $shipping_address['Name'];
                            $_SESSION['StateOrRegion'] = $shipping_address['StateOrRegion'];
                            $_SESSION['PostalCode'] = $shipping_address['PostalCode'];
                        }
                    }
                    /* echo "<pre>";
                      echo "temp Data::::::::::::::::::";
                      print_r($temp_order_array);
                      echo "</pre>";
                     */
                    foreach ($temp_order_array as $key => $value) {
                        $temp_product_id = $temp_order_array[$key]['product_id'];
                        $temp_asin = $temp_order_array[$key]['asin'];
                        $temp_order_id = $temp_order_array[$key]['order_id'];
                        $puchase_date_plus_15_day = date('Y-m-d', strtotime('+14 days', strtotime($temp_order_array[$key]['purchase_date'])));

                        $today = new DateTime();

                        if (in_array($temp_product_id, array_column($temp_order_array[$key], 'product_id'))) {
                            unset($temp_order_array[$key]);
                        }
                        if ($temp_order_array[$key]['purchase_date'] == '1970-01-01') {
                            unset($temp_order_array[$key]);
                        }
                        if (in_array($temp_product_id, array_column($allPro, 'product_id')) && in_array($email, array_column($allPro, 'mail')) && in_array($temp_asin, array_column($allPro, 'ASIN')) && in_array($temp_order_id, array_column($allPro, 'order_id'))) {
                            unset($temp_order_array[$key]);
                        }
                        if (strtotime($puchase_date_plus_15_day) < strtotime($today->format('Y-m-d'))) {

                        } else {
                            unset($temp_order_array[$key]);
                        }
                    }
                }
                /* echo "<pre>";
                  echo "after temp Data::::::::::::::::::";
                  print_r($temp_order_array);
                  echo "</pre>"; */
                $temp_order_array = array_values($temp_order_array);
                $asins = array();
                $index = 0;
                foreach ($temp_order_array as $product) {

                    if (in_array($product['asin'], $asins)) {
                        unset($temp_order_array[$index]);
                    } else
                        $asins[] = $product['asin'];
                    $index++;
                }
                $product_data = $temp_order_array;
                //exit;
                if (count($product_data) <= 0) {
                    //echo "<script type='text/javascript'>window.location.href = 'step_2_3.php';</script>";
                    header("Location:../not-eligible");
                    exit;
                }
                

            include BASE_PATH . "/libs/hotjar.php";
            include BASE_PATH . "/libs/fb-chat.php";
            include BASE_PATH . "/libs/headcodes.php";
        require_once 'pages/products/index.php';
        return $this->title;
    }
}