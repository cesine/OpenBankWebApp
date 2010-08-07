<?php
session_start();
require_once ('includes/controller/Database.Class.php');
require_once ('includes/model/User.Class.php');
if($_GET['action']=='Logout'){
	//$_SESSION['LoggedInMessage']="";
	//$_SESSION['User']="";
	session_unset();
	header('Location: index.php'); //redirects page to main page
}
/*
 * Check for login information, if present, create a user (which will try to authenticate)
 */
if($_GET['action']=='Login'){
	$userId=$_POST['$clientid'];
	unset($_POST['$clientid']);
	if(isset($_POST['$employeeid'])){
		$userId=$_POST['$employeeid'];
		unset($_POST['$employeeid']);
	}
	$pass=$_POST['$pass'];
	unset($_POST['$pass']);
	//if both clientID and password are present, check for authentication
	$userLoggedIn= new User($userId,$pass);
	if($userLoggedIn->isClient()){
		$_SESSION['User']=serialize($userLoggedIn);
		//header('Location: index.php?&content=Summary'); //redirects page to summary page
		echo "<meta http-equiv='REFRESH' content='0,url=index.php?&content=Summary'>";
	}elseif ($userLoggedIn->isEmployee()){
		$_SESSION['User']=serialize($userLoggedIn);
		//header('Location: index.php?&content=EmployeeInfo'); //redirects page to employee info page
		echo "<meta http-equiv='REFRESH' content='0,url=index.php?&content=EmployeeInfo'>";
	}else{
		session_unset;
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