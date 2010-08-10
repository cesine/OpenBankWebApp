<?php

//include the variables which are defined in the config file.
require_once 'configMySQL.php';

/*
 * A class which opens and closes a connection to the database
 */
class Database {
	
	var $server   = ""; //database server
	var $user     = ""; //database login name
	var $pass     = ""; //database login password
	var $database = ""; //database name
	var $pre      = ""; //table prefix

	var $queryResultsResource;
	var $queryFirstResult;
	var $queryResultsCount;
	
	
	var $link_id;

	var $error = "";
	var $errno = 0;
	
	
	public function __construct(){
		/*
		 * Get the values from the config file (where they are defined as constants)
		 */
		$this->server=constant("DB_SERVER");
	    $this->user=constant("DB_USER");
	    $this->pass=constant("DB_PASS");
	    $this->database=constant("DB_DATABASE");
	    $this->pre="";
	}
	public function query($querystring){
		//References: http://php.net/manual/en/function.mysql-query.php
		
		//mysql_query will connect to the connection number provided 
		if ($this->queryResultsResource= mysql_query($querystring,$this->link_id)){
			//mysql_num_rows will give the number of rows in the result resource
			$this->queryResultsCount=mysql_num_rows($this->queryResultsResource);
			//mysql_fetch_array must be used on the resource which is returned by mysql_query,
			//it eats a row off of the results.
			$copyResource= mysql_query($querystring,$this->link_id);
			$this->queryFirstResult= mysql_fetch_array($copyResource);

		}else{
			$this->queryFirstResult="";
			$this->queryResultsCount="0";
		}
	}
	/*
	 * Atomic: The statements in a transaction are treated as a single unit. 
	 * Either all the designated operations are performed, or none are performed. 
	 * Only when all operations are performed successfully are the results of 
	 * that transaction applied to the database.
	 */
	public function transactionSafeInsertUpdate($queryArray){
		mysql("START TRANSACTION");
		//foreach array do an insert or update
		$c=0;
		foreach($queryArray as $query){
			$querySuccessResultsArray[$c]=$this->insert($query);
		}
		mysql("COMMIT");
		return $querySuccessResultsArray;
	}
	/* returns the id number of the inserted row, 
	 * if the row was an autoincrement.
	 * 
	 * duplicate insertions are done using unique keys on almost all atributes
	 */
	public function insert($querystring){
		$this->queryResultsResource=mysql_query($querystring,$this->link_id);
		$this->queryResultsCount=0;
		$this->queryFirstResult="";
		return mysql_insert_id();
	}
	/* untested
	 * 
	 */
	public function update($querystring){
		$this->queryResultsResource=mysqli_query($querystring);
		$this->queryResultsCount=0;
		$this->queryFirstResult="";
		return $this->queryResultsResource;
		 
	}
	/* DEPRECIATED: use insert or update instead (see above)
	 * 
	 */
	public function updateInsert($querystring){
		$this->queryResultsResource=mysql_query($querystring,$this->link_id);
		$this->queryResultsCount=0;
		$this->queryFirstResult="";
		return mysql_insert_id();
		/*
		 * Re: how to prevent duplicate rows but allow duplicate column entries
		Posted by: laptop alias ()
		Date: October 04, 2008 06:18AM
		
		The key can actually be 1000 bytes. 
		
		So maybe you could use a separate field for your PRIMARY KEY, and then guarantee uniqueness on only the first 333 bytes of each field like so: 
		
		DROP TABLE IF EXISTS `names`; 
		
		CREATE TABLE IF NOT EXISTS `names` ( 
		`id` int(11) NOT NULL auto_increment, 
		`fname` text NOT NULL, 
		`mname` text NOT NULL, 
		`lname` text NOT NULL, 
		`rank` int(11) default NULL, 
		PRIMARY KEY (`id`), 
		UNIQUE KEY `name` (`fname`(333),`mname`(333),`lname`(333)) 
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
		 */
	}
	public function close(){
		//close the database connection
		if(!@mysql_close($this->link_id)){
	        $this->oops("Connection close failed.");
	    }
	}
	public function connect($new_link=false){
		//connect to the database
		$this->link_id=@mysql_connect($this->server,$this->user,$this->pass,$new_link);
		
		//if the mysql returns no link the connection failed
	    if (!$this->link_id) {//open failed
        	$this->oops("Could not connect to server: <b>$this->server</b>.");
        }
	    if(!@mysql_select_db($this->database, $this->link_id)) {//no database
	        $this->oops("Could not open database: <b>$this->database</b>.");
        }
        // unset the data so it can't be dumped
	    $this->server='';
	    $this->user='';
	    $this->pass='';
	    $this->database='';
	    
	    //$this->oops("Connection was successfull.");
	   //return the link number so that the user can query on  that specific connection
	   return $this->link_id;
	}
	public function oops($mesg){    
		if($this->link_id>0){
	        $this->error=mysql_error($this->link_id);
	        $this->errno=mysql_errno($this->link_id);
	    }
	    else{
	        $this->error=mysql_error();
	        $this->errno=mysql_errno();
	    }
		
		 echo '<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
        <tr><th colspan=2>Database Error</th></tr>
        <tr><td align="right" valign="top">Message:</td><td>'.
		  $msg.
		'</td></tr>';
		if(strlen($this->error)>0){
			echo'<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>'.$this->error.'</td></tr>';
		}
		echo '</table>';
	}
}

?>
