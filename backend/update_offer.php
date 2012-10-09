<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Offer.php";

include "change_format.php";
include "resize.php";


extract($_POST);


$offer_date=change_format($offer_date);
$offer_image=upload_image("offer_image",$imagesPath);

if(is_file($imagesPath.$offer_image)){
$offer=Offer::selectById($offer_id);


if(is_file($imagesPath.$offer->offer_image))
{
unlink($imagesPath.$offer->offer_image);
}

$simpleImage->load($imagesPath.$offer_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$offer_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$offer_image);

$return=Offer::updateCondition($offer_id, "offer_image='$offer_image'");if($return) $num++;
}


$return=Offer::updateCondition($offer_id, "offer_date='".addslashes(stripslashes($offer_date))."' ,offer_title='".addslashes(stripslashes($offer_title))."' ,offer_details='".addslashes(stripslashes($offer_details))."' ,offer_home='".addslashes(stripslashes($offer_home))."' ,destination_id='".addslashes(stripslashes($destination_id))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_offer.php?act=".$act);
exit();
?>