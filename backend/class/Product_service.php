<?php 
class Product_service{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from product_service where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from product_service where product_service_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $product_service_title,  $product_service_details,  $product_id){
if($id == ""){
$query = "insert into product_service set `product_service_title` = '$product_service_title' , `product_service_details` = '$product_service_details' , `product_id` = '$product_id'  "; 
}else{
$query = "update product_service set `product_service_title` = '$product_service_title' , `product_service_details` = '$product_service_details' , `product_id` = '$product_id'  where product_service_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from product_service where product_service_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update product_service set $condition where product_service_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from product_service where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>