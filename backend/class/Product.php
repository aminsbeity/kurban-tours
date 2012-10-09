<?php 
class Product{

public static function select($condition){
if($condition == "") $condition=1;
$query = "select * from product where $condition ";
$result = mysql_query($query);
$objects = array();
while($data = mysql_fetch_object($result)){
			array_push($objects, $data);
	}
	
return $objects;
}public static function selectById($id){
$query = "select * from product where product_id=$id ";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data;
}public static function save($id,  $product_name,  $product_title,  $product_details,  $product_icon,  $product_image){
if($id == ""){
$query = "insert into product set `product_name` = '$product_name' , `product_title` = '$product_title' , `product_details` = '$product_details' , `product_icon` = '$product_icon' , `product_image` = '$product_image'  "; 
}else{
$query = "update product set `product_name` = '$product_name' , `product_title` = '$product_title' , `product_details` = '$product_details' , `product_icon` = '$product_icon' , `product_image` = '$product_image'  where product_id = $id"; 
}mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	
}public static function delete($id){
$query = "delete from product where product_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function updateCondition($id, $condition){
$query = "update product set $condition where product_id=$id ";
mysql_query($query);

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
	

}public static function count($condition){
$query = "select count(*) as cc from product where $condition";
$result = mysql_query($query);
$data = mysql_fetch_object($result);
return $data->cc;
}

}?>