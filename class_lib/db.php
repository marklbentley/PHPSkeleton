<?php
/*
+--------------------------------------------
|
|   Light weight PHP Framework
|   Author: Mark L Bentley
|   github.com/marklbentley/miniphpframework
|
+--------------------------------------------
|
|   database class
|
|
+--------------------------------------------
*/


//===========================================
// Methods List
//===========================================
//
// __construct
// query
// single
// multi
// disconnect
// __destruct
//
//===========================================




class Database{



public $db;

//create database connection
	function __construct(){

		$this -> db = @new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PWORD, MYSQL_DB);
		
		if ($this -> db -> connect_error) {
          die('Connect Error, '. $this -> db ->connect_errno . ': ' . $this -> db ->connect_error);
        }
		
		}//end __construct

//make database query
	function query($sql){
  
        $result = mysqli_query($this -> db, $sql);
		return $result;
		
		}//end query

//fetch_assoc
    function single($result){
	
	    $row = mysqli_fetch_assoc($result);
		return $row;
	}

//fetch_array
    function multi($result){
	
	   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	   return $row;
	 }
		
//real_escape_string
    function clean($string){
	
	    $string = $this -> db -> real_escape_string(htmlentities($string));
	    return $string;
	    }
		
//disconnect from database
	private function disconnect(){

		mysqli_close($this->db);

	    }//end disconnect

	public function __destruct(){

        $this->disconnect();

	   }//end __destruct
  

}//end database class
?>