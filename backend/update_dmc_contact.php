<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Dmc_contact.php";



extract($_POST);



$return=Dmc_contact::updateCondition($dmc_contact_id, "dmc_contact_title='".addslashes(stripslashes($dmc_contact_title))."' ,dmc_contact_details='".addslashes(stripslashes($dmc_contact_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_dmc_contact.php?act=".$act);
exit();
?>