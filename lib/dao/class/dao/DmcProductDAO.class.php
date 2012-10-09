<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface DmcProductDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DmcProduct 
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
 	 * @param dmcProduct primary key
 	 */
	public function delete($dmc_product_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DmcProduct dmcProduct
 	 */
	public function insert($dmcProduct);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DmcProduct dmcProduct
 	 */
	public function update($dmcProduct);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDmcProductTitle($value);

	public function queryByDmcProductDetails($value);


	public function deleteByDmcProductTitle($value);

	public function deleteByDmcProductDetails($value);


}
?>