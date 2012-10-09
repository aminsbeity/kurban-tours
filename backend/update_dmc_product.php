<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Dmc_product.php";



extract($_POST);



$return=Dmc_product::updateCondition($dmc_product_id, "dmc_product_title='".addslashes(stripslashes($dmc_product_title))."' ,dmc_product_details='".addslashes(stripslashes($dmc_product_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_dmc_product.php?act=".$act);
exit();
?>