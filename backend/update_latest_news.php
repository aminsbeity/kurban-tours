<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Latest_news.php";

include "change_format.php";
include "resize.php";


extract($_POST);


$latest_news_date=change_format($latest_news_date);
$latest_news_image=upload_image("latest_news_image",$imagesPath);

if(is_file($imagesPath.$latest_news_image)){
$latest_news=Latest_news::selectById($latest_news_id);


if(is_file($imagesPath.$latest_news->latest_news_image))
{
unlink($imagesPath.$latest_news->latest_news_image);
}

$simpleImage->load($imagesPath.$latest_news_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$latest_news_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$latest_news_image);

$return=Latest_news::updateCondition($latest_news_id, "latest_news_image='$latest_news_image'");if($return) $num++;
}


$return=Latest_news::updateCondition($latest_news_id, "latest_news_title='".addslashes(stripslashes($latest_news_title))."' ,latest_news_details='".addslashes(stripslashes($latest_news_details))."' ,latest_news_date='".addslashes(stripslashes($latest_news_date))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_latest_news.php?act=".$act);
exit();
?>