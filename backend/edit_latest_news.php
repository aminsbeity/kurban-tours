<?php 
 require "session_start.php";
include "class/Latest_news.php";
function main(){

include 'config.php';$id=$_REQUEST["id"];
$latest_news = Latest_news::selectById($id);
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="javascript" src="javascript/datetimepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/pop_up.js"></script>
<script language="JavaScript" type="text/javascript" src="javascript/delete_file_confirmation.js"></script>
<form action="update_latest_news.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<input name="latest_news_id" type="hidden" value="<?=$latest_news->latest_news_id?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Edit Latest news</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Latest news title</td>
		<td  class="TdFormBorder"><input  name="latest_news_title" type="text"  class="InputTextTitle" id="latest_news_title" value="<? echo stripslashes($latest_news->latest_news_title)?>" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Latest news details</td>
      <td class="TdFormBorder">
  		<?php
      	$fck = new FCKeditor ( "latest_news_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = stripslashes($latest_news->latest_news_details);
		$fck->Config["EnterMode"] = "br";
		$fck->Create ();
      	?>
		</td>
    </tr>
    <tr>
      <td class="FormControlDesc">Latest news date</td>
      <td class="TdFormBorder"><input name="latest_news_date" type="text" class="InputText" id="latest_news_date"  value="<?=change_format2($latest_news->latest_news_date)?>"  readonly="readonly" />
        <a href="javascript:NewCal('latest_news_date','ddmmmyyyy',false,24)"><img src="images/cal.gif" alt="Pick a date" width="16" height="16" border="0" align="absmiddle" /></a></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Latest news image</td>
		<td  class="TdFormBorder"><input name="latest_news_image" type="file" class="File" id="latest_news_image" />
		<?
		if(is_file($imagesPath.$latest_news->latest_news_image)){
		list($w,$h)=getimagesize($imagesPath.$latest_news->latest_news_image);
		?>
		&nbsp;&nbsp;<a href="javascript:popUp('pop_up.php?img=<?=$imagesPath.$latest_news->latest_news_image?>','<?=$w?>','<?=$h?>')" >[ View Image ]</a>&nbsp;&nbsp;<a href="javascript:delete_file_confirmation('delete_latest_news_image.php?id=<?=$_REQUEST["id"];?>&field=latest_news_image')">[ Delete Image ]</a>
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