<?php
/**
 * Class that operate on table 'testimonial'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-09-07 15:16
 */
class TestimonialMySqlDAO implements TestimonialDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TestimonialMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM testimonial WHERE testimonial_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM testimonial';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM testimonial ORDER BY '.$orderColumn.' desc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param testimonial primary key
 	 */
	public function delete($testimonial_id){
		$sql = 'DELETE FROM testimonial WHERE testimonial_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($testimonial_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TestimonialMySql testimonial
 	 */
	public function insert($testimonial){
		$sql = 'INSERT INTO testimonial (testimonial_writer, testimonial_writer_position, testimonial_details) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($testimonial->testimonialWriter);
		$sqlQuery->set($testimonial->testimonialWriterPosition);
		$sqlQuery->set($testimonial->testimonialDetails);

		$id = $this->executeInsert($sqlQuery);	
		$testimonial->testimonialId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TestimonialMySql testimonial
 	 */
	public function update($testimonial){
		$sql = 'UPDATE testimonial SET testimonial_writer = ?, testimonial_writer_position = ?, testimonial_details = ? WHERE testimonial_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($testimonial->testimonialWriter);
		$sqlQuery->set($testimonial->testimonialWriterPosition);
		$sqlQuery->set($testimonial->testimonialDetails);

		$sqlQuery->setNumber($testimonial->testimonialId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM testimonial';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTestimonialWriter($value){
		$sql = 'SELECT * FROM testimonial WHERE testimonial_writer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTestimonialWriterPosition($value){
		$sql = 'SELECT * FROM testimonial WHERE testimonial_writer_position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTestimonialDetails($value){
		$sql = 'SELECT * FROM testimonial WHERE testimonial_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTestimonialWriter($value){
		$sql = 'DELETE FROM testimonial WHERE testimonial_writer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTestimonialWriterPosition($value){
		$sql = 'DELETE FROM testimonial WHERE testimonial_writer_position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTestimonialDetails($value){
		$sql = 'DELETE FROM testimonial WHERE testimonial_details = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TestimonialMySql 
	 */
	protected function readRow($row){
		$testimonial = new Testimonial();
		
		$testimonial->testimonialId = $row['testimonial_id'];
		$testimonial->testimonialWriter = $row['testimonial_writer'];
		$testimonial->testimonialWriterPosition = $row['testimonial_writer_position'];
		$testimonial->testimonialDetails = $row['testimonial_details'];

		return $testimonial;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TestimonialMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>