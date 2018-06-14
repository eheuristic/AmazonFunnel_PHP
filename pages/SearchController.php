<?php

include_once "/Models/SearchModel.php";

class SearchController {

    public $title = "Potent Organics";
    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function index() {
        $is_mobile = $this->is_mobile;

        include BASE_PATH . "/libs/hotjar.php";
        include BASE_PATH . "/libs/fb-chat.php";
        ?>
        <?php
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

                        include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Samples/ListOrdersSample.php';
                        include_once BASE_PATH . '/libs/MarketplaceWebServiceOrders/Model/GetOrderResult.php';
                        $request->setBuyerEmail($email);

                        //$order_data_all = ;
                        $_SESSION['order_data_all'] = invokeListOrders($service, $request);
                        $order_data_all = $_SESSION['order_data_all'];

                        $last_order = count($order_data_all->ListOrdersResult->Orders->Order);

                        

        if ($last_order > 0) {

            //declare
            $error_array = array();
            $rslt = SearchModel::index($order_data_all,$email,$phone,$dbh);
                $error_array = $rslt[0];
                $temp_asin = $rslt[1];
                $temp_order = $rslt[2];
                $email = $rslt[3];
                $phone = $rslt[4];
                $purchase_date = $rslt[5];
            
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
                header("Location:../products/index/" . $temp_asin[0] . "/" . $temp_order[0] . "/" . $email . "/" . $phone . "/" . $firstname);
            } else {
                //echo "<script type='text/javascript'>window.location.href = 'step_2_3.php?otherid=" . $temp_order[0] . "&other=" . $purchase_date . "&asin=" . $temp_asin[0] . "';</script>";
                ?><!--change--> <?php
                //        header("Location: step_2_3.php?otherid=" . $temp_order[0] . "&other=" . $purchase_date . "&asin=" . $temp_asin[0] . "");//change [S-E] comment
                header("Location:../not-eligible/index/" . $temp_order[0] . "/" . $purchase_date."/".$temp_asin[0]);
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
            header("Location:../re-enter-email/index/" . $firstname . "/" . $phone);
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
