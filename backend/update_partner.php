<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Partner.php";

include "resize.php";


extract($_POST);


$partner_logo=upload_image("partner_logo",$imagesPath);

if(is_file($imagesPath.$partner_logo)){
$partner=Partner::selectById($partner_id);


if(is_file($imagesPath.$partner->partner_logo))
{
unlink($imagesPath.$partner->partner_logo);
}

$simpleImage->load($imagesPath.$partner_logo);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$partner_logo);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$partner_logo);

$return=Partner::updateCondition($partner_id, "partner_logo='$partner_logo'");if($return) $num++;
}


$return=Partner::updateCondition($partner_id, "partner_name='".addslashes(stripslashes($partner_name))."' ,partner_details='".addslashes(stripslashes($partner_details))."' ,partner_link='".addslashes(stripslashes($partner_link))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_partner.php?act=".$act);
exit();
?>