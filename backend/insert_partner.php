<?php require "session_start.php";

include "config.php";include "class/Partner.php";

include "connect.php";
include "resize.php";

extract($_POST);
$partner_logo=upload_image("partner_logo","$imagesPath");
if(is_file($imagesPath.$partner_logo)){
$simpleImage->load($imagesPath.$partner_logo);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$partner_logo);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$partner_logo);
}else{
$partner_logo="";
}



$return = Partner::save( addslashes($partner_id),  addslashes($partner_name),  addslashes($partner_details),  addslashes($partner_logo),  addslashes($partner_link));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_partner.php?act=".$act);
exit;
?>