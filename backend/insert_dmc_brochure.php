<?php require "session_start.php";

include "config.php";include "class/Dmc_brochure.php";

include "connect.php";
include "file_uploader.php";

extract($_POST);
$dmc_brochure_file=file_uploader("dmc_brochure_file", $fileTypes, $filesPath);



$return = Dmc_brochure::save( addslashes($dmc_brochure_id),  addslashes($dmc_brochure_title),  addslashes($dmc_brochure_file));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_dmc_brochure.php?act=".$act);
exit;
?>