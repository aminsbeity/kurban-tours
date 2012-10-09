<?php 
class Partner{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from partner where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from partner where partner_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $partner_name,  $partner_details,  $partner_logo,  $partner_link){
if($id == ""){
$query = "insert into partner set `partner_name` = '$partner_name' , `partner_details` = '$partner_details' , `partner_logo` = '$partner_logo' , `partner_link` = '$partner_link'  "; 
}else{
$query = "update partner set `partner_name` = '$partner_name' , `partner_details` = '$partner_details' , `partner_logo` = '$partner_logo' , `partner_link` = '$partner_link'  where partner_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from partner where partner_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update partner set $condition where partner_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from partner where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>