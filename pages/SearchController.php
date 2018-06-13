<?php

class SearchController{
    public $title = "Potent Organics";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        
                    include BASE_PATH . "/libs/hotjar.php"; 
            include BASE_PATH . "/libs/fb-chat.php"; ?>
            <body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')">
                <link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=2"/>
                <link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>index.css?ver=1">
                <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700" rel="stylesheet" type="text/css"/>
                <?php include BASE_PATH . '/libs/header-content.php'; 
                      include BASE_PATH . '/libs/progress-bar.php';

        require_once 'pages/search/index.php';
                $firstname = @$_POST['firstname'];
//                $firstname;
//                nl2br("\n");


                $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
//                $lastname;
//                nl2br("\n");

                $email = $_POST['email'];
//                $email;
//                nl2br("\n");

                $phone = @$_POST['phone'];
//                $phone;
//                nl2br("\n");
                global $dbh;
                if (empty($phone) || empty($email)) {
                    header("Location:../errors/index/3");
                    exit;
                }
                $data['firstname'] = $dbh->sqlsafe($firstname);
                $data['lastname'] = $dbh->sqlsafe($lastname);
                $data['email'] = $dbh->sqlsafe($email);
                $data['phone'] = $dbh->sqlsafe($phone);
                $data['created_at'] = $dbh->sqlsafe(date('Y-m-d h:i:s'));
                
//                insert data to user_info table
                $dbh->insert('user_info', $data);
                // Starting session
                //@session_start();
                // Storing session data
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["email"] = $email;
                $_SESSION["phone"] = $phone;
                $_SESSION["desc"] = '';
                include_once BASE_PATH.'/libs/MarketplaceWebServiceOrders/Samples/ListOrdersSample.php';
                include_once BASE_PATH.'/libs/MarketplaceWebServiceOrders/Model/GetOrderResult.php';
                $request->setBuyerEmail($email);
                
//                $session_data->request_buyer_email = $request; //added reference data
                //$order_data_all = ;
                $_SESSION['order_data_all']=invokeListOrders($service, $request);
                $order_data_all = $_SESSION['order_data_all'];
                $session_data['order_data_all'] = $order_data_all; //added reference data
                
                $last_order = count($order_data_all->ListOrdersResult->Orders->Order);
                $session_data['last_order'] = $last_order;//added reference data
                
                $_SESSION['customer_details'] = $session_data; //added reference data

