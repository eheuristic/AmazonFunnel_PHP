<?php
include_once '/Models/ProductsModel.php';

class ProductsController {

    public $title = "Products";
    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function index() {
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

        if (isset($_SESSION['like_val'])): unset($_SESSION['like_val']);
        endif;
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
//        // remove
//                                                                                                            echo '<pre>';
//                                                                                                            echo $order_data_all['status'];
//                                                                                                            echo '</pre>';
//                                                                                                            exit;
        if (isset($order_data_all['status'])) {
            //echo "<script type='text/javascript'>window.location.href = 'error.php?error=1';</script>";
            //    header("Location: error.php?error=1");
            header("Location:" . BASE_URL . "errors/index/1");
//            echo "error";
            exit;
        } else {
            
        }
        
            $rslt = ProductsModel::getProductData($order_data_all,$temp_order_array,$email,$allPro);
            $product_data = $rslt[0];
            
        if (count($product_data) <= 0) {
            //echo "<script type='text/javascript'>window.location.href = 'step_2_3.php';</script>";
            header("Location:../not-eligible");
            exit;
        }


        include BASE_PATH . "/libs/hotjar.php";
        include BASE_PATH . "/libs/fb-chat.php";
        include BASE_PATH . "/libs/headcodes.php";
        require_once 'pages/products/index.php';
        ?>
        <script>

            var window_width = screen.width;
            console.log(window_width);
            var asin = '';
            var order_id = '';
            var product_id = '';
            var product_name = '';
            var promo_id = '';
            var delivery_date = '';
            var purchase_date = '';
            var email = '';
            var user_name = '';
            var phone = '';
            var checkbox_id = '';
            $("#submit_product").click(function (e) {
                if ($('#img-val').val() == '')
                {
                    e.preventDefault();
                    $('#display_error').html("Please Select Product!");
                    $('#display_error').css("color", "red");
                } else {
                    $('#display_error').html("");
                    //            change
                    window.location.href = "<?= BASE_URL ?>experience/index/";
                }
            });
            $("input[id^=selected]").click(function (e) {
                $('#display_error').html("");
                $('#img-val').val('132');
                asin = $(this).data("asin");
                order_id = $(this).data("order_id");
                product_id = $(this).data("product_id");
                product_name = $(this).data("product_name");
                promo_id = $(this).data("promo_id");
                delivery_date = $(this).data("delivery_date");
                purchase_date = $(this).data("purchase_date");
                email = '<?php echo $email; ?>';
                user_name = '<?php echo $name1; ?>';
                phone = '<?php echo $phone1; ?>';
                console.log(purchase_date);
                //        change
                $.post("/libs/ajax.php", {'action': 'product_data', 'phone': phone, 'user_name': user_name, 'email': email, 'asin': asin, 'order_id': order_id, 'product_id': product_id, 'product_name': product_name, 'promo_id': promo_id, 'delivery_date': delivery_date, 'purchase_date': purchase_date})
                        .done(function (data) {
                            console.log(data);
                        });

            });
            $(document).ready(function () {
                if ($('.bottle_select').is(':checked'))
                {
                    checkbox_id = $('.bottle_select').attr('id');
                    console.log('ajax_call_success.');
                    console.log(checkbox_id);
                    $("#" + checkbox_id).trigger("click");
                }
            });
        </script>
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
        </script> <?php
        return $this->title;
    }

}

