<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
abstract class CommonClass {
	
	public $tableName;
	public $orderBy;
	public $recordsPerPage = 4;
	protected $query = "EMPTY";
	
	function __construct() {
	
	}
	
	public function getAllRecords($offset = 0) {
		$query = "select * from $this->tableName
		order by $this->orderBy 
		limit $this->recordsPerPage
		offset $offset";
		$this->query = $query;
		$result = mysql_query ( $query );
		if (mysql_error () && ConfigClass::$showSQLErrors) {
			echo "<br> mysql error: " . mysql_error ();
			echo "<br>QUERY===> $query";
			return array ();
		}
		$objects = array ();
		while ( $object = mysql_fetch_object ( $result ) ) {
			array_push ( $objects, $object );
		}
		return $objects;
	}
	
	/*
	 * The id field name should be name with the tablename_id
	 * example: user_id
	 * other wise this method should be changed
	 */
	public function getRecordById($id) {
		if ($id == "") {
			return array ();
		}
		$query = "select * from $this->tableName where " . $this->tableName . "_id = $id";
		$result = mysql_query ( $query );
		$this->query = $query;
		if (mysql_error () && ConfigClass::$showSQLErrors) {
			echo "<br> mysql error: " . mysql_error ();
			echo "<br>QUERY===> $query";
			return array ();
		}
		$object = mysql_fetch_object ( $result );
		return $object;
	}
	/**
	 * return number of records
	 *
	 * @return number of records
	 */
	public function countRecords() {
		$query = "select count(*) as cc from $this->tableName";
		$this->query = $query;
		$result = mysql_query ( $query );
		if (mysql_error () && ConfigClass::$showSQLErrors) {
			echo "<br> mysql error: " . mysql_error ();
			echo "<br>QUERY===> $query";
			return array ();
		}
		$object = mysql_fetch_object ( $result );
		return $object->cc;
	}
	
	public function getRecordsPerPage() {
		return $this->recordsPerPage;
	}
	function redirect($link) {
		header ( "Location: $link" );
		//echo "<script>javascript:document.location.href='" . $link . "';</script>";
	}
	
	public function defineLanguage() {
		
		$language = $_SESSION ['lang_id'];
		return $language;
	}
	
	
}

?>