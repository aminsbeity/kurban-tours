<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/destination_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_destination.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return destination_validation(this)" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Destination</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination name</td>
		<td  class="TdFormBorder"><input  name="destination_name" type="text"  class="InputTextTitle" id="destination_name" value="" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination title</td>
		<td  class="TdFormBorder"><input  name="destination_title" type="text"  class="InputTextTitle" id="destination_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Destination details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "destination_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination image</td>
		<td  class="TdFormBorder"><input name="destination_image" type="file" class="File" id="destination_image" /></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination top</td>
		<td  class="TdFormBorder">
		<input name="destination_top" type="radio" value="1" /> Yes 
		<input name="destination_top" type="radio" value="0" /> No</td>
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