                                function check_conditions($PurchaseDate, $min_date, $today_date, $EligibleDate, $promo_discount_temp, $maximum_discount_temp, $already_get_bottle) {
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

                
                if ($last_order > 0) {
                    
                    //declare
                    $error_array = array();
                    $i = 0;//added reference data
                    foreach ($order_data_all->ListOrdersResult->Orders->Order as $key => $value) {
                       $i++;
                        $data = array();
//                        $order_data = $order_data_all->ListOrdersResult->Orders->Order[$last_order - 1]; // 18-10-2017
                        $order_data = $value;

                        if ($order_data !== null && !empty($order_data)) {
                            include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Model/ListOrderItemsRequest.php';
                            include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Samples/ListOrderItemsSample.php';
                            
                            
                            $request->setAmazonOrderId($order_data->AmazonOrderId); // 05-09-2017
//                            $_SESSION['request_amazon_order_id'] = $request;
//                            $OrderDataAll->$i->request_amazon_order_id = $request;//added reference data
                            
                            $promotional_data_all = invokeListOrderItems($service, $request);
                            $OrderDataAll[$i]['list_order_items'] = $request;//added reference data
//                            $_SESSION['order_promational_data_all'] = $request;
                            
                            
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
                                $error_array[] = check_conditions($date->format('Y-m-d'), $min_date->format('Y-m-d'), $today->format('Y-m-d'), $days_ago, $promo_discount, $maximum_discount, $allcat);

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
                    $_SESSION['OrderDataAll'] = $OrderDataAll;//added reference data
                    if (in_array("false", $error_array)) {
                        //echo "<script type='text/javascript'>window.location.href = 'products.php?id=" . $temp_asin[0] . "&otherid=" . $temp_order[0] . "&email=" . $email . "&phone=" . $phone . "&name=" . $firstname . "';</script>";
                        ?><!--change--> <?php
                            



    //tesing for data storing session purpose for calling api only once                      
////$url_ar= explode("/", $_SERVER['REQUEST_URI']);
////if($url_ar[1] == 'search'):
//    echo '<pre>';
//    echo var_dump($_SESSION);
//    echo '</pre>';
//                if(isset($_SESSION['order_data_all'])):
//                    echo "<script>alert('true');</script>";
//                elseif(isset($_SESSION['customer_details'])):
//                    echo "<script>alert('true');</script>";
//                else:
////                    $order_data_all = $_SESSION['customer_details']['order_data_all'];
//                    echo "<script>alert('false');</script>";
//                endif;
//                exit;
////endif;
                        
                //        header("Location:../products.php?id=" . $temp_asin[0] . "&otherid=" . $temp_order[0] . "&email=" . $email . "&phone=" . $phone . "&name=" . $firstname . "");//change [S-E] comment
                        header("Location:../products/index/" . $temp_asin[0] . "/" . $temp_order[0] . "/" . $email . "/" . $phone . "/" . $firstname );

                    } else {
                        //echo "<script type='text/javascript'>window.location.href = 'step_2_3.php?otherid=" . $temp_order[0] . "&other=" . $purchase_date . "&asin=" . $temp_asin[0] . "';</script>";
                        ?><!--change--> <?php
                //        header("Location: step_2_3.php?otherid=" . $temp_order[0] . "&other=" . $purchase_date . "&asin=" . $temp_asin[0] . "");//change [S-E] comment
                        header("Location:../not-eligible");
                        exit;
                    }
                } else {
                //            sleep(15);
                    //echo "<script type='text/javascript'>window.location.href = 're-enter-email.php?firstname=$firstname&phone=$phone';</script>";
                        ?><!--change--> <?php
                //    header("Location: re-enter-email.php?firstname=$firstname&phone=$phone");
                //        if(!isset($_SESSION)): session_start(); endif;
                //        $_SESSION['firstname']=$firstname;
                //        $_SESSION['phone'] = $phone;
                    header("Location:../re-enter-email/index/".$firstname."/".$phone);
                    exit;
                }


                ?>
                <script type="text/javascript">
                    function MM_swapImgRestore() { //v3.0
                        var i, x, a = document.MM_sr;
                        for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++)
                            x.src = x.oSrc;
                    }
                    function MM_preloadImages() { //v3.0
                        var d = document;
                        if (d.images) {
                            if (!d.MM_p)
                                d.MM_p = new Array();
                            var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
                            for (i = 0; i < a.length; i++)
                                if (a[i].indexOf("#") != 0) {
                                    d.MM_p[j] = new Image;
                                    d.MM_p[j++].src = a[i];
                                }
                        }
                    }

                    function MM_findObj(n, d) { //v4.01
                        var p, i, x;
                        if (!d)
                            d = document;
                        if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                            d = parent.frames[n.substring(p + 1)].document;
                            n = n.substring(0, p);
                        }
                        if (!(x = d[n]) && d.all)
                            x = d.all[n];
                        for (i = 0; !x && i < d.forms.length; i++)
                            x = d.forms[i][n];
                        for (i = 0; !x && d.layers && i < d.layers.length; i++)
                            x = MM_findObj(n, d.layers[i].document);
                        if (!x && d.getElementById)
                            x = d.getElementById(n);
                        return x;
                    }

                    function MM_swapImage() { //v3.0
                        var i, j = 0, x, a = MM_swapImage.arguments;
                        document.MM_sr = new Array;
                        for (i = 0; i < (a.length - 2); i += 3)
                            if ((x = MM_findObj(a[i])) != null) {
                                document.MM_sr[j++] = x;
                                if (!x.oSrc)
                                    x.oSrc = x.src;
                                x.src = a[i + 2];
                            }
                    }
            </script>

                <?php
        
        return $this->title;
    }
}