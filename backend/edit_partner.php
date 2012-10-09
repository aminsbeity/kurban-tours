<?php 
 require "session_start.php";
include "class/Partner.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$partner = Partner::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/partner_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_partner.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return partner_validation(this)" >
<input name="partner_id" type="hidden" value="<?=$partner->partner_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Partner</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Partner name</td>
		<td  class="TdFormBorder"><input  name="partner_name" type="text"  class="InputTextTitle" id="partner_name" value="<? echo stripslashes($partner->partner_name)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Partner details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "partner_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($partner->partner_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Partner logo</td>
		<td  class="TdFormBorder"><input name="partner_logo" type="file" class="File" id="partner_logo" />
		<?
		if(is_file($imagesPath.$partner->partner_logo)){
		list($w,$h)=getimagesize($imagesPath.$partner->partner_logo);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$partner->partner_logo?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_partner_image.php?id=<?=$_REQUEST["id"];?>&field=partner_logo')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Partner link</td>
		<td  class="TdFormBorder"><input  name="partner_link" type="text"  class="InputTextTitle" id="partner_link" value="<? echo stripslashes($partner->partner_link)?>" ></td>
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