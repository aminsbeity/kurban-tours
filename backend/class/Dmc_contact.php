<?php 
class Dmc_contact{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from dmc_contact where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from dmc_contact where dmc_contact_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $dmc_contact_title,  $dmc_contact_details){
if($id == ""){
$query = "insert into dmc_contact set `dmc_contact_title` = '$dmc_contact_title' , `dmc_contact_details` = '$dmc_contact_details'  "; 
}else{
$query = "update dmc_contact set `dmc_contact_title` = '$dmc_contact_title' , `dmc_contact_details` = '$dmc_contact_details'  where dmc_contact_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from dmc_contact where dmc_contact_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update dmc_contact set $condition where dmc_contact_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from dmc_contact where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>