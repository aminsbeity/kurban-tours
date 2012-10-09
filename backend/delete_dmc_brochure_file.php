<?php 

require "session_start.php";

include "connect.php";

$id=$_REQUEST["id"];
$field=$_REQUEST["field"];

$sql="select * from `dmc_brochure` where `dmc_brochure_id`='$id' limit 1";
$result=mysql_query($sql);
$file=mysql_fetch_array($result);

if(is_file("../uploads/".$file[$field]))
{
unlink("../uploads/".$file[$field]);
}

$sql="update `dmc_brochure` set `".$field."`=''   where `dmc_brochure_id`='$id' limit 1";
$result=mysql_query($sql);
$num=mysql_affected_rows();


if($num>0)
{
$act=7;
}
else
{
$act=8;
}

header("Location: edit_dmc_brochure.php?act=".$act."&id=".$id);
exit();
?>