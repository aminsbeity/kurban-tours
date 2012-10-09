<?php require "session_start.php";

include "config.php";include "class/Cms_photo.php";

include "connect.php";
include "resize.php";

extract($_POST);
$cms_photo_file=upload_image("cms_photo_file","$imagesPath");
if(is_file($imagesPath.$cms_photo_file)){
$simpleImage->load($imagesPath.$cms_photo_file);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$cms_photo_file);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$cms_photo_file);
}else{
$cms_photo_file="";
}



$return = Cms_photo::save( addslashes($cms_photo_id),  addslashes($cms_photo_title),  addslashes($cms_photo_file),  addslashes($cms_photo_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_cms_photo.php?act=".$act);
exit;
?>