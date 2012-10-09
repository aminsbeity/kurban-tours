<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Testimonial.php";



extract($_POST);



$return=Testimonial::updateCondition($testimonial_id, "testimonial_writer='".addslashes(stripslashes($testimonial_writer))."' ,testimonial_writer_position='".addslashes(stripslashes($testimonial_writer_position))."' ,testimonial_details='".addslashes(stripslashes($testimonial_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_testimonial.php?act=".$act);
exit();
?>