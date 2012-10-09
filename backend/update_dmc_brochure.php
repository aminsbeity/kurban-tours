<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Dmc_brochure.php";

include "file_uploader.php";


extract($_POST);


$dmc_brochure_file=file_uploader("dmc_brochure_file",$fileTypes,$filesPath);

if(is_file($filesPath.$dmc_brochure_file)){
$dmc_brochure=Dmc_brochure::selectById($dmc_brochure_id);
if(is_file($filesPath.$dmc_brochure->dmc_brochure_file)){
unlink($filesPath.$dmc_brochure->dmc_brochure_file);
}

$return=Dmc_brochure::updateCondition($dmc_brochure_id, "dmc_brochure_file='$dmc_brochure_file'");
if($return) $num++;
}


$return=Dmc_brochure::updateCondition($dmc_brochure_id, "dmc_brochure_title='".addslashes(stripslashes($dmc_brochure_title))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_dmc_brochure.php?act=".$act);
exit();
?>