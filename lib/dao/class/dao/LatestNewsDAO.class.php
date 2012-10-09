<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-10 17:52
 */
interface LatestNewsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LatestNews 
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
 	 * @param latestNew primary key
 	 */
	public function delete($latest_news_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LatestNews latestNew
 	 */
	public function insert($latestNew);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LatestNews latestNew
 	 */
	public function update($latestNew);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLatestNewsTitle($value);

	public function queryByLatestNewsDetails($value);

	public function queryByLatestNewsDate($value);

	public function queryByLatestNewsImage($value);


	public function deleteByLatestNewsTitle($value);

	public function deleteByLatestNewsDetails($value);

	public function deleteByLatestNewsDate($value);

	public function deleteByLatestNewsImage($value);


}
?>