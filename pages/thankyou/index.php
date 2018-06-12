<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>index.css?ver=1"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>thankyou.css?ver=1"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>

<?php $asin = isset($_GET['id']) ? $_GET['id'] : ''; ?>
<?php
    include BASE_PATH . "/libs/fb-chat.php";
    include BASE_PATH . "/libs/headcodes.php";
?>

    <body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')">
        <style>
            #bottle_margin img{
                width: 120px !important;
            }
            #bottle_margin img{
                width: 120px !important;
            }

            #bottle_marg img{
                width: 120px !important;
            }
            #bottle_marg{
                float: left;
                width: 14% !important;
            }
            #set1{
                display: inline;
            }
        </style>
                <?php include BASE_PATH . '/libs/header-content.php'; ?>

        <div class="col-12 text-center thank-text">
            Thank you! You all set now!
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center after_thank">
                Your free bottle will be shipped within 2 business days.<br/>We have sent you a confirmation email.
            </div>
        </div>
        <div class="col-12 text-center thank-image">
            <img id="img_size" src="<?= IMG_URL ?>mail-animation-po.gif" alt="thnakyou-msg" style="width:38%;" height="163">
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center checkout_div">
                <a class="checkout_link" href="https://www.amazon.com/s?marketplaceID=ATVPDKIKX0DER&me=A3IQVSGI7Y7CBO&merchant=A3IQVSGI7Y7CBO">Check Out All Our Products</a><br/> and Get 10% Off Your Next Purchase with Promo Code 6HJZ9UPY
            </div>
        </div>

        <div class="container">
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Purest-Organic-Chlorella-CGF-Non-Irradiated/dp/B0728KTHM4?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="<?= IMG_URL ?>products1/Chlorella.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Chlorella 600 mg</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Eco-Pure-Spirulina-500-Vegetarian-Non-Irradiated/dp/B0728KTLHF?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="<?= IMG_URL ?>products1/Spirulina.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Spirulina 500 mg</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/USDA-Organic-Apple-Cider-Vinegar/dp/B075CS379B?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img  src="<?= IMG_URL ?>products1/Apple.jpg" width="120" height="180"/></a><br/>
                <span id="margin_text">USDA Organic Apple Cider Vinegar</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Pure-Garcinia-Cambogia-Extract-Suppressant/dp/B00QKGAOSQ?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img  src="<?= IMG_URL ?>products1/Garcinia.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Garcinia Cambogia with 95% HCA</span>
            </div>
            <div  class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Premium-Krill-Oil-1000-Cardiovascular/dp/B00PPFOVKA?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="<?= IMG_URL ?>products1/Krill-Oil.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Krill Oil 1000 mg</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Potent-Organics-BioPerine;#%C2%AE-Standardized-Curcuminoids/dp/B0191KUOMI?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img  src="<?= IMG_URL ?>products1/Turmeric.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Turmeric Curcumin with BioPerine</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Potent-Organics-Green-Coffee-Extract/dp/B00TKHLQIO?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img  src="<?= IMG_URL ?>/products1/Green-Coffee.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Green Coffee Bean Extract</span>
            </div>

        </div>

        
        <div class="container">
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/L-Arginine-Essential-Amino-Vegetarian-Capsules/dp/B00PP8DVKS?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/L'Arginine.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">L-Arginine
</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Potent-Organics-Caralluma-Fimbriata-Extract/dp/B00NAYKLMA?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/Caralluma.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Caralluma Fimbriata 1200 mg
</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Bentonite-Cleanse-Bloating-Constipation-Energy/dp/B00PLCR1TK?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/Colon-Detox.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Colon Detox
</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Potent-Organics-Burpless-Optimized-430mg-180/dp/B01AQQ90YY?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/Omega-3.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Omega-3 860EPA/430DHA
</span>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Conjugated-Linoleic-Acid-Supplement-Metabolism/dp/B00PM1HSUW?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/CLA.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">CLA
</span>
            </div>
            <!--            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                            <a href="https://www.amazon.com/Potent-Organics-Chlorella-Broken-Powder/dp/B00PPBS81M?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/B00PPBS81M.jpg" width="180" height="180"/></a><br/>
                            <span id="margin_text">Potent-Organics-Chlorella-Broken-Powder</span>
                        </div>-->

            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a target="_blank" href="https://www.amazon.com/Potent-Organics-Phytoceramides-Ceramides-Strength/dp/B00IP0E0JE?m=A3IQVSGI7Y7CBO&s=merchant-items&ie=UTF8&qid=1511767877"><img src="../images/products1/Phytoceramides.jpg" width="180" height="180"/></a><br/>
                <span id="margin_text">Phytoceramids</span>
            </div>





            <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                <a href=""><img id="img_hover" src="<?= IMG_URL ?>products1/10off.jpg" width="120" height="180"/></a><br/>
                <span id="margin_text">Coupon Code - 6HJZ9UPY
</span>
            </div>

        </div>
        <!--    <div class="row">
                <div class="col-md-1 col-lg-1 col-sm-6 col-xs-12 text-center" id="bottle_margin">
                        <a href=""><img id="img_hover" src="../images/products1/10off.jpg" width="120" height="180"/></a><br/>
                        
                    </div>
            </div>-->
<?php include_once BASE_PATH."/libs/footer.php"; ?>
<!--<script src="jquery.min.js"></script>-->
<script>
        $.post("libs/ajax.php", {'action':'clear'})

        });</script>
<script type="text/javascript">
    function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr; for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
    }
    function MM_preloadImages() { //v3.0
    var d = document; if (d.images){ if (!d.MM_p) d.MM_p = new Array();
    var i, j = d.MM_p.length, a = MM_preloadImages.arguments; for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") != 0){ d.MM_p[j] = new Image; d.MM_p[j++].src = a[i]; }}
    }

    function MM_findObj(n, d) { //v4.01
    var p, i, x; if (!d) d = document; if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
    d = parent.frames[n.substring(p + 1)].document; n = n.substring(0, p); }
    if (!(x = d[n]) && d.all) x = d.all[n]; for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById) x = d.getElementById(n); return x;
    }

    function MM_swapImage() { //v3.0
    var i, j = 0, x, a = MM_swapImage.arguments; document.MM_sr = new Array; for (i = 0; i < (a.length - 2); i += 3)
            if ((x = MM_findObj(a[i])) != null){document.MM_sr[j++] = x; if (!x.oSrc) x.oSrc = x.src; x.src = a[i + 2]; }
    }
</script>