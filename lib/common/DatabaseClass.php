<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
class DatabaseClass {
	
	private static $hostName = "localhost";
	private static $hostUser = "root";
	private static $hostPass = "";
	private static $dbName = "zexpert";
	
	function __construct() {
	
	}
	
	public static function connect() {
		mysql_connect ( DatabaseClass::$hostName, DatabaseClass::$hostUser, DatabaseClass::$hostPass );
		mysql_select_db ( DatabaseClass::$dbName );
	}
}

?>