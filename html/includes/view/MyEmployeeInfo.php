<?php 
	require_once('includes/model/Employee.Class.php');
?>
<p></p>
<?php 

	echo "<h4> My employee info. </h4><p></p>";
	
	if (isset($_SESSION['Employee']))
	{
		$employee=unserialize($_SESSION['Employee']);
		$employee->getEmployeeID();
		$employeeID=$employee->getEmployeeID();
		echo "<h5> Employee ID: $employeeID </h5><p></p>";		

	}

?>