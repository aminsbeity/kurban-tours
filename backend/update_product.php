<?php 
require "session_start.php";



include "connect.php";
include "config.php";
include "class/Product.php";

include "resize.php";


extract($_POST);


$product_icon=upload_image("product_icon",$imagesPath);

if(is_file($imagesPath.$product_icon)){
$product=Product::selectById($product_id);


if(is_file($imagesPath.$product->product_icon))
{
unlink($imagesPath.$product->product_icon);
}

$simpleImage->load($imagesPath.$product_icon);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$product_icon);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$product_icon);

$return=Product::updateCondition($product_id, "product_icon='$product_icon'");if($return) $num++;
}

$product_image=upload_image("product_image",$imagesPath);

if(is_file($imagesPath.$product_image)){
$product=Product::selectById($product_id);


if(is_file($imagesPath.$product->product_image))
{
unlink($imagesPath.$product->product_image);
}

$simpleImage->load($imagesPath.$product_image);
$simpleImage->resizeToWidth($medImageW);
$simpleImage->save($imagesPath."med_".$product_image);
$simpleImage->resizeToWidth($smallImageW);
$simpleImage->save($imagesPath."small_".$product_image);

$return=Product::updateCondition($product_id, "product_image='$product_image'");if($return) $num++;
}


$return=Product::updateCondition($product_id, "product_name='".addslashes(stripslashes($product_name))."' ,product_title='".addslashes(stripslashes($product_title))."' ,product_details='".addslashes(stripslashes($product_details))."' ");
if($return) $num++;

if($num>0){
	$act=3;
}else{
	$act=4;
}

header("Location: display_product.php?act=".$act);
exit();
?>