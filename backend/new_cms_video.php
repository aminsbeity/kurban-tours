<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_cms_video.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Cms_video</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">video title</td>
		<td  class="TdFormBorder"><input  name="cms_video_title" type="text"  class="InputTextTitle" id="cms_video_title" value="" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">video youtube url</td>
		<td  class="TdFormBorder"><input  name="cms_video_youtube_url" type="text"  class="InputTextTitle" id="cms_video_youtube_url" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">video details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "cms_video_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
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