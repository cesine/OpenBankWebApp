<p></p>
<?php 


	if (isset($_SESSION['Employee']))
	{
		$employee=unserialize($_SESSION['Employee']);
		if ($employee->canEditHR())
		{
			echo "<h4> Please, select option on the side menu. </h4><p></p>";
		}
		else
		{
			echo "<h4> You can't use Employee Info . </h4><p></p>";
		}
	}

?>