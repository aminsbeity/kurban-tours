<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/dmc_brochure_validation.js"></script>
<form action="insert_dmc_brochure.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return dmc_brochure_validation(this)" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Dmc brochure</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Dmc brochure title</td>
		<td  class="TdFormBorder"><input  name="dmc_brochure_title" type="text"  class="InputTextTitle" id="dmc_brochure_title" value="" ></td>
	</tr>
	<tr>
      <td class="FormControlDesc">Dmc brochure file</td>
      <td class="TdFormBorder"><input name="dmc_brochure_file" type="file" class="File" id="dmc_brochure_file" /></td>
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