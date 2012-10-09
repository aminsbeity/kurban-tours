<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface DmcContactDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DmcContact 
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
 	 * @param dmcContact primary key
 	 */
	public function delete($dmc_contact_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcContact dmcContact
 	 */
	public function insert($dmcContact);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcContact dmcContact
 	 */
	public function update($dmcContact);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDmcContactTitle($value);

	public function queryByDmcContactDetails($value);


	public function deleteByDmcContactTitle($value);

	public function deleteByDmcContactDetails($value);


}
?>