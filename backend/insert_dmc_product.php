<?php require "session_start.php";

include "config.php";include "class/Dmc_product.php";

include "connect.php";

extract($_POST);


$return = Dmc_product::save( addslashes($dmc_product_id),  addslashes($dmc_product_title),  addslashes($dmc_product_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_dmc_product.php?act=".$act);
exit;
?>