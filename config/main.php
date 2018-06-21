<?php
 error_reporting(0);

//Baseurl
const BASE_URL = "http://amazonfunnel_latest.local/";
const CSS_URL = BASE_URL."css/";
const JS_URL = BASE_URL."js/";
//const IMG_URL = BASE_URL."images/";
const IMG_URL = "/images/";
const SITE_PATH = "/";
define('SITE_SRC', SITE_PATH . 'libs/');

//Default module
const DEFAULT_CONTROLLER = "index";
const DEFAULT_ACTION = "index";
//Server configurations
const SERVER_NAME = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "special1_db";
//@session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//included files
include_once BASE_PATH . '\config\class.db.php';
include_once BASE_PATH . '\config\Mobile_Detect.php';


ini_set("max_execution_time", 240);
$detect = new Mobile_Detect;
$is_mobile = "false";
if ($detect->isMobile()) {
    $is_mobile = "true";
}
?>

     