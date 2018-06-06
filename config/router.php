<?php

function callAction($controller, $action, $parameter){
    switch ($controller)
    {
        case "index":
            require_once 'pages/IndexController.php';
            $controller = new IndexController();
            break;
        default:
            pageNotFound();
    }
    if(!method_exists($controller, $action)){
        pageNotFound();
        exit;
    }
    if($parameter){
        $data = $controller-> { $action }($parameter);
    } else {
        $data = $controller-> { $action }();
    }
    return $data;
}
function pageNotFound(){
        echo "404 - Page Not Found";
}

$title = callAction($controller, $action, $parameter);
?>