<?php 
include "class/Offer.php";
require "session_start.php";

include "connect.php";

extract($_POST);

foreach($_POST as $key => $value){
	$return=Offer::delete($value);
	if($return) $num++;
}



if($num>0){
	$act=5;
	}else{
	$act=6;
}

header("Location: display_offer.php?act=".$act);
exit;
?>