<?php 
$url = $_SERVER['REQUEST_URI'];
$url_array = explode("/", $url);
?>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL ?>re-enter.css?ver=2">
    <?php 
    include BASE_PATH . "/libs/hotjar.php";
    include BASE_PATH . "/libs/fb-chat.php";
    ?>
<body onload="MM_preloadImages('fb-hover.png', 'twitter-hover.png')">

    <?php include BASE_PATH . '/libs/header-content.php'; ?>

    
        <div class="row" >
            <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2 col-sm-offset-2" class="main_col" >
                <div class="first_line"style="">
                    We are sorry, but
                </div>
                <div class="second_line"style="">
                    We couldn't find your email in our database
                </div>
                <div class="third_line"style="">
                    Please make sure you enter the same email you use to sign-in on Amazon.com
                </div>
                <div class="forth_line"style="">
                    Let's try again!
                </div>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-12 stitched" >
                <div class="form_1_line">
                    Enter Your Email
                </div>
                <div class="form_2_line">
                    you use to sign-in to amazon.com
                </div>
                <div>
                    <form action="/search">

                        <?php
                        // Get form submitted value (Get method)
                        // remove
//                        if(!isset($_SESSION)): session_start(); endif;
//                        $firstname = $_SESSION['firstname'];
//                        $phone = $_SESSION['phone'];
//                        unset($_SESSION['phone']);
//                        unset($_SESSION['firstname']);
                        $firstname = @$url_array[3];
                        $phone = @$url_array[4];

                        echo '<input type="hidden" id="name" name="firstname" value="' . $firstname . '">';
                        echo '<input type="hidden" id="phone" name="phone"    value="' . $phone . '">';
                        ?>

                        <input type="email" id="email" name="email" placeholder="Email Address" required=''>
                        <input type="text" id="phone" name="phone" placeholder="Phone" pattern="\d*" title="Only 0-9 digit allowed." required=''/>

                        <input type="submit" value="Try Again With This E-MAIL">
                    </form>
                </div>
                <div class="bottom_line">
                    *Your personal information will not be shared with anyone. For more information check our customer protection <a href="#">privacy policy</a>.
                </div>
            </div>
        </div>
    <?php include_once BASE_PATH."/libs/footer.php"; ?>