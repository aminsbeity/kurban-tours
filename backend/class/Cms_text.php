<?php 
class Cms_text{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from cms_text where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from cms_text where cms_text_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $cms_text_title,  $cms_text_details){
if($id == ""){
$query = "insert into cms_text set `cms_text_title` = '$cms_text_title' , `cms_text_details` = '$cms_text_details'  "; 
}else{
$query = "update cms_text set `cms_text_title` = '$cms_text_title' , `cms_text_details` = '$cms_text_details'  where cms_text_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from cms_text where cms_text_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update cms_text set $condition where cms_text_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from cms_text where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>