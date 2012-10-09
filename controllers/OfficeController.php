<?php

class OfficeController {
		public static $OFFICE_CONTACT_ADDRESS_ARRAY=array(1,2,3,4);
		public static $OFFICE_SALES_OFFICES_ARRAY =array(5,6,7,8);
		public static $OFFICE_INCOMING_ARRAY =array(9,10,11,12);
		 
	function __construct(){}
	
	public function getOffice($idArray){
		$officeObj=new OfficeMySqlExtDAO();
		$officeArray=$officeObj->getOffices($idArray);
		return $officeArray;
	}
}

?>