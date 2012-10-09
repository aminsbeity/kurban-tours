<?php 
 require "session_start.php";
include "class/Product_service.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$product_service = Product_service::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/product_service_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_product_service.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return product_service_validation(this)" >
<input name="product_service_id" type="hidden" value="<?=$product_service->product_service_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Product service</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product service title</td>
		<td  class="TdFormBorder"><input  name="product_service_title" type="text"  class="InputTextTitle" id="product_service_title" value="<? echo stripslashes($product_service->product_service_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Product service details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "product_service_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($product_service->product_service_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Product id</td>
		<td  class="TdFormBorder">
		<select name="product_id" class="FormSelectExpand" id="product_id"  style="width:200px; height:120px" size="2000">
	    <option selected="selected"  value="0">--- Select Product id ---</option>
		<?
		$sql="select * from `product`";
		$result=mysql_query($sql);
		while($product=mysql_fetch_object($result)){
		if($product->product_id==$product_service->product_id)
		$sel="Selected";
		else
		$sel="";		
		?>
		<option value="<? echo $product->product_id?>" <? echo $sel?>><? echo $product->product_name?></option>
	   	<? }?>
        </select>
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