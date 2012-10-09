<?php 
class Destination{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from destination where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from destination where destination_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $destination_name,  $destination_title,  $destination_details,  $destination_image,  $destination_top){
if($id == ""){
$query = "insert into destination set `destination_name` = '$destination_name' , `destination_title` = '$destination_title' , `destination_details` = '$destination_details' , `destination_image` = '$destination_image' , `destination_top` = '$destination_top'  "; 
}else{
$query = "update destination set `destination_name` = '$destination_name' , `destination_title` = '$destination_title' , `destination_details` = '$destination_details' , `destination_image` = '$destination_image' , `destination_top` = '$destination_top'  where destination_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from destination where destination_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update destination set $condition where destination_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from destination where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>