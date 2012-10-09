<?php require "session_start.php";

include "config.php";include "class/Latest_news.php";

include "connect.php";
include "change_format.php";
include "resize.php";

extract($_POST);

$latest_news_date=change_format($latest_news_date);
$latest_news_image=upload_image("latest_news_image","$imagesPath");
if(is_file($imagesPath.$latest_news_image)){
$simpleImage->load($imagesPath.$latest_news_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$latest_news_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$latest_news_image);
}else{
$latest_news_image="";
}



$return = Latest_news::save( addslashes($latest_news_id),  addslashes($latest_news_title),  addslashes($latest_news_details),  addslashes($latest_news_date),  addslashes($latest_news_image));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_latest_news.php?act=".$act);
exit;
?>