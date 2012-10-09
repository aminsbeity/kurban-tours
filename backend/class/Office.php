<?php 
class Office{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from office where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from office where office_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $office_title,  $office_details,  $office_location){
if($id == ""){
$query = "insert into office set `office_title` = '$office_title' , `office_details` = '$office_details' , `office_location` = '$office_location'  "; 
}else{
$query = "update office set `office_title` = '$office_title' , `office_details` = '$office_details' , `office_location` = '$office_location'  where office_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from office where office_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update office set $condition where office_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from office where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>