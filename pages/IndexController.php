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
        require_once 'pages/index/index.php';
        return $this->title;
    }
}