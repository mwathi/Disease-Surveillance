<?php
class Deadlines extends Doctrine_Record{
	
	public function setTableDefinition(){
		$this -> hasColumn('Epiweek', 'int', 11);
		$this -> hasColumn('Deadline', 'varchar', 32);
	}//end setTableDefintion
	
	public function setUp(){
		$this -> setTableName('deadlines');
	}//end setUp
	
	public function getDeadlines(){
		$query = Doctrine_Query::create() -> select("epiweek, deadline") -> from("Deadlines");
		$deadline = $query -> execute();
		return $deadline;
	}

	
	public function tableLateReports(){
		$query = Doctrine_Query::create() -> select("Deadline,Date_Reported,Epiweek") -> from("Deadlines,Surveillance") -> where ("Surveillance.Reporting_Year = '$year' and Deadlines.Epiweek = Surveillance.Epiweek");
		$deadline = $query -> execute();
		return $deadline;
	}

		
}//end class
