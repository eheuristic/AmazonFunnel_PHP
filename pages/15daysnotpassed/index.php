<script src="https://use.fontawesome.com/dc6fe16a4a.js"></script>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>15-days-not-passed.css"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>

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

<style type="text/css">
    body {
        margin-left: 0px;
        margin-top: 0px;
    }
    .error {
        font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 16px; line-height: 22px; color: #FF4040; padding-top: 10px; padding-bottom:10px;
    }
</style>

