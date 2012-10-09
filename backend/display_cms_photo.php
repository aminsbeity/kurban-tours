<?php 
include "class/Cms_photo.php";
function main(){

include 'config.php';
$orderBy = "desc";
$fieldName = "cms_photo_id";
if(isset($_REQUEST["orderBy"])){
 	$orderBy = $_REQUEST["orderBy"];
	$fieldName = $_REQUEST["fieldName"];
}

$keywords = trim($_REQUEST["keywords"]);

if($keywords != ""){
	$condition.=" cms_photo_title like '%$keywords%' and ";
}

$condition.=" 1 order by $fieldName $orderBy ";

// paging
$limit=25;
$offset = 0;
$page=$_REQUEST["page"];
$recordsCount = Cms_photo::count($condition);
$numberOfPages = ceil($recordsCount/$limit);
if($page !=""){
	$page=$_REQUEST["page"];
	$offset = ($page - 1) * $limit ;
}


$condition.=" limit $limit offset $offset ";
$records = Cms_photo::select($condition);



?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="javascript/go_to.js"></script>
<script language="javascript" src="javascript/check_uncheck_all.js"></script>
<script language="javascript" src="javascript/frm_confirmation.js"></script>

<div style="border:0px; padding:3px; background-color: #f3f3f3; font-weight: bold;color:#0569c5;font-size:18px;" align="center">CMS Photos Management</div>

<div style="background-color: #f3f3f3; font-weight: bold;">
	<form name="myform223" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<div>Search : <input type="text" value="<?php echo $keywords ?>" name="keywords" id="keywords"><input type="submit" value=" Search " /></div>
	</form>
</div>

<div style="">
	<a href="new_cms_photo.php"><img src="images/new.png" border="0"/></a>
</div>
<form name="myform" action="delete_cms_photo.php" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35" style="border-bottom:1px solid #e5eaef;">&nbsp;</td>
    <td width="100" class="TdHeaders TdHeaderBorder" >photo id</td>
	<td class="TdHeaders TdHeaderBorder">photo title<br/><a href="?orderBy=asc&fieldName=photo_title">Asc</a>|<a href="?orderBy=desc&fieldName=photo_title">Desc</a></td>
	<td class="TdHeaders TdHeaderBorder">photo file<br/><a href="?orderBy=asc&fieldName=photo_file">Asc</a>|<a href="?orderBy=desc&fieldName=photo_file">Desc</a></td>
	<td class="TdHeaders TdHeaderBorder">URL to be used as link</td>
    <td colspan="2" class="TdHeaders TdHeaderBorder">Actions</td>
  </tr>
  <?
  for($rc=0;$rc<count($records);$rc++){
  $cms_photo = $records[$rc];?>
  <tr>
    <td width="35" class="TdBodyborder" ><input type="checkbox" value="<?=$cms_photo->cms_photo_id;?>" name="check_list<?=$rc;?>"/></td>
    <td width="100" class="TdBodyborder"><?=$cms_photo->cms_photo_id;?>&nbsp;</td>
    <td class="TdBodyborder"><?=$cms_photo->cms_photo_title;?>&nbsp;</td>
	<td class="TdBodyborder"><img src="<?php echo $imagesPath?>small_<?=$cms_photo->cms_photo_file;?>"/>&nbsp;</td>
	<td class="TdBodyborder">
	<?php $readPhotoLink = SITE_LINK."read-photo/$cms_photo->cms_photo_id"; ?>
  	<a href="<?php echo $readPhotoLink ?>" target="_blank"><?php echo $readPhotoLink ?></a>
  	
  	</td>
    <td width="50" align="center" style="border-bottom:1px solid #e5eaef;border-Left:1px solid #e5eaef;" ><a href="edit_cms_photo.php?id=<?=$cms_photo->cms_photo_id?>"><img src="images/edit.png"  height="25" border="0"></a></td>
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