<!--remove css-->
<body>
    <link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>index.css?ver=6">
    
<?php echo ($is_mobile == "true") ? "<style> body{background-size: 100% 144% !important;} </style>" : ""; ?>
<?php 
session_destroy();
session_start();

//include BASE_PATH . '/libs/header-content.php'; ?>
<style type="text/css">

    @-ms-viewport{
        width: device-width;
    }

    <?php
    if ($is_mobile == "false") {
        ?>
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-image: url(<?= IMG_URL ?>backgroundnew2.jpg);
            background-position:top;
            background-repeat:no-repeat;
            /*background-size: 100%; //added*/
        }
        <?php
    } else {
        ?>
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-image: url(<?= IMG_URL ?>backgroundnew3.jpg);
            background-position:top;
            background-repeat:no-repeat;
        }
        <?php
    }
    ?>

    a:link {
        color: #462F29;
        text-decoration: underline;
    }
    a:visited {
        text-decoration: underline;
        color: #462F27;
    }
    a:hover {
        text-decoration: none;
        color: #B7E101;
    }
    a:active {
        text-decoration: underline;
        color: #462F29;
    }

    input  {
        color: rgb(191, 191, 191);
    }

    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 3px solid rgba(255, 255, 255, 0);
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 18pt;
        color: #b6e000;
        background-color: rgba(255, 255, 255, 0.5);
    }

    input[type=text]:focus {
        border: 3px solid #b6e000 !important; 
    } 

    input[type=submit] {
        width: 100%;
        background-color: #F00;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16pt;
    }

    input[type=submit]:hover {
        background-color: #452F27;
    }

    .div {
        border-radius: 5px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
    }

    .header-heading {text-shadow: 2px 2px 4px #462f28; color: #b6e000}

    .frame {
        height: 200px;
        width: 200px;
        overflow: hidden;
    }

    .zoomin img {
        height: 200px;
        width: 200px;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;
    }
    .zoomin img:hover {
        width: 210px;
        height: 210px;
    }

    .stitched {
        padding: 20px;
        line-height: 1.3em;
        border: 2px dashed #fff;
        border-radius: 10px;
    }

    .stitched:hover {
        padding: 20px;
        line-height: 1.3em;
        border: 2px dashed #b6e000;
        border-radius: 10px;
        background:#FFF;
    }

    .videobackground { height: 600px; position:fixed; z-index:-100;}

    #video-background {
        /*  making the video fullscreen  */
        right: 0; 
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        width: auto; 
        height: auto;
        z-index: -100;
    }

    .copyright-container{
        box-sizing: border-box;
        padding-right:20px;padding-left:20px;
        font-family: arial;
        text-align: center;
        position:absolute;
        font-size: 12px;
        bottom:0;
        width:100%;
        height:35px;				bottom:-105px;
        color: #462f28; }


</style>

<?php
if ($is_mobile == 'false') {

    ?>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" valign="middle" style="background:white;"><table width="1000" border="0">
                    <tr>
                        <td width="743" rowspan="2" valign="bottom"><img src="<?= BASE_URL."images/" ?>logo-header-01.png" width="399" height="81" /></td>
                        <td width="39" height="40" align="center" valign="bottom" style="font-family:arial; font-size:18px; color:#462f28;"><img src="<?= BASE_URL."images/" ?>phone.png" width="30" height="30" /></td>
                        <td width="204" align="left" valign="bottom" style="text-align:left; font-family:arial; font-size:18px; color:#462f28 ;">
                            <a href="tel:844-987-FREE">844-987-FREE</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle" style="font-family:arial; font-size:18px; color:#462f28 ;"><img src="<?= BASE_URL."images/" ?>email.png" width="30" height="30" /></td>
                        <td width="204" align="center" valign="middle" style="text-align:right; font-family:arial; font-size:18px; color:#462f28 ;">
                            <a href="mailto:info@potentorganics.com" target="_top">info@potentorganics.com</a>
                        </td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td height="415" style="background: url( ); background-position: top; background-attachment:fixed; padding-top: 20px; padding-bottom:40px;"><p>&nbsp;</p>
                <table width="700" border="0" align="center">
                    <tr>
                        <td width="436" height="74" align="center" style="text-align:center; font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:40px; color:#462f28; font-weight: 900; line-height:50px; text-transform: uppercase; padding-bottom:10px;">Get a Free Bottle<br/>of Potent Organics*</td>
                    </tr>
                    <tr>
                        <td rowspan="3" align="center" valign="middle" style="
                            padding-top:0px;
                            padding-bottom:0px;
                            "><table width="680" border="0" cellpadding="0">
                                <tr>
                                    <td><table width="660" border="0" align="center">
                                            <tr>
                                                <td align="center" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 18px; line-height: 20px; color:#462f28;">Enter Your E-Mail for a Free Bottle*<br />
                                                    Only for Existing Customers</td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="middle"><div>
                                                        <!--change-->
                                                        <form action="/search" method="POST">
                                                        <!--<form action="search.php">-->

                                                            <input type="text" id="phone" name="phone" placeholder="Phone Number" required="" pattern="\d*" title="Only 0-9 digit allowed." />

                                                            <input type="email" id="email" title="Ex: abc@example.com" name="email" placeholder="Email Address" required="">
                                                            <input type="submit" value="Get My Free Bottle" />
                                                        </form>
                                                    </div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td height="58" align="center" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 20px; line-height: 30px; color:#462f28; padding-top:0px;">NO Credit Card Required, NO Hidden Fees,<br/>NO Shipping Charges!</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;  font-size: 10px; line-height: 15px; color:   #999;"><table width="100%" border="0">
                                <tr>
                                </tr>
                                <tr>
                                    <td align="center"><p><strong>Please note that the conditions to qualify for our promotion are</strong>:
                                            </span><br/>
                                            &#9679; Have been actively using our product for 7 days or more<br />
                                            &#9679; Agree to share your experience with the product <br />
                                            &#9679; Limited to one free bottle of each product per one Amazon account and household <br />
                                            &#9679; Only for customers that bought the product at full price at Official Seller on Amazon.com<br />
                                            &#9679; Your personal information will not be shared with anyone. 

                                            </span>
                                        </p>
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <?php
} else {
    ?>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="415" style="background: url( ); background-position: top; background-attachment:fixed; padding-top: 0px; padding-bottom:0px;"> 
                <table width="" border="0" align="center">
                    <tr>
                        <td width="" height="36" align="center" valign="middle" style=" font-family:arial; font-size:18px; color:#462f28 ;"><p><img src="<?= IMG_URL ?>logo-mobile.png" alt="" width="139" height="81" align="middle" /></p>
                            <p>
                                <a href="tel:1-305-215-0114">1-305-215-0114</a>
                                <br/>
                                <a href="mailto:info@potentorganics.com" target="_top">info@potentorganics.com</a>
                                </span></p></td>
                    </tr>
                    <tr>
                        <td height="36" align="center" style="text-align:center; font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:40px; color:#462f28; font-weight: 900; line-height:50px; text-transform: uppercase; padding-bottom:10px;">Get a Free Bottle<br/>
                            of Potent Organics*</td>
                    </tr>
                    <tr>
                        <td rowspan="3" align="center" valign="middle" style="
                            padding-top:0px;
                            padding-bottom:0px;
                            "><table width="" border="0" cellpadding="0">
                                <tr>
                                    <td><table width="" border="0" align="center">
                                            <tr>
                                                <td align="center" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 18px; line-height: 20px; color:#462f28;">Enter Your E-Mail for a Free Bottle*<br />
                                                    Only for Existing Customers</td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="middle"><div>
                                                        <!--change-->
                                                        <form action="search.php">

                                                            <input type="text" id="phone" name="phone" placeholder="Phone Number" required="" pattern="\d*" title="Only 0-9 digit allowed." />

                                                            <input type="email" id="email" title="Ex: abc@example.com" name="email" placeholder="Email Address" required="">
                                                            <input type="submit" value="Take My Free Bottle" />
                                                        </form>
                                                    </div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td height="58" align="center" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif; font-weight: 900; font-size: 20px; line-height: 30px; color:#462f28; padding-top:0px;">NO Credit Card Required, NO Hidden Fees,<br/>NO Shipping Charges!</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;  font-size: 10px; line-height: 15px; color:   #999;"><table width="100%" border="0">
                                <tr>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p><strong>Please note that the conditions to qualify for our promotion are</strong>:</span><br/>

                                            &#9679; Have been actively using our product for 7 days or more<br />
                                            &#9679; Agree to share your experience with the product <br />
                                            &#9679; Limited to one free bottle of each product per one Amazon account and household <br />
                                            &#9679; Only for customers that bought the product at full price at Official Seller on Amazon.com
                                            <br>
                                            &#9679;Your personal information will not be shared with anyone.
                                            </span>
                                        </p>
                                        <p> </p>
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <?php
}
?>   
<center>
    <div class="vert-align">
        <p class="headline">Copyright © 2017 Potent Organics. All Rights Reserved.</p>
    </div>
</center>

<script>
//    var window_width = screen.width;
//    if (window_width <= 1000)
//    {
//        $('.responsive_hide').hide();
        //            $('#img-head-mob').show();
        //            $('#img-head-desk').hide();
//    }
    //        if(window_width > 1000)
    //        {
    //            $('#img-head-mob').hide();
    //            $('#img-head-desk').show();
    //        }
</script>


<!-- Facebook chat Starts-->
<!--        <script>
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
</script>-->
<!-- Facebook chat End-->

