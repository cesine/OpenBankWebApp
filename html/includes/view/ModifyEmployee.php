<?php 
session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
echo "<h4> Modify employee. </h4>\n";
echo "<form action='?&content=EmployeeLogin&topMenu=EmployeeTopMenu' method='POST'>";

?>