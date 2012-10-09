<?php
//require_once 'JavascriptClass.php';
class LoginClass {
	private $authorized = false;
	
	function __construct() {
	
	}
	
	// start login process
	

	public function identifyUser($userName, $password) {
		//ConnectionFactory::getConnection ();
		$query = "select user_id   from user where user_username='" . $userName . "' and user_password='" . $password . "'";
		$res = mysql_query ( $query );
		if (mysql_num_rows ( $res ) > 0) {
			
			$this->authorized = true;
			
			$object = mysql_fetch_object ( $res );
			$memberId = $object->member_id;
			$this->setUserSession ( $memberId, true );
			return true;
		} else {
			return false;
		}
	}
	
	private function setUserSession($memberId, $authorized) {
		$_SESSION ["userId"] = $memberId;
		$_SESSION ["authorized"] = $authorized;
	}
	public function illegalUser() {
		if (((session_is_registered ( "userId" ) && session_is_registered ( "username" ))))
			session_destroy ();
		JavascriptClass::redirect ( "login.php" );
		return;
	}
	
	public function updateLoginAttempts($username) {
		$aQuery = "select user_login_attempts from user where user_username='$username'";
		$result = mysql_query ( $aQuery );
		if (mysql_num_rows ( $result ) == 0) {
			return false;
		}
		$obj = mysql_fetch_object ( $result );
		$attempts = $obj->user_login_attempts;
		$query = "update user set user_login_attempts= $attempts + 1 where user_username='$username'";
		mysql_query ( $query );
		if (mysql_affected_rows () > 0) {
			return true;
		}
		return false;
	
	}
	public function getUserSession() {
		if (! ((session_is_registered ( "userId" ) && session_is_registered ( "authorized" )))) {
			return false;
		} else {
			return true;
		
		}
	
	}
}

?>