<script src="https://use.fontawesome.com/dc6fe16a4a.js"></script>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>15-days-not-passed.css"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>

<?php
include BASE_PATH . "/libs/hotjar.php"; 
include BASE_PATH . "/libs/fb-chat.php";
include BASE_PATH . "/libs/headcodes.php";

$shipped_date = isset($_SESSION['delivery_date']) ? $_SESSION['delivery_date'] : '';
$shipped_date_new = '';
if ($shipped_date !== '' && !empty($shipped_date)) {
    $shipped_date_new = date('l M d Y', $shipped_date);
}
$order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
$asin = isset($_SESSION['asin']) ? $_SESSION['asin'] : '';
?>
      
    <body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')">
        <?php include BASE_PATH . '/libs/header-content.php'; ?>
        <?php include BASE_PATH . '/libs/progress-bar.php'; ?>
            <div class="row">

                <div class="col-md-12 days-text">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12 col-md-offset-1">
                        <div class="col-12 days-text">
                            Please come back in a few days
                        </div>
                        <div class="col-12 text-center days-head">
                            Our records indicate that this product was shipped less than 15 days ago
                        </div>
                        <div class="col-12 days-order">
                            Order #<?= $order_id ?><br/>Shipped on <?= $shipped_date_new ?>
                        </div>
                        <div class="col-12 days-details">
                            The conditions to qualify for our promotion are:
                            <span class="error"><br/>
                                • Have been actively using our product for 15 days or more.</span>
                            <br/>            
                            • Agree to send us your experience with product <br/>            
                            • Limited to one free bottle of each product per household <br/>            
                            • Only valid for customers that bought the product at full price at PotentOrganics.com or our Official Seller on Amazon.com
                        </div>
                        <div class="col-12 days-bottom">
                            But Don't Worry! Just come back in a few days and we will be able to process your request.
                        </div>
                    </div>
                    <div class="text-center col-sm-4  col-md-4 col-lg-4 col-xs-12 img-responsive" id="days-img">
                        <?php
                        if (file_exists(IMG_URL . 'products/' . $asin . '.jpg')) {
                            $img = IMG_URL . 'products/' . $asin . '.jpg';
                            ?>
                            <img style="padding-top:120px" class='pro_img' data-promo_id="" data-value="" data-product_name="" data-order_id="" data-product_id="" data-asin="" src="<?php echo $img; ?>" width="200" class="aligncenter size-medium wp-image-15551" />
                            <?php
                        } else {
                            $img = IMG_URL . 'products/default.jpg';
                            ?>
                            <img style="padding-top:120px" class='pro_img' data-promo_id="" data-value="" data-product_name="" data-order_id="" data-product_id="" data-asin="" src="<?php echo $img; ?>" height="300" width="300" class="aligncenter size-medium wp-image-15551" />
                            <?php
                        }
                        ?>
                    </div>
                </div>
                </div>
    <?php include_once BASE_PATH."/libs/footer.php"; ?>
          
          <style type="text/css">
            body {
                margin-left: 0px;
                margin-top: 0px;
            }

            .error {
                font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 16px; line-height: 22px; color: #FF4040; padding-top: 10px; padding-bottom:10px;
            }
        </style>
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
