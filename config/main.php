<?php
//Baseurl
const BASE_URL = "http://amazonfunnel_latest.local/";
const CSS_URL = "http://amazonfunnel_latest.local/css/";
const JS_URL = "http://amazonfunnel_latest.local/js/";
//const IMG_URL = "http://amazonfunnel_latest.local/images/";
const IMG_URL = "/images/";


//Default module
const DEFAULT_CONTROLLER = "index";
const DEFAULT_ACTION = "index";
        
//Server configurations
const SERVER_NAME = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "special1_db";

/*take from E:\Projects\amazonfunnel\public_html\include\config.php 3-6 [S]*/
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/*take from E:\Projects\amazonfunnel\public_html\include\config.php 3-6 [E]*/
//@session_start();
include_once BASE_PATH.'\config\class.db.php';
include_once BASE_PATH.'\config\Mobile_Detect.php';
const SITE_PATH = "/";
define('SITE_SRC', SITE_PATH . 'libs/');
ini_set("max_execution_time", 240);
$detect = new Mobile_Detect;
$is_mobile = "false";
if ($detect->isMobile()) {
    $is_mobile = "true";
}

?>
     