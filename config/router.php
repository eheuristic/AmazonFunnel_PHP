<?php

class callingAction {

    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function callAction($controller, $action, $parameter) {
        switch ($controller) {
            case "index":
                require_once 'pages/IndexController.php';
                $controller = new IndexController($this->is_mobile);
                break;
            case "search":
                require_once 'pages/SearchController.php';
                $controller = new SearchController($this->is_mobile);
                break;
            case "errors":
                require_once 'pages/ErrorsController.php';
                $controller = new ErrorsController($this->is_mobile);
                break;
            case "products":
                require_once 'pages/ProductsController.php';
                $controller = new ProductsController($this->is_mobile);
                break;
            case "re-enter-email":
                require_once 'pages/ReenteremailController.php';
                $controller = new ReenteremailController($this->is_mobile);
                break;
            case "not-eligible":
                require_once 'pages/NoteligibleController.php';
                $controller = new NoteligibleController($this->is_mobile);
                break;
            case "experience":
                require_once 'pages/ExperienceController.php';
                $controller = new ExperienceController($this->is_mobile);
                break;
            case "shipping-info":
                require_once 'pages/ShippinginfoController.php';
                $controller = new ShippinginfoController($this->is_mobile);
                break;
            case "15-days-not-passed":
                require_once 'pages/DaysnotpassedController.php';
                $controller = new DaysnotpassedController($this->is_mobile);
                break;
            case "thankyou":
                require_once 'pages/ThankyouController.php';
                $controller = new ThankyouController($this->is_mobile);
                break;

            default:
                $this->pageNotFound();
        }
        if (!method_exists($controller, $action)) {
            $this->pageNotFound();
        }
        if ($parameter) {
            $data = $controller->{ $action }($parameter);
        } else {
            $data = $controller->{ $action }();
        }
        return $data;
    }

    public function pageNotFound() {
        echo "404 - Page Not Found";
        exit;
    }

}

$callaction = new callingAction($is_mobile);
$title = $callaction->callAction($controller, $action, $parameter);
?>