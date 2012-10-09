<?php
class LogClass {
	
	function __construct() {
	}
	public function getLogs() {
		$query = "select * from logs order by log_date desc";
		$result = mysql_query ( $query );
		$objects = array ();
		while ( $object = mysql_fetch_object ( $result ) ) {
			array_push ( $objects, $object );
		}
		return $objects;
	}
	
	public function save($type, $msg) {
		$msg = addslashes ( $msg );
		$regDate = date ( "Y-m-d" );
		$query = "insert into log values('','$type', '$msg','$regDate')";
		mysql_query ( $query );
		return true;
	}
}

?>