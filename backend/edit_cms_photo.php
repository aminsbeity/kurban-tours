<?php 
 require "session_start.php";
include "class/Cms_photo.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$cms_photo = Cms_photo::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/cms_photo_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_cms_photo.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return cms_photo_validation(this)" >
<input name="cms_photo_id" type="hidden" value="<?=$cms_photo->cms_photo_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Cms_photo</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">photo title</td>
		<td  class="TdFormBorder"><input  name="cms_photo_title" type="text"  class="InputTextTitle" id="cms_photo_title" value="<? echo $cms_photo->cms_photo_title?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">photo file</td>
		<td  class="TdFormBorder"><input name="cms_photo_file" type="file" class="File" id="cms_photo_file" />
		<?
		if(is_file($imagesPath.$cms_photo->cms_photo_file)){
		list($w,$h)=getimagesize($imagesPath.$cms_photo->cms_photo_file);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$cms_photo->cms_photo_file?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_cms_photo_image.php?id=<?=$_REQUEST["id"];?>&field=cms_photo_file')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">photo details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "cms_photo_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = $cms_photo->cms_photo_details;
		$fck->Create ();
      	?>
		</td>
    </tr>
<tr>
      <td class="FormControlDesc">&nbsp;</td>
      <td class="TdFormBorder"><input name="Reset" type="reset" class="InputButtons" value="Reset" />
          <input name="Submit2" type="submit" class="InputButtons" value="Submit" /></td>
    </tr>
</table>
</form>
<? }include "template.php";?>