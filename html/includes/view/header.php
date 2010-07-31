<?php
session_start();

//If the User is not in the session variable, redirect to the index main page
if (!isset($_SESSION['User']))
{
	//header('Location:../index.php');
}

//Include the Authentication information
require_once ('includes/model/Authentication.Class.php');
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