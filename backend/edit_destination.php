<?php 
 require "session_start.php";
include "class/Destination.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$destination = Destination::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/destination_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_destination.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return destination_validation(this)" >
<input name="destination_id" type="hidden" value="<?=$destination->destination_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Destination</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination name</td>
		<td  class="TdFormBorder"><input  name="destination_name" type="text"  class="InputTextTitle" id="destination_name" value="<? echo stripslashes($destination->destination_name)?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination title</td>
		<td  class="TdFormBorder"><input  name="destination_title" type="text"  class="InputTextTitle" id="destination_title" value="<? echo stripslashes($destination->destination_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Destination details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "destination_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($destination->destination_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination image</td>
		<td  class="TdFormBorder"><input name="destination_image" type="file" class="File" id="destination_image" />
		<?
		if(is_file($imagesPath.$destination->destination_image)){
		list($w,$h)=getimagesize($imagesPath.$destination->destination_image);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$destination->destination_image?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_destination_image.php?id=<?=$_REQUEST["id"];?>&field=destination_image')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination top</td>
		<td  class="TdFormBorder">
		<input name="destination_top" type="radio" value="1" <? if($destination->destination_top=="1") echo "Checked"; ?> /> Yes 
		<input name="destination_top" type="radio" value="0"  <? if($destination->destination_top=="0") echo "Checked"; ?>/> No
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