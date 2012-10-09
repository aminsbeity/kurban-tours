<?php 
include "class/Cms_video.php";
function main(){
$orderBy = "desc";
$fieldName = "cms_video_id";
if(isset($_REQUEST["orderBy"])){
 	$orderBy = $_REQUEST["orderBy"];
	$fieldName = $_REQUEST["fieldName"];
}

$keywords = trim($_REQUEST["keywords"]);

if($keywords != ""){
	$condition.=" cms_video_title like '%$keywords%' and ";
}

$condition.=" 1 order by $fieldName $orderBy ";

// paging
$limit=25;
$offset = 0;
$page=$_REQUEST["page"];
$recordsCount = Cms_video::count($condition);
$numberOfPages = ceil($recordsCount/$limit);
if($page !=""){
	$page=$_REQUEST["page"];
	$offset = ($page - 1) * $limit ;
}


$condition.=" limit $limit offset $offset ";
$records = Cms_video::select($condition);



?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/go_to.js"></script>
<script language="javascript" src="javascript/check_uncheck_all.js"></script>
<script language="javascript" src="javascript/frm_confirmation.js"></script>

<div style="border:0px; padding:3px; background-color: #f3f3f3; font-weight: bold;color:#0569c5;font-size:18px;" align="center">CMS Video Management</div>

<div style="background-color: #f3f3f3; font-weight: bold;">
	<form name="myform223" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<div>Search : <input type="text" value="<?php echo $keywords ?>" name="keywords" id="keywords"><input type="submit" value=" Search " /></div>
	</form>
</div>

<div style="">
	<a href="new_cms_video.php"><img src="images/new.png" border="0"/></a>
</div>
<form name="myform" action="delete_cms_video.php" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35" style="border-bottom:1px solid #e5eaef;">&nbsp;</td>
    <td width="100" class="TdHeaders TdHeaderBorder" >video id</td>
	<td class="TdHeaders TdHeaderBorder">video title<br/><a href="?orderBy=asc&fieldName=video_title">Asc</a>|<a href="?orderBy=desc&fieldName=video_title">Desc</a></td>
	<td class="TdHeaders TdHeaderBorder">video youtube url<br/><a href="?orderBy=asc&fieldName=video_youtube_url">Asc</a>|<a href="?orderBy=desc&fieldName=video_youtube_url">Desc</a></td>
    <td class="TdHeaders TdHeaderBorder">URL to be used as link</td>
    <td colspan="2" class="TdHeaders TdHeaderBorder">Actions</td>
  </tr>
  <?
  for($rc=0;$rc<count($records);$rc++){
  $cms_video = $records[$rc];?>
  <tr>
    <td width="35" class="TdBodyborder" ><input type="checkbox" value="<?=$cms_video->cms_video_id;?>" name="check_list<?=$rc;?>"/></td>
    <td width="100" class="TdBodyborder"><?=$cms_video->cms_video_id;?>&nbsp;</td>
    <td class="TdBodyborder"><?=$cms_video->cms_video_title;?>&nbsp;</td>
	<td class="TdBodyborder">
		<a href="<?=$cms_video->cms_video_youtube_url;?>" target="_blank"><?=$cms_video->cms_video_youtube_url;?></a>
	</td>
	<td class="TdBodyborder">
		<?php $cmsVideoLink = SITE_LINK."read-video/$cms_video->cms_video_id" ?>
		<a href="<?php echo $cmsVideoLink ?>"><?php echo $cmsVideoLink ?></a>
	</td>
    <td width="50" align="center" style="border-bottom:1px solid #e5eaef;border-Left:1px solid #e5eaef;" ><a href="edit_cms_video.php?id=<?=$cms_video->cms_video_id?>"><img src="images/edit.png"  height="25" border="0"></a></td>
    <td width="50" align="center"  style="border-bottom:1px solid #e5eaef;border-right:1px solid #e5eaef;" ><a href="javascript:frm_confirmation();" onmousedown="javascript:myform.check_list<?=$rc?>.checked=true"><img src="images/drop.png"  height="25" border="0"></a></td>
  </tr>
  <? 
  $c++;
  $i++;
  }?>
</table></form>
<table width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35"  ><img src="images/arrow_check.jpg" width="35" height="20"></td>
    <td><a href="javascript:CheckAll(document.myform.check_list);" class="MenuLinks">Check all</a> / <a href="javascript:UnCheckAll(document.myform.check_list);" class="MenuLinks">Uncheck all</a></td>
    <td width="184" ><a href="javascript:frm_confirmation();" class="MenuLinks"><img src="images/drop.png" width="16" height="16" border="0" align="absmiddle" class="user"/>Delete checked items </a></td>
    <td width="110" align="right" class="SiteLink" style="padding-right:5px;">Go to</td>
    <td width="103" colspan="2">
	<select name="menu1" class="DisplaySelect" onChange="MM_jumpMenu('parent',this,0)" >
    <? 
	for($pp=1; $pp<=$numberOfPages;$pp++){
	if ($pp==$page)
	$sel="selected";
	else
	$sel="";
	?>
    <option value="<?=$_SERVER['PHP_SELF'];?>?page=<?=$pp?>" <?=$sel?> >Page <?=$pp?></option>
    <?php }?>
    </select>
	</td>
  </tr>
</table>
<? }include "template.php";?>