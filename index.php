
<?php
//tesing for data storing session purpose for calling api only once                      
//$url_ar= explode("/", $_SERVER['REQUEST_URI']);
//if($url_ar[1] == 'products'):
//    session_start();
//    echo '<pre>';
//    echo var_dump($_SESSION);
//    echo '</pre>';
//                if(isset($_SESSION['order_data_all'])):
//                    echo "<script>alert('true');</script>";
//                elseif(isset($_SESSION['customer_details'])):
//                    echo "<script>alert('true');</script>";
//                else:
////                    $order_data_all = $_SESSION['customer_details']['order_data_all'];
//                    echo "<script>alert('false');</script>";
//                endif;
//                exit;
//endif;

const BASE_PATH = __DIR__;
require_once 'config/main.php';



//url for controller manage
$url_array = explode("/", $_SERVER['REQUEST_URI']);
if ($url_array[1] == null):
    $controller = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
    $parameter = null;
else:
    $controller = $url_array[1];
    if (isset($url_array[2])):
        $url_array[2] != "" ? $action = $url_array[2] : $action = DEFAULT_ACTION;
    else:
        $action = DEFAULT_ACTION;
    endif;
    isset($url_array[3]) ? $parameter = $url_array[3] : $parameter = NULL;
endif;
?>


<?php include_once 'pages/layout/header.php'; ?>
<script>
//tesing for data storing session purpose for calling api only once                      
//    var firstTime = localStorage.getItem("first_time");
//    if (!firstTime) {
//        localStorage.setItem("first_time", "1");
//        window.first_time = "1";
//        console.log(window.first_time);
//    } else {
//        console.log('elseeee');
//        window.first_time = "0";
//        console.log(window.first_time);
//    }
</script>     
<?php require_once ("config/router.php"); ?>
<?php if ($url_array[1] == "index" || $url_array[1] == null): else: include_once 'pages/layout/footer.php';
endif; ?>

<!--change title per page-->
<script type="text/javascript">
    document.title = "<?php echo $title; ?>";

</script>