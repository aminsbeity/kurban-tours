<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_static_page.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Static page</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page name</td>
		<td  class="TdFormBorder"><input  name="static_page_name" type="text"  class="InputTextTitle" id="static_page_name" value="" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page title</td>
		<td  class="TdFormBorder"><input  name="static_page_title" type="text"  class="InputTextTitle" id="static_page_title" value="" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page subtitle</td>
		<td  class="TdFormBorder"><input  name="static_page_subtitle" type="text"  class="InputTextTitle" id="static_page_subtitle" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Static page details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "static_page_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Static page image</td>
		<td  class="TdFormBorder"><input name="static_page_image" type="file" class="File" id="static_page_image" /></td>
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