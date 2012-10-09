<?php require "session_start.php";

include "config.php";include "class/Destination.php";

include "connect.php";
include "resize.php";

extract($_POST);
$destination_image=upload_image("destination_image","$imagesPath");
if(is_file($imagesPath.$destination_image)){
$simpleImage->load($imagesPath.$destination_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$destination_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$destination_image);
}else{
$destination_image="";
}



$return = Destination::save( addslashes($destination_id),  addslashes($destination_name),  addslashes($destination_title),  addslashes($destination_details),  addslashes($destination_image),  addslashes($destination_top));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_destination.php?act=".$act);
exit;
?>