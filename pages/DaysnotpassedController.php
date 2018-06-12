<?php

class DaysnotpassedController{
    public $title = "15 Days not passed";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/15daysnotpassed/index.php';
        return $this->title;
    }
}