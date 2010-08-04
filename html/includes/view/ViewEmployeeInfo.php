<?php 
session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
echo "<h4> View employee info. </h4>\n";
echo "<form action='?&content=ViewEmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>";

?>