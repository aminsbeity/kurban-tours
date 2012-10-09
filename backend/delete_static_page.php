<?php 
include "class/Static_page.php";
require "session_start.php";

include "connect.php";

extract($_POST);

foreach($_POST as $key => $value){
	$return=Static_page::delete($value);
	if($return) $num++;
}



if($num>0){
	$act=5;
	}else{
	$act=6;
}

header("Location: display_static_page.php?act=".$act);
exit;
?>