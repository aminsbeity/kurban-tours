<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/dmc_contact_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_dmc_contact.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return dmc_contact_validation(this)" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Dmc contact</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Dmc contact title</td>
		<td  class="TdFormBorder"><input  name="dmc_contact_title" type="text"  class="InputTextTitle" id="dmc_contact_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Dmc contact details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "dmc_contact_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
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