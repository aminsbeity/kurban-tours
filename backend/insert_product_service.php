<?php require "session_start.php";

include "config.php";include "class/Product_service.php";

include "connect.php";

extract($_POST);


$return = Product_service::save( addslashes($product_service_id),  addslashes($product_service_title),  addslashes($product_service_details),  addslashes($product_id));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_product_service.php?act=".$act);
exit;
?>