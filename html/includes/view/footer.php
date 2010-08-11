<?php
if(isset($_POST['amountofdays'])){
	$_SESSION['DayOfTheMonth']=(($_SESSION['DayOfTheMonth']+$_POST['amountofdays'])%30);
	if ($_SESSION['DayOfTheMonth']==0){
		$_SESSION['DayOfTheMonth']=$_SESSION['DayOfTheMonth']+1;
	}
}?>

<footer>
<section id="about">
<div>
<p>&copy; Team 1</p>
<p></p>
<!--<form action='' method='post'>
<p>Today is the <?php echo $_SESSION['DayOfTheMonth'];?> day of the
month.</p>
Advance Date by days: (ex. 1) <input value='1' autocomplete='OFF'
	maxlength='12' size='12' name='amountofdays' type='text'> <input
	type='submit' name='mysubmit' value='Submit'>
</p>
</form>
-->

</div>
</section>
</footer>


</body>
</html>
