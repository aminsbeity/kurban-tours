<?php
require "session_start.php";

include "connect.php";
include "config.php";
include "class/Cms_photo.php";

include "resize.php";

extract ( $_POST );

$cms_photo_file = upload_image ( "cms_photo_file", $imagesPath );

if (is_file ( $imagesPath . $cms_photo_file )) {
	$cms_photo = Cms_photo::selectById ( $cms_photo_id );
	
	if (is_file ( $imagesPath . $cms_photo->cms_photo_file )) {
		unlink ( $imagesPath . $cms_photo->cms_photo_file );
	}
	
	$simpleImage->load ( $imagesPath . $cms_photo_file );
	$simpleImage->resizeToWidth ( $medImageW );
	$simpleImage->save ( $imagesPath . "med_" . $cms_photo_file );
	$simpleImage->resizeToWidth ( $smallImageW );
	$simpleImage->save ( $imagesPath . "small_" . $cms_photo_file );
	
	$return = Cms_photo::updateCondition ( $cms_photo_id, "cms_photo_file='$cms_photo_file'" );
	if ($return)
		$num ++;
}

$return = Cms_photo::updateCondition ( $cms_photo_id, "cms_photo_title='" . addslashes ( stripslashes ( $cms_photo_title ) ) . "' ,cms_photo_details='" . addslashes ( stripslashes ( $cms_photo_details ) ) . "' " );
if ($return)
	$num ++;

if ($num > 0) {
	$act = 3;
} else {
	$act = 4;
}

header ( "Location: display_cms_photo.php?act=" . $act );
exit ();
?>