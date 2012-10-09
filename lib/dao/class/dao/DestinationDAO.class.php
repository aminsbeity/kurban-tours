<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface DestinationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Destination 
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
 	 * @param destination primary key
 	 */
	public function delete($destination_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Destination destination
 	 */
	public function insert($destination);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Destination destination
 	 */
	public function update($destination);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDestinationName($value);

	public function queryByDestinationTitle($value);

	public function queryByDestinationDetails($value);

	public function queryByDestinationImage($value);

	public function queryByDestinationTop($value);


	public function deleteByDestinationName($value);

	public function deleteByDestinationTitle($value);

	public function deleteByDestinationDetails($value);

	public function deleteByDestinationImage($value);

	public function deleteByDestinationTop($value);


}
?>