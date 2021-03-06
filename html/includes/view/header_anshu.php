<?php
session_start();
if(!isset($_SESSION['DayOfTheMonth'])){
	$_SESSION['DayOfTheMonth']=2;
}
require_once ('includes/controller/Database.Class.php');
require_once ('includes/model/User.Class.php');
require_once ('includes/model/Client.Class.php');
require_once ('includes/model/Employee.Class.php');
if($_GET['action']=='Logout'){
	//$_SESSION['LoggedInMessage']="";
	//$_SESSION['User']="";
	session_unset();
	unset($_GET);
	//header('Location: index_anshu.php'); //redirects page to main page
	echo "<meta http-equiv='REFRESH' content='0,url=index_anshu.php?&content='>";//redirects page to summary page
}
if($_GET['action']=='ExitClient'){
	//$_SESSION['LoggedInMessage']="";
	//$_SESSION['User']="";
	unset($_SESSION['Client']);
	//header('Location: index_anshu.php'); //redirects page to main page
	echo "<meta http-equiv='REFRESH' content='0,url=index_anshu.php?&content=LoginAsClient'>";//redirects page to summary page
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
		echo "<meta http-equiv='REFRESH' content='0,url=index_anshu.php?&content=AllAccountsSummary'>";//redirects page to summary page
	}elseif ($userLoggedIn->isEmployee()){
		$_SESSION['User']=serialize($userLoggedIn);
		$employee= new Employee();
		$employee->initializeEmployee($_POST['$employeeid']);
		$_SESSION['Employee']=serialize(($employee));
		echo "<meta http-equiv='REFRESH' content='0,url=index_anshu.php?&content=EmployeeInfo'>";//redirects page to employee info page
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
		$_SESSION['LoggedInMessageClient']="Logged in as client: ".$employeeAsClient->getClientID();
		//Now the client information is in the session variable, can use it to get the account information
		echo "<meta http-equiv='REFRESH' content='0,url=index_anshu.php?&content=AllAccountsSummary&action=AsClient'>";
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