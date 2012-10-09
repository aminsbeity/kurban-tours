<?php 
class Dmc_brochure{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from dmc_brochure where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from dmc_brochure where dmc_brochure_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $dmc_brochure_title,  $dmc_brochure_file){
if($id == ""){
$query = "insert into dmc_brochure set `dmc_brochure_title` = '$dmc_brochure_title' , `dmc_brochure_file` = '$dmc_brochure_file'  "; 
}else{
$query = "update dmc_brochure set `dmc_brochure_title` = '$dmc_brochure_title' , `dmc_brochure_file` = '$dmc_brochure_file'  where dmc_brochure_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from dmc_brochure where dmc_brochure_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update dmc_brochure set $condition where dmc_brochure_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from dmc_brochure where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>