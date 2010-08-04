<p></p>
<?php 
session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
include ('includes/view/employeetopmenu.php');  
echo "<h4> Deactivate employee. </h4>\n";
echo "<form action='?&content=DeactivateEmployee&topMenu=EmployeeTopMenu' method='POST'>";

?>