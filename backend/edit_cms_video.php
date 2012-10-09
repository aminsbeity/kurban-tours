<?php 
 require "session_start.php";
include "class/Cms_video.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$cms_video = Cms_video::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_cms_video.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<input name="cms_video_id" type="hidden" value="<?=$cms_video->cms_video_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Cms_video</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">video title</td>
		<td  class="TdFormBorder"><input  name="cms_video_title" type="text"  class="InputTextTitle" id="cms_video_title" value="<? echo $cms_video->cms_video_title?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">video youtube url</td>
		<td  class="TdFormBorder"><input  name="cms_video_youtube_url" type="text"  class="InputTextTitle" id="cms_video_youtube_url" value="<? echo $cms_video->cms_video_youtube_url?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">video details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "cms_video_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = $cms_video->cms_video_details;
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