<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Cms_video.php";



extract($_POST);



$return=Cms_video::updateCondition($cms_video_id, "cms_video_title='".addslashes(stripslashes($cms_video_title))."' ,cms_video_youtube_url='".addslashes(stripslashes($cms_video_youtube_url))."' ,cms_video_details='".addslashes(stripslashes($cms_video_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_cms_video.php?act=".$act);
exit();
?>