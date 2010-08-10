<?php 
require_once 'includes/model/Client.Class.php';
require_once 'includes/model/Transaction.Class.php';

/*
 * Get client from session variable, then display list of
 */
if(isset($_SESSION)){
	$client= new Client();
	$client = unserialize($_SESSION['Client']);

	
	if($_POST['action']=="transfer"){
		echo "<p>Money Transfered.</p>";
		$_SESSION['DisplayAccount']=$_POST[fromaccount];
		include 'includes/view/RecentActivity.php';
	}else{	
		echo "<form action='' method='post'>
		<table cellpadding='0' cellspacing='2' width='100%' border=0>
		<tbody>
			<tr>
				<td  align='left'>
					<font class='regularTextBold'>Transfer money </font>
				</td>
			</tr>
			<tr>
				<td  width='33%'><label
					for='amount' >Amount ($):</label>
				</td>
			</tr>
			<tr>
				<td >
				<input value='' autocomplete='OFF' maxlength='8' size='8'
					name='amount' type='text'>
				</td>
			</tr>
			<tr>
				<td align='right'><label
					for='fromaccount' >From: </label>";
		$client->displaySelectAccountWithChooseSelect("fromaccount");
		echo "</td>
			</tr>
			
			<tr>
				<td align='right' ><label
					for='toaccount' >To: </label>";
		$fromaccount='$fromaccount';
		$client->displaySelectAccountWithChooseSelect("toaccount");
		echo "</td>
			</tr>
			</tbody>
		</table>
		<input type='hidden' name='action' value='transfer'>
		<input type='submit' name='mysubmit' value='Submit'>";
	}//end if action is not set to transfer, ie a transfer has not been made
}else{
	echo "Please log in.";
}
?>