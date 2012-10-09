<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/product_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_product.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return product_validation(this)" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Product</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product name</td>
		<td  class="TdFormBorder"><input  name="product_name" type="text"  class="InputTextTitle" id="product_name" value="" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product title</td>
		<td  class="TdFormBorder"><input  name="product_title" type="text"  class="InputTextTitle" id="product_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Product details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "product_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Product icon</td>
		<td  class="TdFormBorder"><input name="product_icon" type="file" class="File" id="product_icon" /></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Product image</td>
		<td  class="TdFormBorder"><input name="product_image" type="file" class="File" id="product_image" /></td>
	</tr>
<tr>
      <td class="FormControlDesc">&nbsp;</td>
      <td class="TdFormBorder">
          <input name="Submit2" type="submit" class="InputButtons" value=" Add Data " />
          <input name="Reset" type="button" class="InputButtons" value="Cancel & Back" onclick="javascript:if(confirm('Are you sure you want to leave this page?')) history.back()"/>
       </td>
    </tr>
</table>
</form>
<? }include "template.php";?>