<?php
session_start();

//If the User is not in the session variable, redirect to the index main page
if (!isset($_SESSION['User']))
{
	//header('Location:../index.php');
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
<?php 
require_once ('includes/controller/Database.Class.php');
require_once ('includes/model/User.Class.php');

if($_GET['action']=='Logout'){
	//$_SESSION['LoggedInMessage']="";
	//$_SESSION['User']="";
	session_unset();
}
/*
 * Check for login information, if present, create a user (which will try to authenticate)
 */
$clientId=$_POST['$clientid'];
unset($_POST['$clientid']);
$pass=$_POST['$pass'];
unset($_POST['$pass']);
//if both clientID and password are present, check for authentication
if($_GET['action']=='Login'){
	require_once ('includes/model/User.Class.php');
	$userLoggedIn= new User($clientId,$pass);
	if($userLoggedIn->isClient()||$userLoggedIn->isEmployee()){
		$_SESSION['User']=serialize($userLoggedIn);
	}else{
		session_unset;
	}
}
?>