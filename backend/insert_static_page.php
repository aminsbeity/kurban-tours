<?php require "session_start.php";

include "config.php";include "class/Static_page.php";

include "connect.php";
include "resize.php";

extract($_POST);
$static_page_image=upload_image("static_page_image","$imagesPath");
if(is_file($imagesPath.$static_page_image)){
$simpleImage->load($imagesPath.$static_page_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$static_page_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$static_page_image);
}else{
$static_page_image="";
}



$return = Static_page::save( addslashes($static_page_id),  addslashes($static_page_name),  addslashes($static_page_title),  addslashes($static_page_subtitle),  addslashes($static_page_details),  addslashes($static_page_image));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_static_page.php?act=".$act);
exit;
?>