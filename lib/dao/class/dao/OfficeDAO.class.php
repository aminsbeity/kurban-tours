<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface OfficeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Office 
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
 	 * @param office primary key
 	 */
	public function delete($office_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Office office
 	 */
	public function insert($office);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Office office
 	 */
	public function update($office);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByOfficeTitle($value);

	public function queryByOfficeDetails($value);

	public function queryByOfficeLocation($value);


	public function deleteByOfficeTitle($value);

	public function deleteByOfficeDetails($value);

	public function deleteByOfficeLocation($value);


}
?>