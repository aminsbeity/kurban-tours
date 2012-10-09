<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Destination.php";

include "resize.php";


extract($_POST);


$destination_image=upload_image("destination_image",$imagesPath);

if(is_file($imagesPath.$destination_image)){
$destination=Destination::selectById($destination_id);


if(is_file($imagesPath.$destination->destination_image))
{
unlink($imagesPath.$destination->destination_image);
}

$simpleImage->load($imagesPath.$destination_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$destination_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$destination_image);

$return=Destination::updateCondition($destination_id, "destination_image='$destination_image'");if($return) $num++;
}


$return=Destination::updateCondition($destination_id, "destination_name='".addslashes(stripslashes($destination_name))."' ,destination_title='".addslashes(stripslashes($destination_title))."' ,destination_details='".addslashes(stripslashes($destination_details))."' ,destination_top='".addslashes(stripslashes($destination_top))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_destination.php?act=".$act);
exit();
?>