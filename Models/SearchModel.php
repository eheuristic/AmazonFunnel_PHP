<?php

class SearchModel {

    public function __construct() {
        
    }
    
    public function check_conditions($PurchaseDate, $min_date, $today_date, $EligibleDate, $promo_discount_temp, $maximum_discount_temp, $already_get_bottle) {
            //check_conditions(step3_1,step3_1,step3_2,step3_2,step4,step4,step5);
            /* STEP 3 START */
            if (strtotime($PurchaseDate) < strtotime($min_date)) {
                return 'true min date';
            } elseif (strtotime($today_date) < strtotime($EligibleDate)) {
                //echo $today_date."<br>";
                $eligibleday = date("m/d/Y", strtotime($EligibleDate));
                $_SESSION["EligibleDate"] = $eligibleday;
                return 'true eligibledate';
            }
            /* STEP 3 END */
            /* STEP 4 START */ elseif ($promo_discount_temp > $maximum_discount_temp || $promo_discount_temp != 0) {
                return 'true use promo';
            }

            /* STEP 4 END */
            /* STEP 5 START */ elseif (count($already_get_bottle) > 0) {
                return 'true already purchase';
            }
            /* STEP 5 END */ else {
                return 'false';
            }
    }

    public function index($order_data_all, $email, $phone, $dbh) {
        $i = 0; //added reference data
        $order_id = [];
       
        foreach ($order_data_all->ListOrdersResult->Orders->Order as $key => $value) {
            $i++;
            $data = array();
//                        $order_data = $order_data_all->ListOrdersResult->Orders->Order[$last_order - 1]; // 18-10-2017
            $order_data = $value;

            if ($order_data !== null && !empty($order_data)) {
                include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Model/ListOrderItemsRequest.php';
                include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Samples/ListOrderItemsSample.php';

                array_push($order_data, $order_data->AmazonOrderId);

                $request->setAmazonOrderId($order_data->AmazonOrderId); // 05-09-2017
    //                            $_SESSION['request_amazon_order_id'] = $request;

                $promotional_data_all = invokeListOrderItems($service, $request);
                $promotional_data_all_array[$i] = $promotional_data_all;
                if (count($promotional_data_all->ListOrderItemsResult) > 0) {
                    $date = new DateTime($order_data->PurchaseDate); // GET PURCHASE

                    /* STEP 3 START */

                    $days_ago = date('Y-m-d', strtotime('+7 days', strtotime($date->format('Y-m-d'))));

                    // CHECK ORDER MUST AFTER 01-09-2017
                    $min_date = new DateTime("2017-08-01");
                    $purchase_date = strtotime($order_data->PurchaseDate);

                    /* if (strtotime($date->format('Y-m-d')) < strtotime($min_date->format('Y-m-d'))) {
                      echo "<script type='text/javascript'>window.location.href = '15-days-not-passed.php?otherid=".$order_data->AmazonOrderId."&other=".$purchase_date."';</script>";
                      } */
                    // CHECK 15 DAYS TIME LIMIT

                    $today = new DateTime();
                    $asin = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->ASIN;
                    /* if (strtotime($today->format('Y-m-d')) < strtotime($days_ago)) 
                      {
                      $eligibleday =	date("m/d/Y", strtotime($days_ago));
                      $_SESSION["EligibleDate"] = $eligibleday;
                      echo "<script type='text/javascript'>window.location.href = 'step2-2.php?otherid=".$order_data->AmazonOrderId."&asin=".$asin."&other=".$purchase_date."';</script>";
                      } */
                    /* STEP 3 END */

                    /* STEP 4 START */
                    $asin = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->ASIN;
                    $name = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->Title;
                    $product_id = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->OrderItemId;
                    $promo_id = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->PromotionIds->PromotionId;
                    $product_amount = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->ItemPrice->Amount;
                    $promo_discount = $promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->PromotionDiscount->Amount;
                    $maximum_discount = 0;

                    if ($promo_discount > 0) {
                        $maximum_discount = ($product_amount * 33) / 100;
                    }
                    /* if ($promo_discount > $maximum_discount || $promo_discount != 0) {
                      echo "<script type='text/javascript'>window.location.href = 'error.php';</script>";
                      } */
                    /* STEP 4 END */

                    /* STEP 5 START */
                    $temp_order = json_decode(json_encode($order_data->AmazonOrderId), 1);
                    $temp_asin = json_decode(json_encode($promotional_data_all->ListOrderItemsResult->OrderItems->OrderItem->ASIN), 1);

                    $selc = "SELECT * FROM promo1 WHERE order_id='" . $order_data->AmazonOrderId . "' AND mail='" . $email . "' AND product_id='" . $product_id . "' AND phone='" . $phone . "' ORDER BY order_date DESC";
                    $allcat = $dbh->select($selc);

                    /* if (count($allcat) > 0) {
                      echo "<script type='text/javascript'>window.location.href = 'step_2_3.php?otherid=".$temp_order[0]."&other=".$purchase_date."&asin=".$temp_asin[0]."';</script>";
                      } */
                    /* STEP 5 END */

                    //check_conditions(step3_1,step3_1,step3_2,step3_2,step4,step4,step5);				
                    $error_array[] = SearchModel::check_conditions($date->format('Y-m-d'), $min_date->format('Y-m-d'), $today->format('Y-m-d'), $days_ago, $promo_discount, $maximum_discount, $allcat);

                    $_SESSION["asin"] = $temp_asin[0];
                    $_SESSION["order_id"] = $temp_order[0];
                    $_SESSION["purchase_date"] = $purchase_date;
                    // 13-09-2017 START
                    //echo "<script type='text/javascript'>window.location.href = 'products.php?id=" . $temp_asin[0] . "&otherid=" . $temp_order[0] . "&email=" . $email ."&phone=" . $phone . "&name=" . $firstname ."';</script>";
                    // 13-09-2017 END
                } else {
                    //echo "<script type='text/javascript'>window.location.href = 'error.php';</script>";
                    header("Location:../errors");
                    //                header("Location: error.php");//change [S-E] comment
                    exit;
                }
            } else {
                //echo "<script type='text/javascript'>window.location.href = 'error.php';</script>";
                //            header("Location: error.php");//change [S-E] comment
                header("Location:../errors");
                exit;
            }
        }// END FOREACH LOOP


        return [
            $error_array,
            $temp_asin,
            $temp_order,
            $email,
            $phone,
            $purchase_date,
        ];
    }

}
