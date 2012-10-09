<?php require "session_start.php";

include "config.php";include "class/Office.php";

include "connect.php";

extract($_POST);


$return = Office::save( addslashes($office_id),  addslashes($office_title),  addslashes($office_details),  addslashes($office_location));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_office.php?act=".$act);
exit;
?>