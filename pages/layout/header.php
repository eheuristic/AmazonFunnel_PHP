
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head id="head">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title></title>

        <?php
        $url_array = explode("/", $_SERVER['REQUEST_URI']);
        if ($url_array[1] == null || $url_array[1] == 'index'):
        else:
            ?>
            <link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>bootstrap.min.css" />
            <script src="<?= JS_URL ?>jquery.min.js"></script>
            <script src="<?= JS_URL ?>bootstrap.min.js"></script>
        <?php endif; ?>



        <link rel="stylesheet" href="<?= CSS_URL ?>style.css"/>
        <!--remove css-->
        <link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>facebook_design.css"/>       
        <link rel="icon" type="image/png" href="<?= IMG_URL ?>favicon.png"/>
    </head>



    <!--body tag --> 
    <?php if ($url_array[1] == "not-eligible" || $url_array[1] == "15-days-not-passed"): ?>
        <body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png', 'request-2-3-hover.png')">
            <?php
        elseif ($url_array[1] == "index" || $url_array[1] == null):
            ?><body><?php
            else:
                ?><body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')"><?php
                endif;
                ?>

                <!--header content [S]-->
                <?php if ($url_array[1] == 'index' || $url_array[1] == null || $url_array[1] == 'errors'): ?>
                <?php else: ?>
                    <style>
                        .hw_head_left{
                            padding-left: 15px!important;
                            padding-right: 15px!important;
                        }	a:hover{		color:rgb(182,224,0);	}
                        @media screen and (max-width: 991px) {
                            #img-head-mob {
                                display: block;
                            }

                            #img-head-desk {
                                display: none;
                            }
                            .hw_head_left{text-align: center !important;margin-top: 10px;}
                        }
                        @media screen and (min-width: 992px) {
                            #img-head-mob {
                                display: none;
                            }

                            .hw_head_left{text-align: left !important;margin-top: 10px;}

                        }
                        .img-responsive {
                            margin: 0 auto;
                        }

                        .row{margin:0px !important;}
                        /*    *{padding-right: 0px; padding-left:  0px;}*/
                        @media (max-width: 576px){
                            .hw_head_left{
                                margin-top:0px;
                            }
                        }
                        body{
                            background-color:#F7F7F7;
                        }
                        .contact{
                            font-weight:bold;
                        }

                    </style>
                    <?php
                    if (($url_array[1] == 'index') || ($url_array[1] == null)):
                    else:
                        ?>
                        <div class="row text-center" style="background-color:white">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-lg-offset-1">
                                <img class="img-responsive" id="img-head-desk" src="<?= IMG_URL ?>logo-header-01.png"/>
                                <img class="img-responsive" id="img-head-mob" src="<?= IMG_URL ?>logo-header-02.png"/>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 col-lg-offset-3 hw_head_left">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?= IMG_URL ?>phone.png" class="img-responsive1"/>
                                        <span class="h4 contact"><a href="tel:+1844-987-FREE" style="text-decoration:none;">844-987-FREE</a></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?= IMG_URL ?>email.png" class="img-responsive1"/>
                                        <span class="h4 contact"><a href="mailto:free@potentorganics.com" style="text-decoration:none;/*color:#462F28!important;*/">free@potentorganics.com</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    endif;
                    ?>


                <?php endif; ?>
                <!--header content [E]-->