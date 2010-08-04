<?php 
//session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
include ('includes/view/employeetopmenu.php');  

require_once('includes/model/Branch.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');
require_once('includes/model/EmployeeWorkHistory.Class.php');

echo "<form action='?&content=ModifyEmployee&topMenu=EmployeeTopMenu' method='POST'>";
?>

<p></p>

<?php 
echo "<h4> Modify employee. </h4>\n";
?>