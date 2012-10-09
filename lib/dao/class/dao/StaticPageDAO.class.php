<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface StaticPageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return StaticPage 
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
 	 * @param staticPage primary key
 	 */
	public function delete($static_page_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StaticPage staticPage
 	 */
	public function insert($staticPage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param StaticPage staticPage
 	 */
	public function update($staticPage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStaticPageName($value);

	public function queryByStaticPageTitle($value);

	public function queryByStaticPageSubtitle($value);

	public function queryByStaticPageDetails($value);

	public function queryByStaticPageImage($value);


	public function deleteByStaticPageName($value);

	public function deleteByStaticPageTitle($value);

	public function deleteByStaticPageSubtitle($value);

	public function deleteByStaticPageDetails($value);

	public function deleteByStaticPageImage($value);


}
?>