<?php 
include "class/Cms_audio.php";
require "session_start.php";

include "connect.php";

extract($_POST);

foreach($_POST as $key => $value){
	$return=Cms_audio::delete($value);
	if($return) $num++;
}



if($num>0){
	$act=5;
	}else{
	$act=6;
}

header("Location: display_cms_audio.php?act=".$act);
exit;
?>