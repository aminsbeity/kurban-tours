<?php 
class Latest_news{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from latest_news where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from latest_news where latest_news_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $latest_news_title,  $latest_news_details,  $latest_news_date,  $latest_news_image){
if($id == ""){
$query = "insert into latest_news set `latest_news_title` = '$latest_news_title' , `latest_news_details` = '$latest_news_details' , `latest_news_date` = '$latest_news_date' , `latest_news_image` = '$latest_news_image'  "; 
}else{
$query = "update latest_news set `latest_news_title` = '$latest_news_title' , `latest_news_details` = '$latest_news_details' , `latest_news_date` = '$latest_news_date' , `latest_news_image` = '$latest_news_image'  where latest_news_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from latest_news where latest_news_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update latest_news set $condition where latest_news_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from latest_news where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>