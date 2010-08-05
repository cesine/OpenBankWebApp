<p></p>
<?php 
session_start();
include('includes/model/Employee.Class.php');
require_once('includes/controller/Database.Class.php');
echo "<h4> Please, select option on the side menu. </h4>\n";
echo "<form action='?&content=EmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>";

?>