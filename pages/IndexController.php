<?php

//require_once 'config/DbContext.php';
require_once 'models/index.php';

class IndexController{
    public $title = "Potent Organics";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
            $_SESSION['email'] = '';
            //$this->title = "Potent ";
            include BASE_PATH . "/libs/hotjar.php";
            include BASE_PATH . "/libs/fb-chat.php";
            
        require_once 'pages/index/index.php';
        return $this->title;
    }
}