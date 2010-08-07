<p></p>
<?php 


	if (isset($_SESSION['Employee']))
	{
		$employee=unserialize($_SESSION['Employee']);
		if ($employee->canEditHR())
		{
			echo "<h4> Branch manager is log in. </h4><p></p>";
		}
		else
		{
			echo "<h4> Regular employee log in . </h4><p></p>";
		}
	}

?>