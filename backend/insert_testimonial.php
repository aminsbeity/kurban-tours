<?php require "session_start.php";

include "config.php";include "class/Testimonial.php";

include "connect.php";

extract($_POST);


$return = Testimonial::save( addslashes($testimonial_id),  addslashes($testimonial_writer),  addslashes($testimonial_writer_position),  addslashes($testimonial_details));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_testimonial.php?act=".$act);
exit;
?>