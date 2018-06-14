<?php

class ReenteremailController{
    public $title = "Potent Organics";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        $url_array = explode("/", $_SERVER['REQUEST_URI']);
        
        include BASE_PATH . "/libs/hotjar.php";
        include BASE_PATH . "/libs/fb-chat.php";
        
        $firstname = @$url_array[3];
        $phone = @$url_array[4];
        
        require_once 'pages/reenteremail/index.php';
        return $this->title;
    }
}