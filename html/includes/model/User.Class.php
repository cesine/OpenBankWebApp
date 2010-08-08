<?php
//include('includes/controller/Database.Class.php'); //included automaticaly by the header
class User{
	private $userId;
	private $password;
	private $clientId;
	private $employeeId;
	private $isClient;
	private $isEmployee;

	public function isEmployee(){
		return $this->isEmployee;
	}
	public function  isClient(){
		return $this->isClient;
	}
	
	public function __construct($userIdIn, $passwordIn){
		$this->userId=$userIdIn;
		$this->password=$passwordIn;
		$this->isClient=false;
		$this->isEmployee=false;

		$db = new Database();
		$db->connect();

		/*
		 * Check to see if its an employee
		 */
		$queryToDo= "SELECT DISTINCT *
			FROM employeelogin
			WHERE employeeid=".$userIdIn;
		$db->query($queryToDo);
		print_r($db->queryFirstResult);
		echo "<p>";
		$_SESSION['LoggedInMessage']="";
		unset($_SESSION['LoggedInMessage']);
		//echo $userIdIn.$passwordIn;
		if($db->queryFirstResult[passwd]==$this->password && $db->queryResultsCount>0){
			$this->employeeId=$this->userId;
			$this->isEmployee=true;
		}
		/*
		 * Check to see if its a client
		 */
		$queryToDo= "SELECT DISTINCT *
			FROM clientlogin
			WHERE clientid=".$userIdIn;
		$db->query($queryToDo);
		$db->close();
		//echo "clientlogin results";
		//print_r($db->queryFirstResult);
		if($db->queryFirstResult[passwd]==$this->password  && $db->queryResultsCount>0){
			$this->clientId=$this->userId;
			$this->isClient=true;
		}
		/*
		 * Display logged in as client, or swith to client if the user can be both client and employee
		 */
		if($this->isEmployee==false && $this->isClient==true){
			$_SESSION['LoggedInMessageClient']="Logged in as client: ".$this->clientId;
			$this->password="Authenticated";
		}elseif($this->isEmployee==false && $this->isClient==false){
			$_SESSION['LoggedInMessage']="Username or password invalid.";
			$this->password="NotAuthenticated";
		}elseif($this->isEmployee==true && $this->isClient==true){
			$_SESSION['LoggedInMessageEmployee']="Logged in as employee: ".$this->employeeId."<br/><a href=''>Switch to ".$this->clientId."</a>";
			$this->password="Authenticated";
		}elseif($this->isEmployee==true && $this->isClient==false){
			$_SESSION['LoggedInMessageEmployee']="Logged in as employee: ".$this->employeeId;
			$this->password="Authenticated";
		}else{
			$_SESSION['LoggedInMessage']="Login error.";
			$this->password="NotAuthenticated";
		}
				
		echo "</p>";
	

	}



}


?>