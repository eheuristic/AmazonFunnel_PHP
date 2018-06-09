<?php

class ExperienceController{
    public $title = "Experience";
    public $is_mobile;
    public function __construct($is_mobile) {
        $this->is_mobile= $is_mobile;
    }
    public function index(){
        $is_mobile = $this->is_mobile;
        require_once 'pages/experience/index.php';
        return $this->title;
    }
}