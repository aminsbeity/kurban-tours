<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_cms_text.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Cms_text</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Cms text title</td>
		<td  class="TdFormBorder"><input  name="cms_text_title" type="text"  class="InputTextTitle" id="cms_text_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Cms text details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "cms_text_details");
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