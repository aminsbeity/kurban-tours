<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
class GeneralClass {
	
	function __construct() {
	
	}
	/**
	 * get the website title from the general table
	 *
	 * @return Site_Title
	 */
	function getSiteTitle() {
		$sqlgeneral = "select Site_Title from general";
		$res = mysql_query ( $sqlgeneral );
		$data = mysql_fetch_object ( $res );
		return $data->Site_Title;
	}
	function redirect($link) {
		header ( "Location: $link" );
		//echo "<script>javascript:document.location.href='" . $link . "';</script>";
	}
	
	function getAdminEmail() {
		$sql = "SELECT * FROM `general`";
		$result = mysql_query ( $sql );
		$row = mysql_fetch_object ( $result );
		return $row->Email;
	}
	
	function getBrochure() {
		ConnectionFactory::getConnection ();
		$sql = "SELECT * FROM `general`";
		$result = mysql_query ( $sql );
		$row = mysql_fetch_object ( $result );
		return $row;
	}
	
	function getShowLatestNews() {
		ConnectionFactory::getConnection ();
		$sql = "SELECT * FROM `general`";
		$result = mysql_query ( $sql );
		$row = mysql_fetch_object ( $result );
		return $row->show_latest_news;
	}

}

?>