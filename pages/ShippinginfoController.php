<?php


class ShippinginfoController{
    public $title = "Shipping Info";
    public $is_mobile;
    public function __construct($is_mobile){
        $this->is_mobile = $is_mobile;
    }
    
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/shippinginfo/index.php';
        return $this->title;
    }
}