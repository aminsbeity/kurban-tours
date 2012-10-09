<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Static_page.php";

include "resize.php";


extract($_POST);


$static_page_image=upload_image("static_page_image",$imagesPath);

if(is_file($imagesPath.$static_page_image)){
$static_page=Static_page::selectById($static_page_id);


if(is_file($imagesPath.$static_page->static_page_image))
{
unlink($imagesPath.$static_page->static_page_image);
}

$simpleImage->load($imagesPath.$static_page_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$static_page_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$static_page_image);

$return=Static_page::updateCondition($static_page_id, "static_page_image='$static_page_image'");if($return) $num++;
}


$return=Static_page::updateCondition($static_page_id, "static_page_name='".addslashes(stripslashes($static_page_name))."' ,static_page_title='".addslashes(stripslashes($static_page_title))."' ,static_page_subtitle='".addslashes(stripslashes($static_page_subtitle))."' ,static_page_details='".addslashes(stripslashes($static_page_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_static_page.php?act=".$act);
exit();
?>