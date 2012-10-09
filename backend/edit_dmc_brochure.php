<?php 
 require "session_start.php";
include "class/Dmc_brochure.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$dmc_brochure = Dmc_brochure::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/dmc_brochure_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_dmc_brochure.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return dmc_brochure_validation(this)" >
<input name="dmc_brochure_id" type="hidden" value="<?=$dmc_brochure->dmc_brochure_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Dmc brochure</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Dmc brochure title</td>
		<td  class="TdFormBorder"><input  name="dmc_brochure_title" type="text"  class="InputTextTitle" id="dmc_brochure_title" value="<? echo stripslashes($dmc_brochure->dmc_brochure_title)?>" ></td>
	</tr>
		<tr>
      <td class="FormControlDesc">Dmc brochure file</td>
      <td class="TdFormBorder"><input name="dmc_brochure_file" type="file" class="File" id="dmc_brochure_file" />
	  <?
	  if(is_file($filesPath.$dmc_brochure->dmc_brochure_file)){?>
	  &nbsp;&nbsp;<a href="<?=$filesPath.$dmc_brochure->dmc_brochure_file?>" target="_blank">[ View File ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_dmc_brochure_file.php?id=<?=$_REQUEST["id"];?>&field=dmc_brochure_file')">[ Delete File]</a>
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