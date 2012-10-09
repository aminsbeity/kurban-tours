<? function main(){?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
<script language="javascript" src="javascript/datetimepicker.js"></script>
<form action="insert_latest_news.php" method="post" enctype="multipart/form-data" name="frm" id="frm" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" class="TdTitle"  height="25">Create New Latest news</td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Latest news title</td>
		<td  class="TdFormBorder"><input  name="latest_news_title" type="text"  class="InputTextTitle" id="latest_news_title" value="" ></td>
	</tr>
	<tr>
      <td valign="top" class="FormControlDesc">Latest news details</td>
      <td class="TdFormBorder">
      <?php
      	$fck = new FCKeditor ( "latest_news_details");
		$fck->BasePath = "fckeditor/";
		$fck->Value = "";
		$fck->Config["EnterMode"] = "br"; 
		$fck->Create ();
      ?>
	</td>
    </tr>
    <tr>
      <td class="FormControlDesc">Latest news date</td>
      <td class="TdFormBorder"><input name="latest_news_date" type="text" class="InputText" id="latest_news_date" readonly="readonly"/>
        <a href="javascript:NewCal('latest_news_date','ddmmmyyyy',false,24)"><img src="images/cal.gif" alt="Pick a date" width="16" height="16" border="0" align="absmiddle" /></a></td>
	</tr>
	<tr>
		<td width="244" class="FormControlDesc">Latest news image</td>
		<td  class="TdFormBorder"><input name="latest_news_image" type="file" class="File" id="latest_news_image" /></td>
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