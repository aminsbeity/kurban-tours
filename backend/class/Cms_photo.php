<?php
class Cms_photo {
	
	public static function select($condition) {
		if ($condition == "")
			$condition = 1;
		$query = "select * from cms_photo where $condition ";
		$result = mysql_query ( $query );
		$objects = array ();
		while ( $data = mysql_fetch_object ( $result ) ) {
			array_push ( $objects, $data );
		}
		
		return $objects;
	}
	public static function selectById($id) {
		$query = "select * from cms_photo where cms_photo_id=$id ";
		$result = mysql_query ( $query );
		$data = mysql_fetch_object ( $result );
		return $data;
	}
	public static function save($id, $cms_photo_title, $cms_photo_file, $cms_photo_details) {
		if ($id == "") {
			$query = "insert into cms_photo set `cms_photo_title` = '$cms_photo_title' , `cms_photo_file` = '$cms_photo_file' , `cms_photo_details` = '$cms_photo_details'  ";
		} else {
			$query = "update cms_photo set `cms_photo_title` = '$cms_photo_title' , `cms_photo_file` = '$cms_photo_file' , `cms_photo_details` = '$cms_photo_details'  where cms_photo_id = $id";
		}
		mysql_query ( $query );
		
		if (mysql_affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	
	}
	public static function delete($id) {
		$query = "delete from cms_photo where cms_photo_id=$id ";
		mysql_query ( $query );
		
		if (mysql_affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	
	}
	public static function updateCondition($id, $condition) {
		$query = "update cms_photo set $condition where cms_photo_id=$id ";
		mysql_query ( $query );
		
		if (mysql_affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	
	}
	public static function count($condition) {
		$query = "select count(*) as cc from cms_photo where $condition";
		$result = mysql_query ( $query );
		$data = mysql_fetch_object ( $result );
		return $data->cc;
	}

}
?>