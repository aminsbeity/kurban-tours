<?php
require "session_start.php";
$adminId = $_SESSION ['adminId'];
include "connect.php";

extract ( $_POST );

$sql = "UPDATE `cms_admin` SET `admin_name` = '$admin_name', `user_name` = '$user_name'
, `email` = '$email' ";
if (trim ( $password ) != "") {
	$md5Pass = md5 ( $password );
	$sql .= ", `Password` = '$md5Pass'";
}
$sql .= " WHERE `admin_id` = $adminId LIMIT 1;";

$result = mysql_query ( $sql );
$num = mysql_affected_rows ();

if ($num == 1) {
	$act = 3;
} else {
	$act = 4;
}

header ( "Location: main.php?act=" . $act );
exit ();
?>