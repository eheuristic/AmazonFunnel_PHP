<?php

class ReenteremailController{
    public $title = "Potent Organics";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/reenteremail/index.php';
        return $this->title;
    }
}