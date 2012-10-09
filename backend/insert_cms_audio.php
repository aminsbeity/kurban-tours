<?php
require "session_start.php";

include "config.php";
include "class/Cms_audio.php";

include "connect.php";
include "file_uploader.php";

extract ( $_POST );
$cms_audio_file = file_uploader ( "cms_audio_file", $fileTypes, $audioPath );
if($cms_audio_file == ""){
	exit("Error: unable to upload the file. It seems the file size you're trying to upload is larger than 2 MB. Please contact your site administrator or hosting company to solve this issue");
}


$return = Cms_audio::save ( addslashes ( $cms_audio_id ), addslashes ( $cms_audio_title ), addslashes ( $cms_audio_file ), addslashes ( $cms_audio_details ) );
if ($return == true) {
	$act = 1;
} else {
	$act = 2;
}

header ( "Location: display_cms_audio.php?act=" . $act );
exit ();
?>