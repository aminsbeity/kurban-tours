<?php require "session_start.php";

include "config.php";include "class/Dmc_contact.php";

include "connect.php";

extract($_POST);


$return = Dmc_contact::save( addslashes($dmc_contact_id),  addslashes($dmc_contact_title),  addslashes($dmc_contact_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_dmc_contact.php?act=".$act);
exit;
?>