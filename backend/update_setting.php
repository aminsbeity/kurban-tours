<?php
require "session_start.php";
include "connect.php";

extract ( $_POST );

$sql = "UPDATE `cms_general` SET `site_title` = '$site_title', `record/page` = '$record_page', `email` = '$email' WHERE `general_id` = 1 ;";
$result = mysql_query ( $sql );
$num = mysql_affected_rows ();

if ($num == 1) {
	$act = 3;
} else {
	$act = 4;
}

header ( "Location: main.php?act=" . $act . "" );
exit ();
?>