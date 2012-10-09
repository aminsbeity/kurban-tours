<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Product_service.php";



extract($_POST);



$return=Product_service::updateCondition($product_service_id, "product_service_title='".addslashes(stripslashes($product_service_title))."' ,product_service_details='".addslashes(stripslashes($product_service_details))."' ,product_id='".addslashes(stripslashes($product_id))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_product_service.php?act=".$act);
exit();
?>