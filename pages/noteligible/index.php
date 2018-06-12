<?php
    $shipped_date = isset($_SESSION['purchase_date']) ? $_SESSION['purchase_date'] : '';
    $shipped_date_new = '';
    if ($shipped_date !== '' && !empty($shipped_date)) {
        $shipped_date_new = date('l M d Y', $shipped_date);
    }
    $order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
    $asin = isset($_SESSION['asin']) ? $_SESSION['asin'] : '';
?>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>noteligible/step_2_3.css?ver=2"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>
<?php 
    include BASE_PATH . "/libs/hotjar.php";
    include BASE_PATH . "/libs/fb-chat.php";
?>
<body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png', 'request-2-3-hover.png')">
    <?php include BASE_PATH . '/libs/header-content.php'; ?>
        <style>
        .title{
           font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; 
           font-weight: 400; 
           font-size: 20px; 
           line-height: 22px; 
           color:red; 
           padding-top: 40px;
           text-align:center; 
           text-transform:uppercase;
       }
       .reminder{
           font-family: Lato, Helvetica Neue, Helvetica, Arial, sans-serif;
           font-weight: 400;
           font-size: 18px;
           line-height: 20px;
           color: #462f28;
           padding:12px;
       }
       .request{
           text-align:center; font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:36px; color:#462f28; font-weight: 700; line-height:46px; text-transform:uppercase;
       }
       input[type="text"], select {
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 3px solid rgba(255, 255, 255, 0);
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16pt;
        color: #b6e000;
        background-color: #EAEAEA;
        }
        input[type="submit"] {
            width: 40%;
            background-color: #F00;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20pt;
        }
        input[type=submit]:hover {
           background-color: #B6E000;
        }
        .note{
           font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;  font-size: 10px; line-height: 14px; color:#462f28;
        }
        @media only screen and (max-width: 480px) {
            input[type="submit"],input[type="text"] {
               width:80%;
           }	
        }
    </style>
    
    <div class="row">

        <div class="col-lg-12 text-center">
            <div class="title ">You are not eligible for a free bottle yet.</div>
            <div class="request">Please come back in a few days </div>
            <span style="font-size:18px; line-height: 38px; text-transform:none; font-weight: 400;">To be qualified for the promotion, you should be actively using our product for 15 days or more.</span>

        </div>
        <div class="text-center" id="step23_img">
            <?php
            if (file_exists(SITE_PATH . '<?= IMG_URL ?>products/' . $asin . '-free.png')) {
                $img = '<?= IMG_URL ?>products/' . $asin . '-free.png';
                ?>
                <img style="padding-top:20px" class='pro_img' data-promo_id="" data-value="" data-product_name="" data-order_id="" data-product_id="" data-asin="" src="<?php echo $img; ?>" width="300" class="aligncenter size-medium wp-image-15551" />
                <?php
            } else {
                $img = IMG_URL.'products/default.jpg';
                ?>
                <img style="padding-top:20px" class='pro_img' data-promo_id="" data-value="" data-product_name="" data-order_id="" data-product_id="" data-asin="" src="<?php echo $img; ?>" width="300" class="aligncenter size-medium wp-image-15551" />
                <?php
            }
            ?>
        </div>
        <div class="row col-lg-12 text-center">
            <p class="reminder">Get a reminder as soon as you become eligible</p>
        </div>
        <div class="row col-lg-12 text-center">			
            <form action="#">
                <?php $email = isset($_SESSION['email'])?$_SESSION['email']:""; ?>

                <input id="email" name="email" placeholder="Email Address" type="text" value="<?=$email?>"><br/>
                <input value="Remind Me!" type="submit">
            </form>
        </div>			
        <div class="row col-lg-12 text-center">			
           <p class="note">*Your personal information will not be shared with anyone. For more information check our customer protection <a href="#">privacy policy</a>.</p>
       </div>

   </div>
    <?php include_once BASE_PATH."/libs/footer.php"; ?>
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