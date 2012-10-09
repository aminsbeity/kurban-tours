<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface DmcBrochureDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DmcBrochure 
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
 	 * @param dmcBrochure primary key
 	 */
	public function delete($dmc_brochure_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcBrochure dmcBrochure
 	 */
	public function insert($dmcBrochure);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcBrochure dmcBrochure
 	 */
	public function update($dmcBrochure);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDmcBrochureTitle($value);

	public function queryByDmcBrochureFile($value);


	public function deleteByDmcBrochureTitle($value);

	public function deleteByDmcBrochureFile($value);


}
?>