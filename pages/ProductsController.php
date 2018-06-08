<?php

class ProductsController{
    public $title = "Products";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/products/index.php';
        return $this->title;
    }
}