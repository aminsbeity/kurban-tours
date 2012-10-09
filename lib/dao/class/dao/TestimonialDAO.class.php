<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
interface TestimonialDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Testimonial 
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
 	 * @param testimonial primary key
 	 */
	public function delete($testimonial_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Testimonial testimonial
 	 */
	public function insert($testimonial);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Testimonial testimonial
 	 */
	public function update($testimonial);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTestimonialWriter($value);

	public function queryByTestimonialWriterPosition($value);

	public function queryByTestimonialDetails($value);


	public function deleteByTestimonialWriter($value);

	public function deleteByTestimonialWriterPosition($value);

	public function deleteByTestimonialDetails($value);


}
?>