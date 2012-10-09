<?php
require "session_start.php";

include "connect.php";
include "config.php";
include "class/Cms_audio.php";

include "file_uploader.php";

extract ( $_POST );

$cms_audio_file = file_uploader ( "cms_audio_file", $fileTypes, $audioPath );

if (is_file ( $audioPath . $cms_audio_file )) {
	$cms_audio = Cms_audio::selectById ( $cms_audio_id );
	if (is_file ( $audioPath . $cms_audio->cms_audio_file )) {
		unlink ( $audioPath . $cms_audio->cms_audio_file );
	}
	
	$return = Cms_audio::updateCondition ( $cms_audio_id, "cms_audio_file='$cms_audio_file'" );
	if ($return)
		$num ++;
}

$return = Cms_audio::updateCondition ( $cms_audio_id, "cms_audio_title='" . addslashes ( stripslashes ( $cms_audio_title ) ) . "' ,cms_audio_details='" . addslashes ( stripslashes ( $cms_audio_details ) ) . "' " );
if ($return)
	$num ++;

if ($num > 0) {
	$act = 3;
} else {
	$act = 4;
}

header ( "Location: display_cms_audio.php?act=" . $act );
exit ();
?>