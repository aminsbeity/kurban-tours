<?php 
 require "session_start.php";
include "class/Cms_audio.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$cms_audio = Cms_audio::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/cms_audio_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_cms_audio.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return cms_audio_validation(this)" >
<input name="cms_audio_id" type="hidden" value="<?=$cms_audio->cms_audio_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Cms_audio</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">audio title</td>
		<td  class="TdFormBorder"><input  name="cms_audio_title" type="text"  class="InputTextTitle" id="cms_audio_title" value="<? echo $cms_audio->cms_audio_title?>" ></td>
	</tr>
		<tr>
      <td class="FormControlDesc">audio file</td>
      <td class="TdFormBorder"><input name="cms_audio_file" type="file" class="File" id="cms_audio_file" />
	  <?
	  if(is_file($audioPath.$cms_audio->cms_audio_file)){?>
	  &nbsp;&nbsp;<a href="<?=$audioPath.$cms_audio->cms_audio_file?>" target="_blank">[ View File ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_cms_audio_file.php?id=<?=$_REQUEST["id"];?>&field=cms_audio_file')">[ Delete File]</a>
	  <? }?>
	  </td>
    </tr>
	<tr>
      <td valign="top" class="FormControlDesc">audio details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "cms_audio_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = $cms_audio->cms_audio_details;
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