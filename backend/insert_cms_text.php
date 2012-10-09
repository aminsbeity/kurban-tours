<?php require "session_start.php";

include "config.php";include "class/Cms_text.php";

include "connect.php";

extract($_POST);


$return = Cms_text::save( addslashes($cms_text_id),  addslashes($cms_text_title),  addslashes($cms_text_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_cms_text.php?act=".$act);
exit;
?>