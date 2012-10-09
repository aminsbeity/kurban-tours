<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 17:59
 */
interface OfferDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Offer 
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
 	 * @param offer primary key
 	 */
	public function delete($offer_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Offer offer
 	 */
	public function insert($offer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Offer offer
 	 */
	public function update($offer);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByOfferDate($value);

	public function queryByOfferTitle($value);

	public function queryByOfferDetails($value);

	public function queryByOfferHome($value);

	public function queryByOfferImage($value);

	public function queryByDestinationId($value);


	public function deleteByOfferDate($value);

	public function deleteByOfferTitle($value);

	public function deleteByOfferDetails($value);

	public function deleteByOfferHome($value);

	public function deleteByOfferImage($value);

	public function deleteByDestinationId($value);


}
?>