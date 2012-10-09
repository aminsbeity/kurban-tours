<?php 
 require "session_start.php";
include "class/Testimonial.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$testimonial = Testimonial::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/testimonial_validation.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="update_testimonial.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return testimonial_validation(this)" >
<input name="testimonial_id" type="hidden" value="<?=$testimonial->testimonial_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Testimonial</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Testimonial writer</td>
		<td  class="TdFormBorder"><input  name="testimonial_writer" type="text"  class="InputTextTitle" id="testimonial_writer" value="<? echo stripslashes($testimonial->testimonial_writer)?>" ></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Testimonial writer position</td>
		<td  class="TdFormBorder"><input  name="testimonial_writer_position" type="text"  class="InputTextTitle" id="testimonial_writer_position" value="<? echo stripslashes($testimonial->testimonial_writer_position)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Testimonial details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "testimonial_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($testimonial->testimonial_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
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