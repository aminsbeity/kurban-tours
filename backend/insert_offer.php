<?php require "session_start.php";

include "config.php";include "class/Offer.php";

include "connect.php";
include "change_format.php";
include "resize.php";

extract($_POST);

$offer_date=change_format($offer_date);
$offer_image=upload_image("offer_image","$imagesPath");
if(is_file($imagesPath.$offer_image)){
$simpleImage->load($imagesPath.$offer_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$offer_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$offer_image);
}else{
$offer_image="";
}



$return = Offer::save( addslashes($offer_id),  addslashes($offer_date),  addslashes($offer_title),  addslashes($offer_details),  addslashes($offer_home),  addslashes($offer_image),  addslashes($destination_id));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_offer.php?act=".$act);
exit;
?>