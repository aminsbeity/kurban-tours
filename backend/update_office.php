<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Office.php";



extract($_POST);



$return=Office::updateCondition($office_id, "office_title='".addslashes(stripslashes($office_title))."' ,office_details='".addslashes(stripslashes($office_details))."' ,office_location='".addslashes(stripslashes($office_location))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_office.php?act=".$act);
exit();
?>