<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
class ValidatorClass {
	
	function __construct() {
	
	}
	
	/**
	 * Validate an array of inputs 
	 *
	 * @param array $fieldsArray
	 * @return boolean
	 */
	function validateFields($fieldsArray) {
		foreach ( $fieldsArray as $field ) {
			if (trim ( $field ) == "" || $field == NULL) {
				//echo "Error: $field field is empty";
				return false;
			}
		}
		return true;
	}
	
	public static function prepareQuery($input, $type = "INT") {
		ConnectionFactory::getConnection();
		if ($type == "INT") {
			$input = ( int ) ($input);
			return $input;
		}
		
		$input = strip_tags ( $input );
		$input = mysql_real_escape_string ( $input );
		$input = trim ( $input );
		return $input;
	}
	
	public static function prepareQueryOfArray($array) {
		$newArray = array ();
		foreach ( $array as $input ) {
			$first = strip_tags ( $input );
			$second = mysql_real_escape_string ( $first );
			$newArray [] = $second;
		}
		return $newArray;
	}
	
	public static function checkEmailAddress($email) {
		// First, we check that there's one @ symbol, and that the lengths are right
		if (! ereg ( "^[^@]{1,64}@[^@]{1,255}$", $email )) {
			// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
			return false;
		}
		// Split it into sections to make life easier
		$email_array = explode ( "@", $email );
		$local_array = explode ( ".", $email_array [0] );
		for($i = 0; $i < sizeof ( $local_array ); $i ++) {
			if (! ereg ( "^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array [$i] )) {
				return false;
			}
		}
		if (! ereg ( "^\[?[0-9\.]+\]?$", $email_array [1] )) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode ( ".", $email_array [1] );
			if (sizeof ( $domain_array ) < 2) {
				return false; // Not enough parts to domain
			}
			for($i = 0; $i < sizeof ( $domain_array ); $i ++) {
				if (! ereg ( "^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array [$i] )) {
					return false;
				}
			}
		}
		return true;
	}

}

?>