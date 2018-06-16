<?php

class ExperienceController {

    public $title = "Experience";
    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function index() {
        $is_mobile = $this->is_mobile;

        include BASE_PATH . "/libs/hotjar.php";
        include BASE_PATH . "/libs/fb-chat.php";
        include BASE_PATH . "/libs/headcodes.php";

        $order_id = isset($_POST['otherid']) ? $_POST['otherid'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone1 = isset($_POST['phone']) ? $_POST['phone'] : '';
        $name1 = isset($_POST['name']) ? $_POST['name'] : '';


        $email = (isset($_SESSION['email']) && empty($email)) ? $_SESSION['email'] : $email;
        $order_id = (isset($_SESSION['order_id']) && empty($order_id)) ? $_SESSION['order_id'] : $order_id;
        $asin = isset($_SESSION['asin']) ? $_SESSION['asin'] : '';
        $shipped_date = isset($_POST['sdate']) ? $_POST['sdate'] : '';
        $purchasedate = isset($_POST['pdate']) ? $_POST['pdate'] : '';
        $promoid = isset($_POST['promoid']) ? $_POST['promoid'] : '';
        $productid = isset($_POST['productid']) ? $_POST['productid'] : '';
        $desc = isset($_SESSION['review']) ? $_SESSION['review'] : '';
        $like = isset($_SESSION['like']) ? $_SESSION['like'] : '';
        $rating = isset($_SESSION['rating']) ? $_SESSION['rating'] : '';
        $firsttime = isset($_SESSION['firsttime']) ? $_SESSION['firsttime'] : '-';
        ?>

        <?php include BASE_PATH . '/libs/progress-bar.php'; ?>

        <div class="row text-center" id="rating" style='margin-right:0px !important;'>
            <div class="col-lg-1 col-lg-offset-2 col-md-12 col-sm-12">
                <?php
                $img = IMG_URL . 'products/.png';

                if (file_exists(IMG_URL . 'products/' . $asin . '.png')) {
                    $img = IMG_URL . 'products/' . $asin . '.png';
                    ?>
                    <img class='pro_img' src="<?php echo $img; ?>" width="300" class="aligncenter size-medium wp-image-15551" />
                    <?php
                } else {
                    $img = IMG_URL . 'products/default.jpg';
                    ?>
                    <img class='pro_img' src="<?php echo $img; ?>" height="300" width="300" class="aligncenter size-medium wp-image-15551" />
                    <?php
                }
//                view
                require_once 'pages/experience/index.php';
                ?> 

                <script type="text/javascript">

                    var rbt_value = '';
                    var satisfied_btn_value = '';
                    var describe_value = '';

                    jQuery("#myrating").rateYo("option", "rating", <?= isset($_SESSION['like_val']) ? !empty($_SESSION['like_val']) ? $_SESSION['like_val'] : 0 : 0 ?>);

                    var fewSeconds = 10;
                    jQuery('#amazone_link').on("click", function (e) {
                        // Ajax request
                        var describe_value = jQuery("#describe").val();
                        jQuery("#describe").css("border", "none");
                        jQuery('#error_describe').html("");
                        if (describe_value.length >= 0 && describe_value.length < 20)
                        {
                            jQuery('#error_describe').html('');
                            jQuery("#describe").css("border", "1px solid red");
                            jQuery('#error_describe').html('Please describe more.');
                            jQuery('#error_describe').css("color", "red");
                            e.preventDefault();
                            return;
                        }
                        document.getElementById("amazon_anchor").click();
                        setTimeout(function () {
                            jQuery('#btn_submit').prop('disabled', false);
                            jQuery('#btn_submit').css('cursor', 'pointer');
                            jQuery('#btn_submit').css('background-color', '#462f28');
                            jQuery('#append_text').text('You may proceed to the final step!');

                            jQuery("#btn_submit").hover(function () {
                                jQuery(this).css("background-color", "#b6e000");
                            },
                                    function () {
                                        jQuery(this).css("background-color", "#462f28");
                                    }
                            );
                        }, fewSeconds * 1000);
                    });



                    jQuery(document).ready(function () {
                        rbt_value = '<?= $rating ?>';
                        satisfied_btn_value = '<?= $like ?>';
                        describe_value = '<?= addcslashes($desc) ?>';
                        firsttime = '<?= $firsttime ?>';
                        console.log(firsttime);
                        console.log(rbt_value);
                        console.log(satisfied_btn_value);
                        console.log(describe_value);
                        if (firsttime != '-')
                        {

                            btnEnable();
                        }
                    });

                    jQuery("#btn_submit").click(function (e) {

                        var describe_value = jQuery("#describe").val();
                        var $rateYo = jQuery("#myrating").rateYo();
                        var star_val = $rateYo.rateYo("rating");
                        //var star_val =jQuery('#myrating').rateYo("method", "rating");

                        if (!btnEnable())
                            e.preventDefault();

                        if (describe_value.length <= 0)
                        {
                            jQuery('#error_describe').html('Please describe first.');
                            jQuery('#error_describe').css("color", "red");

                            e.preventDefault();
                        } else if (describe_value.length > 0 && describe_value.length < 20)
                        {
                            jQuery('#error_describe').html('');
                            jQuery('#error_describe').html('Please describe more.');
                            jQuery('#error_describe').css("color", "red");
                            e.preventDefault();
                        }
                    });
                    jQuery(".rbt").click(function () {
                        rbt_value = parseInt(jQuery(this).data("value"));
                        jQuery('.rbt').html('');

                    });
                    jQuery(".satisfied").click(function () {
                        satisfied_btn_value = jQuery(this).data("value");
                        jQuery('.satisfied').html('');

                    });
                    jQuery("#describe").click(function () {
                        describe_value = jQuery(this).val();

                    });
                    jQuery("#describe").on('keyup', function () {
                        var $rateYo = jQuery("#myrating").rateYo();
                        var star_val = $rateYo.rateYo("rating");
                        console.log(star_val);
                        var describe_value = jQuery(this).val();
                        if (describe_value.length > 20 && star_val > 3)
                        {
                            jQuery('#error_describe').html('');
                        }

                    });
                    /**
                     * enable submit button
                     */
                    function btnEnable() {
                        var isValidated = true;
                        var $rateYo = jQuery("#myrating").rateYo();
                        var star_val = $rateYo.rateYo("rating");
                        console.log(star_val);
                        var describe_value = jQuery("#describe").val();


                        if (describe_value.length >= 0 && describe_value.length < 20)
                        {
                            jQuery("#describe").css("border", "1px solid red");
                            jQuery('#error_describe').html('');
                            jQuery('#error_describe').html('Please describe more.');
                            jQuery('#error_describe').css("color", "red");
                            return;
                        }

                        if (star_val > 3) {
                            if (describe_value.length > 20 && satisfied_btn_value != '')
                            {
                                var $rateYo = jQuery("#myrating").rateYo();
                                var star_val = $rateYo.rateYo("rating");
        //                console.log(star_val);
                                var satisfied_btn_value = star_val;
        //            console.log("tttttttgkfdg"+satisfied_btn_value);
                                jQuery.post("libs/ajax.php", {'action': 'rating', 'review': describe_value, 'like': satisfied_btn_value})
                                        .done(function (data) {
                                            if (satisfied_btn_value > 3)
                                            {
        //                                change
                                                window.location.href = '<?= BASE_URL ?>shipping-info/index/<?= $productid; ?>/<?= $promoid; ?>/<?= $purchasedate; ?>/<?= $shipped_date; ?>/<?= $asin; ?>/<?= $order_id; ?>/<?= $email; ?>/<?php echo $phone1; ?>/<?= $name1; ?>/' + satisfied_btn_value + "/" + describe_value;
                                            }
                                        });
                                jQuery('#counter').text('');

                            }
                        } else {

                            var $rateYo = jQuery("#myrating").rateYo();
                            var star_val = $rateYo.rateYo("rating");
                            var satisfied_btn_value = star_val;
                            jQuery.post("libs/ajax.php", {'action': 'rating', 'review': describe_value, 'like': satisfied_btn_value})
                                    .done(function (data) {
                                        if (satisfied_btn_value <= 3)
                                        {

                                            window.location.href = '<?= BASE_URL ?>shipping-info/index/<?php echo $productid; ?>/<?php echo $promoid; ?>/<?php echo $purchasedate; ?>/<?php echo $shipped_date; ?>/<?php echo $asin; ?>/<?php echo $order_id; ?>/<?php echo $email; ?>/<?php echo $phone1; ?>/<?php echo $name1; ?>';
                                                                    }
                                                                });
                                                        jQuery('#counter').text('');


                                                    }
                                                    return isValidated;
                                                }

                </script>
                <script type="text/javascript">
                    jQuery('#describe').keyup(function () {
                        //        var left = 50 - $(this).val().length;
                        //        if (left < 0) {
                        //            left = 0;
                        //        } else
                        //        {
                        //            //  $('#counter').text('Characters left: ' + left);
                        //        }
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
                </script>
                <?php
                return $this->title;
            }
        }