<p></p>
<?php 


	if (isset($_SESSION['Employee']))
	{
		$employee=unserialize($_SESSION['Employee']);
		if ($employee->canEditHR())
		{
			echo "<h4> Branch manager has logged in. </h4><p></p>";
		}
		else
		{
			echo "<h4> Regular employee has logged in . </h4><p></p>";
		}
	}

?>