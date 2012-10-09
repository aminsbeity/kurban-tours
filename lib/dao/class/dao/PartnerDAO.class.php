<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Partner 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param partner primary key
 	 */
	public function delete($partner_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Partner partner
 	 */
	public function insert($partner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Partner partner
 	 */
	public function update($partner);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPartnerName($value);

	public function queryByPartnerDetails($value);

	public function queryByPartnerLogo($value);

	public function queryByPartnerLink($value);


	public function deleteByPartnerName($value);

	public function deleteByPartnerDetails($value);

	public function deleteByPartnerLogo($value);

	public function deleteByPartnerLink($value);


}
?>