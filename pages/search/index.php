    <div class="row">
        <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 col-xs-12  ">
            <div class="wait" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 20px; line-height: 22px; color:#b6e000; padding-top: 100px;">
                Please wait a few seconds...
            </div>
            <div class="search_db" style="text-align:left; font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:30px; color:#462f28; font-weight: 700; line-height:46px;">
                We are searching for your email in our database
            </div>
            <div class="search_content" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; line-height: 22px; color:#462f28; padding-top: 10px; padding-bottom:10px;">
                <span style="font-weight:800;">Please note that the conditions to qualify for our promotion are:</span><br/>
                &#8226; Have been actively using our product for 15 days or more<br/>
                &#8226; Agree to share your experience with the product&nbsp;<br/>
                &#8226; Limited to one free bottle of each product per one Amazon account and household&nbsp;<br/>
                &#8226; Valid only for customers that bought the product at full price at Official Seller on Amazon.com
            </div>

        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="gif" style="width:454;margin-top: 5%!important;">
                <img class="gif" src="<?= IMG_URL ?>search\search.gif" width="300" height="297" style="margin-top: 15%!important; "/>
            </div>
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

<?php
// Get form submitted value (Get method)
