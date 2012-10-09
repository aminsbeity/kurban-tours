<?php require "session_start.php";

include "config.php";include "class/Product.php";

include "connect.php";
include "resize.php";

extract($_POST);
$product_icon=upload_image("product_icon","$imagesPath");
if(is_file($imagesPath.$product_icon)){
$simpleImage->load($imagesPath.$product_icon);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$product_icon);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$product_icon);
}else{
$product_icon="";
}

$product_image=upload_image("product_image","$imagesPath");
if(is_file($imagesPath.$product_image)){
$simpleImage->load($imagesPath.$product_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$product_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$product_image);
}else{
$product_image="";
}



$return = Product::save( addslashes($product_id),  addslashes($product_name),  addslashes($product_title),  addslashes($product_details),  addslashes($product_icon),  addslashes($product_image));
	if($return == true){
		$act=1;
	}else{
		$act=2;
	}

header("Location: display_product.php?act=".$act);
exit;
?>