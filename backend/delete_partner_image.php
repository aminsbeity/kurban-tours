<?php 
require "session_start.php";

include "connect.php";

$id=$_REQUEST["id"];
$field=$_REQUEST["field"];

$sql="select * from `partner` where `partner_id`='$id' limit 1";
$result=mysql_query($sql);
$image=mysql_fetch_array($result);

if(is_file("../uploads/".$image[$field]))
{
unlink("../uploads/".$image[$field]);
}

$sql="update `partner` set `".$field."`=''   where `partner_id`='$id' limit 1";
$result=mysql_query($sql);
$num=mysql_affected_rows();


if($num>0)
{
$act=9;
}
else
{
$act=10;
}

header("Location: edit_partner.php?act=".$act."&id=".$id);
exit();
?>