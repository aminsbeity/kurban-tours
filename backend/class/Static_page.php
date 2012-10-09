<?php 
class Static_page{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from static_page where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from static_page where static_page_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $static_page_name,  $static_page_title,  $static_page_subtitle,  $static_page_details,  $static_page_image){
if($id == ""){
$query = "insert into static_page set `static_page_name` = '$static_page_name' , `static_page_title` = '$static_page_title' , `static_page_subtitle` = '$static_page_subtitle' , `static_page_details` = '$static_page_details' , `static_page_image` = '$static_page_image'  "; 
}else{
$query = "update static_page set `static_page_name` = '$static_page_name' , `static_page_title` = '$static_page_title' , `static_page_subtitle` = '$static_page_subtitle' , `static_page_details` = '$static_page_details' , `static_page_image` = '$static_page_image'  where static_page_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from static_page where static_page_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update static_page set $condition where static_page_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from static_page where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>