<?php 
 require "session_start.php";
include "class/Office.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$office = Office::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/office_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_office.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return office_validation(this)" >
<input name="office_id" type="hidden" value="<?=$office->office_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Office</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Office title</td>
		<td  class="TdFormBorder"><input  name="office_title" type="text"  class="InputTextTitle" id="office_title" value="<? echo stripslashes($office->office_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Office details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "office_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($office->office_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Office location</td>
		<td  class="TdFormBorder"><input  name="office_location" type="text"  class="InputTextTitle" id="office_location" value="<? echo stripslashes($office->office_location)?>" ></td>
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