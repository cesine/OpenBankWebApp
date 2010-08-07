<?php 
	require_once('includes/model/Employee.Class.php');
?>
<p></p>
<?php 

	echo "<h4> My employee info. </h4><p></p>";
	
	if (isset($_SESSION['Employee']))
	{
		$employeeID=unserialize($_SESSION['Employee']);
		$employeeID->getEmployeeID();
		echo "<h5> Employee ID: $employeeID </h5><p></p>";		

	}

?>