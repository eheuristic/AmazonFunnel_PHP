<script src="<?= JS_URL ?>jquery.rateyo.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>jquery.rateyo.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>progress-bar.css?ver=1"/>
<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>experience.css?ver=3"/>

</div>
<div class="col-lg-6 col-lg-offset-1 col-md-12 col-sm-12" style='padding-right:0px;'>
    <div class="col-lg-12" id="sub_title">
        Share Your Experience with Us!
    </div>
    <div class="row" id="left_first">
        Are you satisfied with our product?
    </div>
    <div class="row text-center">
        <div id="myrating" class="text-center"></div> 
        <!--	<fieldset class="starability-basic">
<input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

<input type="radio" id="rate1" name="rating" value="1" />
<label for="rate1">1 star.</label>

<input type="radio" id="rate2" name="rating" value="2" />
<label for="rate2">2 stars.</label>

<input type="radio" id="rate3" name="rating" value="3" />
<label for="rate3">3 stars.</label>

<input type="radio" id="rate4" name="rating" value="4" />
<label for="rate4">4 stars.</label>

<input type="radio" id="rate5" name="rating" value="5" />
<label for="rate5">5 stars.</label>
</fieldset> -->
    </div>
    <div class="row">
        <span id="error_exprience"></span>
    </div>
    <div class="row" id="describe_text">
        Describe how our product is working for you
    </div>
    <div class="col-lg-12 col-lg-offset-0 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
        <div>
            <textarea id='describe' class="textarea"  placeholder="please be specific and talk about the condition you had and how our product helped with that..."><?= $desc; ?></textarea>
        </div>
        <span id="counter"></span>
    </div>
    <div class="row text-center">
        <div id='error_describe'></div>
    </div>
    <div class="row text-center">
        <div id='error_ratting'></div>
    </div>
    <div class="col-lg-12 col-lg-offset-0 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-1" id="experience_clipboard">
        <div class="">
            <span class="clipboard"><a href="#" id="clipboard" class="clipboard">Copy to CLIPBOARD</a> and share on Amazon</span>
        </div>
    </div>

    <div class="col-lg-12 col-lg-offset-0 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1" id="share_btn">
        <div class="">
            <script type="text/javascript">

                jQuery("#myrating").rateYo({
                    fullStar: true,
                    starWidth: "60px",
                    normalFill: "#e1e1e1",
                    ratedFill: "#f39c12",
                    numStars: 5,
                    minValue: 0,
                    maxValue: 5,
                    precision: 1,
                    rating: 0, });
                jQuery("#myrating").rateYo().on("rateyo.set", function (e, data1) {
                    jQuery.post("libs/ajax.php", {'action': 'star_like', 'like_val': data1.rating})
                            .done(function (data) {
                                // jQuery('#amazont_btn').empty();
                                var asin = '<?= $_SESSION['asin'] ?>';
                                //var addresponse = '<button type="button" id="amazone_link">SHARE ON AMAZON</button>';
                                jQuery("#amazon_anchor").attr("href", "https://www.amazon.com/gp/customer-reviews/review-your-purchases?asins=" + asin + "%3A" + data1.rating + "#");
//                                            var addresponse = 'https://www.amazon.com/gp/customer-reviews/review-your-purchases?asins=' + asin + '%3A' + data1.rating + '#"><button type="button" id="amazone_link">SHARE ON AMAZON</button></a>';
                                //jQuery('#amazont_btn').append(addresponse);
                                jQuery("#amazone_link").removeAttr("style");
                            });
                    if (data1.rating > 3) {

                        jQuery('#share_btn').css("display", "block");
                        jQuery('#experience_clipboard').css("display", "block");
                    }
                    if (data1.rating <= 3) {
                        jQuery('#btn_submit').removeAttr("disabled");
                        jQuery('#share_btn').css("display", "none");
                        jQuery('#experience_clipboard').css("display", "none");
                        jQuery('#error_describe').html('');
                        jQuery('#describe').css('border', '1px solid white');

                    }
                });
                $("#clipboard").click(copyToClipboard);
                function copyToClipboard() {
                    var copyText = document.getElementById("describe");
                    copyText.select();

                    document.execCommand("Copy");
                    document.selection.empty();
                }
            </script>
            <?php @ $ratinglike = $_SESSION['like_val']; ?>

            <div id="amazont_btn"> 
                <button type="button" id="amazone_link" style="display: none;">SHARE ON AMAZON</button>
                <a id="amazon_anchor" target="_blank"> </a>
            </div>

<!--<button type="button" id="amazone_link"><a href=<?php // echo "https://www.amazon.com/gp/customer-reviews/review-your-purchases?asins=$asin%3A$ratinglike#";        ?>>SHARE ON AMAZON</a></button>-->
        </div>
    </div>
    <div id='append_text' class="clipboard" style="text-align: center!important;"></div>
    <div class="col-lg-12 col-lg-offset-0 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1" id='btn_parent_div' style=''>
        <div class="">
            <!--<button id="btn_submit" disabled="disabled" style="" >Continue</button>-->

            <input type="button" value="Continue" id='btn_submit' disabled="disabled"/>
        </div>
    </div>
</div>
</div>
<?php include_once BASE_PATH . "/libs/footer.php"; ?>


<!--<script src="jquery.min.js"></script>-->
