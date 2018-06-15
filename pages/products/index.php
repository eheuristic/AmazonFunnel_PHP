<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=2"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>products.css?ver=3">


    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'/>

    <?php // include BASE_PATH . '/libs/header-content.php'; ?>
    <?php include BASE_PATH . '/libs/progress-bar.php'; ?>

    <div class="row text-center">
        <div class="col-lg-10 col-lg-offset-1" id="product_main_title">
            What product you do want us to ship you?
        </div>
    </div>
    <div class="row">
        <!--change-->
        <!--<form action="experience/index/" action="post">-->
        <form action="<?= BASE_URL ?>experi/index" action="post">
            <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2" id="">
                <div class="row text-center">
                    <?php
                    $img = '';
                    $class = 12 / count($product_data);
                    for ($c = 0; $c < count($product_data); $c++) {
                        $checked = 'unchecked';
                        if (count($product_data) == 1) {
                            $checked = 'checked';
                        }
                        if (empty($product_data[$c]['asin']))
                            continue;
                        if (file_exists(IMG_URL . 'products/' . $product_data[$c]['asin'] . '.png')) {
                            $img = IMG_URL . 'products/' . $product_data[$c]['asin'] . '.png';
                            ?>
                            <div class="col-lg-<?= $class ?> col-md-12 col-sm-12">
                                <div class="row product_image_height">
                                    <img class='pro_img' data-delivery_date="<?php echo $product_data[$c]['delivery_date'] ?>" data-purchase_date="<?php echo $product_data[$c]['purchase_date'] ?>" data-promo_id="<?php echo $product_data[$c]['promo_id'] ?>" data-value="<?php echo $product_data[$c]['asin'] ?>" data-product_name="<?php echo $product_data[$c]['product_name'] ?>" data-order_id="<?php echo $product_data[$c]['order_id'] ?>" data-product_id="<?php echo $product_data[$c]['product_id'] ?>" data-asin="<?php echo $product_data[$c]['asin'] ?>" src="<?php echo $img; ?>" width="300" class="aligncenter size-medium wp-image-15551" />
                                </div>
                                <div class="row">
                                    <label class="product_name_style">
                                        <?php
                                        $temp_string = explode('-', $product_data[$c]['product_name']);
                                        echo $temp_string[0];
                                        ?>
                                    </label>
                                </div>
                                <div class="row">
                                    <input class="bottle_select" id="selected_<?php echo $product_data[$c]['product_id'] ?>" data-delivery_date="<?php echo $product_data[$c]['delivery_date'] ?>" data-purchase_date="<?php echo $product_data[$c]['purchase_date'] ?>" data-promo_id="<?php echo $product_data[$c]['promo_id'] ?>" data-value="<?php echo $product_data[$c]['asin'] ?>" data-product_name="<?php echo $product_data[$c]['product_name'] ?>" data-order_id="<?php echo $product_data[$c]['order_id'] ?>" data-product_id="<?php echo $product_data[$c]['product_id'] ?>" data-asin="<?php echo $product_data[$c]['asin'] ?>" name="rr" type="radio" <?= $checked ?> />
                                    <label for="selected_<?php echo $product_data[$c]['product_id'] ?>"><span></span></label>
                                </div>
                            </div>
                            <?php
                        } else {
                            $img = IMG_URL . 'products/default.jpg';
                            ?>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="row">
                                    <img class='pro_img' data-delivery_date="<?php echo $product_data[$c]['delivery_date'] ?>" data-purchase_date="<?php echo $product_data[$c]['purchase_date'] ?>" data-promo_id="<?php echo $product_data[$c]['promo_id'] ?>" data-value="<?php echo $product_data[$c]['asin'] ?>" data-product_name="<?php echo $product_data[$c]['product_name'] ?>" data-order_id="<?php echo $product_data[$c]['order_id'] ?>" data-product_id="<?php echo $product_data[$c]['product_id'] ?>" data-asin="<?php echo $product_data[$c]['asin'] ?>" src="<?php echo $img; ?>" width="200" class="aligncenter size-medium wp-image-15551" />
                                </div>

                                <div class="row">
                                    <input class="bottle_select" id="selected_<?php echo $product_data[$c]['product_id'] ?>" data-delivery_date="<?php echo $product_data[$c]['delivery_date'] ?>" data-purchase_date="<?php echo $product_data[$c]['purchase_date'] ?>" data-promo_id="<?php echo $product_data[$c]['promo_id'] ?>" data-value="<?php echo $product_data[$c]['asin'] ?>" data-product_name="<?php echo $product_data[$c]['product_name'] ?>" data-order_id="<?php echo $product_data[$c]['order_id'] ?>" data-product_id="<?php echo $product_data[$c]['product_id'] ?>" data-asin="<?php echo $product_data[$c]['asin'] ?>" name="rr" type="radio" <?= $checked ?> disabled/>
                                    <label for="selected_<?php echo $product_data[$c]['product_id'] ?>"><span></span></label>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-lg-offset-3"><span id="display_error"></span></div>        
                    <span id="img-val"></span>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6 col-md-11 col-sm-12 col-lg-offset-3">
                        <input class="btn btn-default" value="CHOOSE MY BOTTLE" id='submit_product' type="button"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php // include_once BASE_PATH . "/libs/footer.php"; ?>
    <!--change-->
    <!--<script src="jquery.min.js"></script>-->

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