<?php
//exit;
//include_once BASE_PATH.'config/main.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include '../config/main.php';

$action = $_POST['action'];

if($action=='product_data'){
    $_SESSION['review']='';
    $_SESSION['rating']='';
    $_SESSION['like']='';
    $_SESSION['asin']='';
    $_SESSION['order_id']='';
    $_SESSION['product_id']='';
    $_SESSION['product_name']='';
    $_SESSION['promo_id']='';
    $_SESSION['delivery_date']='';
    $_SESSION['purchase_date']='';
    $_SESSION['asin']=$_POST['asin'];
    $_SESSION['order_id']=$_POST['order_id'];
    $_SESSION['product_id']=$_POST['product_id'];
    $_SESSION['product_name']=$_POST['product_name'];
    $_SESSION['promo_id']=$_POST['promo_id'];
    $_SESSION['delivery_date']= strtotime($_POST['delivery_date']);
    $_SESSION['purchase_date']= strtotime($_POST['purchase_date']);
    echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        exit;
    //return true;
}
elseif($action=='rating'){
    $_SESSION['review']='';
    $_SESSION['rating']='';
    $_SESSION['like']='';
    $_SESSION['review']=$_POST['review'];
    $_SESSION['rating']=$_POST['rating'];
    echo $_SESSION['like']=$_POST['like'];
	
}
elseif($action=='step5'){
    $_SESSION['amazone_clicked']='';
    $_SESSION['amazone_clicked']='clicked';
}
elseif($action=='clear'){
    $_SESSION['review']='';
    $_SESSION['rating']='';
    $_SESSION['like']='';
    $_SESSION['asin']='';
    $_SESSION['order_id']='';
    $_SESSION['product_id']='';
    $_SESSION['product_name']='';
    $_SESSION['promo_id']='';
    $_SESSION['delivery_date']='';
    $_SESSION['purchase_date']='';
    $_SESSION['review']='';
    $_SESSION['rating']='';
    $_SESSION['like']='';
    $_SESSION['amazone_clicked']='';
}
elseif($action=="star_like"){
    $_SESSION['like_val']=$_POST['like_val'];
}