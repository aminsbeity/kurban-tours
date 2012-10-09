<?php 
class Cms_audio{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from cms_audio where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from cms_audio where cms_audio_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $cms_audio_title,  $cms_audio_file,  $cms_audio_details){
if($id == ""){
$query = "insert into cms_audio set `cms_audio_title` = '$cms_audio_title' , `cms_audio_file` = '$cms_audio_file' , `cms_audio_details` = '$cms_audio_details'  "; 
}else{
$query = "update cms_audio set `cms_audio_title` = '$cms_audio_title' , `cms_audio_file` = '$cms_audio_file' , `cms_audio_details` = '$cms_audio_details'  where cms_audio_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from cms_audio where cms_audio_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update cms_audio set $condition where cms_audio_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from cms_audio where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>