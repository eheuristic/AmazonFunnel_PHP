<?php

require_once 'config/DbContext.php';
require_once 'models/index.php';

class IndexController{
    public $title = "Potent Organics";
    public function __construct() {
        
    }
    public function index(){
        require_once 'pages/index/index.php';
        return $this->title;
    }
}