<?php 
include "class/Cms_photo.php";
require "session_start.php";

include "connect.php";

extract($_POST);

foreach($_POST as $key => $value){
	$return=Cms_photo::delete($value);
	if($return) $num++;
}



if($num>0){
	$act=5;
	}else{
	$act=6;
}

header("Location: display_cms_photo.php?act=".$act);
exit;
?>