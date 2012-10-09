<?php 
 require "session_start.php";
include "class/Product.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$product = Product::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/product_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_product.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return product_validation(this)" >
<input name="product_id" type="hidden" value="<?=$product->product_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Product</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product name</td>
		<td  class="TdFormBorder"><input  name="product_name" type="text"  class="InputTextTitle" id="product_name" value="<? echo stripslashes($product->product_name)?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product title</td>
		<td  class="TdFormBorder"><input  name="product_title" type="text"  class="InputTextTitle" id="product_title" value="<? echo stripslashes($product->product_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Product details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "product_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($product->product_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Product icon</td>
		<td  class="TdFormBorder"><input name="product_icon" type="file" class="File" id="product_icon" />
		<?
		if(is_file($imagesPath.$product->product_icon)){
		list($w,$h)=getimagesize($imagesPath.$product->product_icon);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$product->product_icon?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_product_image.php?id=<?=$_REQUEST["id"];?>&field=product_icon')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product image</td>
		<td  class="TdFormBorder"><input name="product_image" type="file" class="File" id="product_image" />
		<?
		if(is_file($imagesPath.$product->product_image)){
		list($w,$h)=getimagesize($imagesPath.$product->product_image);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$product->product_image?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_product_image.php?id=<?=$_REQUEST["id"];?>&field=product_image')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
<tr>
      <td class="FormControlDesc">&nbsp;</td>
      <td class="TdFormBorder">
          	<input name="Submit2" type="submit" class="InputButtons" value=" Save Changes " />
			<input name="Reset" type="button" class="InputButtons" value="Cancel & Back" onclick="javascript:if(confirm('Are you sure you want to leave this page?')) history.back()" />	  
       </td>
    </tr>
</table>
</form>
<? }include "template.php";?>