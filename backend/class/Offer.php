<?php 
class Offer{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from offer where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from offer where offer_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $offer_date,  $offer_title,  $offer_details,  $offer_home,  $offer_image,  $destination_id){
if($id == ""){
$query = "insert into offer set `offer_date` = '$offer_date' , `offer_title` = '$offer_title' , `offer_details` = '$offer_details' , `offer_home` = '$offer_home' , `offer_image` = '$offer_image' , `destination_id` = '$destination_id'  "; 
}else{
$query = "update offer set `offer_date` = '$offer_date' , `offer_title` = '$offer_title' , `offer_details` = '$offer_details' , `offer_home` = '$offer_home' , `offer_image` = '$offer_image' , `destination_id` = '$destination_id'  where offer_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from offer where offer_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update offer set $condition where offer_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from offer where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>