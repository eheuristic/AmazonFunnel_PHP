<?php
const BASE_PATH = __DIR__;
require_once 'config/main.php';

//url for controller manage
$url = $_SERVER['REQUEST_URI'];
$url_array = explode("/", $url);
if ($url_array[1] == null):
    $controller = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
    $parameter = null;
else:
    $controller = $url_array[1];
    if(isset($url_array[2])):
        $url_array[2] != "" ? $action = $url_array[2] : $action = DEFAULT_ACTION ;
    else:
        $action = DEFAULT_ACTION;
    endif;
    isset($url_array[3]) ? $parameter = $url_array[3] : $parameter=NULL ;
endif;
?>


<?php include_once 'pages/layout/header.php';  ?>

<?php require_once ("config/router.php");?>

<?php if($url_array[1] == "index" || $url_array[1] == null ): else: include_once 'pages/layout/footer.php'; endif; ?>

<!--change title per page-->
<script type="text/javascript">
       document.title = "<?php echo $title; ?>";
</script>