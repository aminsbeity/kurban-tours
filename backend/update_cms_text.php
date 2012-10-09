<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Cms_text.php";



extract($_POST);



$return=Cms_text::updateCondition($cms_text_id, "cms_text_title='".addslashes($stripslashes($cms_text_title))."' ,cms_text_details='".addslashes($stripslashes($cms_text_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_cms_text.php?act=".$act);
exit();
?>