<?php 
include "class/Dmc_brochure.php";
require "session_start.php";

include "connect.php";

extract($_POST);

foreach($_POST as $key => $value){
	$return=Dmc_brochure::delete($value);
	if($return) $num++;
}



if($num>0){
	$act=5;
	}else{
	$act=6;
}

header("Location: display_dmc_brochure.php?act=".$act);
exit;
?>