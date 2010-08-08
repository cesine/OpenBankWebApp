<?php
session_start();
require_once ('includes/controller/Database.Class.php');
require_once ('includes/model/User.Class.php');
require_once ('includes/model/Client.Class.php');
require_once ('includes/model/Employee.Class.php');
if($_GET['action']=='Logout'){
	//$_SESSION['LoggedInMessage']="";
	//$_SESSION['User']="";
	session_unset();
	//header('Location: index.php'); //redirects page to main page
	echo "<meta http-equiv='REFRESH' content='0,url=index.php'>";//redirects page to summary page
}
/*
 * Check for login information, if present, create a user (which will try to authenticate)
 */
if($_GET['action']=='Login'){
	$userId=$_POST['$clientid'];
	if(isset($_POST['$employeeid'])){
		$userId=$_POST['$employeeid'];
	}
	$pass=$_POST['$pass'];
	unset($_POST['$pass']);
	//if both clientID and password are present, check for authentication
	$userLoggedIn= new User($userId,$pass);
	if($userLoggedIn->isClient()){
		$_SESSION['User']=serialize($userLoggedIn);
		$client = new Client();
		$client->initializeClient($_POST['$clientid']);
		$_SESSION['Client']=serialize($client);
		echo "<meta http-equiv='REFRESH' content='0,url=index.php?&content=AllAccountsSummary'>";//redirects page to summary page
	}elseif ($userLoggedIn->isEmployee()){
		$_SESSION['User']=serialize($userLoggedIn);
		$employee= new Employee();
		$employee->initializeEmployee($_POST['$employeeid']);
		$_SESSION['Employee']=serialize(($employee));
		echo "<meta http-equiv='REFRESH' content='0,url=index.php?&content=EmployeeInfo'>";//redirects page to employee info page
	}else{
		session_unset;
	}
}
if($_GET['action']=='LoginAsClient' && isset($_SESSION['User'])){
	$user=unserialize($_SESSION['User']);
	if ($user->isEmployee()){
		$employeeAsClient= new Client();
		$employeeAsClient->initializeClient($_POST['$clientid']);
		$_SESSION['Client']=serialize($employeeAsClient);
		//Now the client information is in the session variable, can use it to get the account information
		echo "<meta http-equiv='REFRESH' content='0,url=index.php?&content=AllAccountsSummary&action=AsClient'>";
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>The Bank</title>
<link href="css/SOPStyles.css" rel="stylesheet" type="text/css" />
<link href="css/master.css" rel="stylesheet" type="text/css" />

<script language="Javascript" src="javascript/script.js" type="text/javascript">
<!-- -->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

</head>

<body>