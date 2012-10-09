<?php 
 require "session_start.php";
include "class/Static_page.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$static_page = Static_page::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_static_page.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<input name="static_page_id" type="hidden" value="<?=$static_page->static_page_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Static page</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page name</td>
		<td  class="TdFormBorder"><input  name="static_page_name" type="text"  class="InputTextTitle" id="static_page_name" value="<? echo stripslashes($static_page->static_page_name)?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page title</td>
		<td  class="TdFormBorder"><input  name="static_page_title" type="text"  class="InputTextTitle" id="static_page_title" value="<? echo stripslashes($static_page->static_page_title)?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page subtitle</td>
		<td  class="TdFormBorder"><input  name="static_page_subtitle" type="text"  class="InputTextTitle" id="static_page_subtitle" value="<? echo stripslashes($static_page->static_page_subtitle)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Static page details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "static_page_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($static_page->static_page_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page image</td>
		<td  class="TdFormBorder"><input name="static_page_image" type="file" class="File" id="static_page_image" />
		<?
		if(is_file($imagesPath.$static_page->static_page_image)){
		list($w,$h)=getimagesize($imagesPath.$static_page->static_page_image);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$static_page->static_page_image?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_static_page_image.php?id=<?=$_REQUEST["id"];?>&field=static_page_image')">[ Delete Image ]</a>
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