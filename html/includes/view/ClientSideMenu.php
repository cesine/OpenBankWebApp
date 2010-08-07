<!-- Side Menu -->


<table width="145" 
	style="BORDER-RIGHT: #999966 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #999966 1px solid; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 5px; BORDER-LEFT: #999966 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #999966 1px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">
	<tbody>
	<tr>
		<td colspan="2" class="bgcoloroption0">
		<div align="center">
		<p class="fieldTitleLeftC">Banking Center</p>
		</div>
		</td>
	</tr>

<?php 
echo "<tr valign='middle'>
		<td width='14' height='33' align='center'></td>
		<td width='124'>".$_SESSION['LoggedInMessage']."</td>
	</tr>";

if (!isset($_SESSION['User'])){
	echo "<tr valign='middle'>
		<td width='14' height='55' align='center'><img
		src='/images/red_bullet_trans.gif' width='6' height='7'></td>
		<td width='124'><a
		href='index.php?&content=Login'
		class='linkVertMenu'>Log in to Online Banking</a></td>
	</tr>";
}else{
	echo "<tr valign='middle'>
		<td width='14' height='21' align='center'><img
		src='/images/red_bullet_trans.gif' width='6' height='7'></td>
		<td width='124'><a
		href='index.php?&content=Login&action=Logout'
		class='linkVertMenu'>Logout</a></td>
	</tr>";
}
?>
	<tr valign="middle">
		<td width="14" height="21" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td width="124"><a
		href="index.php?&content=OpenNewAccount"
		class="linkVertMenu">Open an Account</a></td>
	</tr>

	<tr valign="middle">
		<td height="22" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=TransferFunds"
		class="linkVertMenu">Transfer Funds</a></td>
	</tr>

	<tr valign="middle">
		<td height="22" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=Statement"
		class="linkVertMenu">Statements</a></td>
	</tr>

	<tr valign="middle">
		<td height="22" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=BillPayments"
		class="linkVertMenu">Bill Payments</a></td>
	</tr>
	
</tbody>
</table>