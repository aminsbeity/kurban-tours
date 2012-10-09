<?php 
 require "session_start.php";
include "class/Offer.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$offer = Offer::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/offer_validation.js"></script>
<script language="javascript" src="javascript/datetimepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_offer.php" method="post" enctype="multipart/form-data" name="frm" id="frm"   onsubmit="return offer_validation(this)" >
<input name="offer_id" type="hidden" value="<?=$offer->offer_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Offer</td>
	</tr>
    <tr>
      <td class="FormControlDesc">Offer date</td>
      <td class="TdFormBorder"><input name="offer_date" type="text" class="InputText" id="offer_date"  value="<?=change_format2($offer->offer_date)?>"  readonly="readonly" />
        <a href="javascript:NewCal('offer_date','ddmmmyyyy',false,24)"><img src="images/cal.gif" alt="Pick a date" width="16" height="16" border="0" align="absmiddle" /></a></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Offer title</td>
		<td  class="TdFormBorder"><input  name="offer_title" type="text"  class="InputTextTitle" id="offer_title" value="<? echo stripslashes($offer->offer_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Offer details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "offer_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($offer->offer_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
	<tr>
		<td width="244" class="FormControlDesc">Show on home?</td>
		<td  class="TdFormBorder">
		<input name="offer_home" type="radio" value="1" <? if($offer->offer_home=="1") echo "Checked"; ?> /> Yes 
		<input name="offer_home" type="radio" value="0"  <? if($offer->offer_home=="0") echo "Checked"; ?>/> No
		</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Offer image</td>
		<td  class="TdFormBorder"><input name="offer_image" type="file" class="File" id="offer_image" />
		<?
		if(is_file($imagesPath.$offer->offer_image)){
		list($w,$h)=getimagesize($imagesPath.$offer->offer_image);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$offer->offer_image?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_offer_image.php?id=<?=$_REQUEST["id"];?>&field=offer_image')">[ Delete Image ]</a>
	  <? }?>
		</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Destination id</td>
		<td  class="TdFormBorder">
		<select name="destination_id" class="FormSelectExpand" id="destination_id"  style="width:200px; height:120px" size="2000">
	    <option selected="selected"  value="0">--- Select Destination id ---</option>
		<?
		$sql="select * from `destination`";
		$result=mysql_query($sql);
		while($destination=mysql_fetch_object($result)){
		if($destination->destination_id==$offer->destination_id)
		$sel="Selected";
		else
		$sel="";		
		?>
		<option value="<? echo $destination->destination_id?>" <? echo $sel?>><? echo $destination->destination_name?></option>
	   	<? }?>
        </select>
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