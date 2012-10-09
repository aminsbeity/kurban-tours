<?php require "session_start.php";

include "config.php";include "class/Cms_video.php";

include "connect.php";

extract($_POST);


$return = Cms_video::save( addslashes($cms_video_id),  addslashes($cms_video_title),  addslashes($cms_video_youtube_url),  addslashes($cms_video_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_cms_video.php?act=".$act);
exit;
?>