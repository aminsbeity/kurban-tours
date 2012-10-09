<?php 
class Testimonial{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from testimonial where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from testimonial where testimonial_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $testimonial_writer,  $testimonial_writer_position,  $testimonial_details){
if($id == ""){
$query = "insert into testimonial set `testimonial_writer` = '$testimonial_writer' , `testimonial_writer_position` = '$testimonial_writer_position' , `testimonial_details` = '$testimonial_details'  "; 
}else{
$query = "update testimonial set `testimonial_writer` = '$testimonial_writer' , `testimonial_writer_position` = '$testimonial_writer_position' , `testimonial_details` = '$testimonial_details'  where testimonial_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from testimonial where testimonial_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update testimonial set $condition where testimonial_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from testimonial where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>