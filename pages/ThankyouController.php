<?php


class ThankyouController{
    public $title = "Thank you!";
    public $is_mobile;
    public function __construct($is_mobile){
        $this->is_mobile = $is_mobile;
    }
    
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/thankyou/index.php';
        return $this->title;
    }
}