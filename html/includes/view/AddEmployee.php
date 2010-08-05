<p></p>
<?php 
session_start();
include('includes/model/Employee.Class.php');
include ('includes/view/employeetopmenu.php'); 
require_once('includes/controller/Database.Class.php'); 
echo "<h4> Add employee. </h4>\n";
echo "<form action='?&content=AddEmployee&topMenu=EmployeeTopMenu' method='POST'>";

?>