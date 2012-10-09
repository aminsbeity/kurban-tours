<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/offer_validation.js"></script>
<script language="javascript" src="javascript/datetimepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<form action="insert_offer.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return offer_validation(this)" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Offer</td>
	</tr>
    <tr>
      <td class="FormControlDesc">Offer date</td>
      <td class="TdFormBorder"><input name="offer_date" type="text" class="InputText" id="offer_date" readonly="readonly"/>
        <a href="javascript:NewCal('offer_date','ddmmmyyyy',false,24)"><img src="images/cal.gif" alt="Pick a date" width="16" height="16" border="0" align="absmiddle" /></a></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Offer title</td>
		<td  class="TdFormBorder"><input  name="offer_title" type="text"  class="InputTextTitle" id="offer_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Offer details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "offer_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Show on home?</td>
		<td  class="TdFormBorder">
		<input name="offer_home" type="radio" value="1" /> Yes 
		<input name="offer_home" type="radio" value="0" /> No</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Offer image</td>
		<td  class="TdFormBorder"><input name="offer_image" type="file" class="File" id="offer_image" /></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination id</td>
		<td  class="TdFormBorder">
		<select name="destination_id" class="FormSelectExpand" id="destination_id" style="width:200px; height:120px" size="2000">
	    <option selected="selected" value="0">--- Select Destination id ---</option>
		<?
		$sql="select * from destination";
		$result=mysql_query($sql);
		while($destination=mysql_fetch_array($result)){?>
		<option value="<?=$destination['destination_id']?>"><?=$destination["destination_name"]?></option>
	   	<? }?>
        </select>
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