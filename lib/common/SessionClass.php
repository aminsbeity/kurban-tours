<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
class SessionClass {
	
	public static $sessionPath = "sessions";
	private static $sessionInstance = null;
	
	/**
	 * using private contructor to avoid having multiple session start
	 *
	 */
	private function __construct() {
		session_save_path ( SessionClass::$sessionPath );
		if (! isset ( $_SESSION )) {
			session_start ();
		}
	}
	
	/**
	 * return the current session in case exists
	 *
	 * @return the current session in case exists
	 * otherwise returns new session
	 */
	public static function getSessionInstance() {
		if (SessionClass::$sessionInstance instanceof SessionClass) {
			return SessionClass::$sessionInstance;
		}
		SessionClass::$sessionInstance = new SessionClass ( );
		return SessionClass::$sessionInstance;
	}
	
	function startSession() {
		
		SessionClass::startSessionPath ();
		
		if (isset ( $_SESSION ['sessionStarted'] ) == "") {
			if (session_start () == false) {
				echo "Unable to start session. System will exit";
				exit ();
			}
			$_SESSION ['sessionStarted'] = "started";
		}
	
	}
	
	function setVar($varName, $value) {
		
		$_SESSION [$varName] = $value;
	
	}
	public function startSessionPath() {
		session_save_path ( SessionClass::$sessionPath );
	}
	
	function getVar($varName) {
		if (isset ( $_SESSION [$varName] )) {
			return $_SESSION [$varName];
		}
		return "";
	}
	
	public function logout() {
		if (! ($_SESSION)) {
			SessionClass::startSession ();
		}
		session_unset();
		session_destroy ();
	}
}

?>