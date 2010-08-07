<?php
//echo "<form action='?&content=EmployeeSideMenu&topMenu=EmployeeTopMenu' method='POST'>";  
?>

<!-- Side Menu For Employee (branch manager) -->

<table width="145" 
	style="BORDER-RIGHT: #999966 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #999966 1px solid; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 5px; BORDER-LEFT: #999966 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #999966 1px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">
	<tbody>
	<tr>
		<td colspan="2" class="bgcoloroption0">
		<div align="center">
		<p class="fieldTitleLeftC">Select An Employee Option</p>
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
		class='linkVertMenu'>Log in Employee Interface</a></td>
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
	<?php 
	if (isset($_SESSION['Employee']))
	{
		
	
	$employee=unserialize($_SESSION['Employee']);
	if ($employee->canEditHR())
	{
	?>
	<tr valign="middle">
		<td width="14" height="21" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td width="124"><a
		href="index.php?&content=ViewEmployeeInfo"
		class="linkVertMenu">View employee info</a></td>
	</tr>

	<tr valign="middle">
		<td height="22" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=AddEmployee"
		class="linkVertMenu">Add employee</a></td>
	</tr>

	<tr valign="middle">
		<td height="36" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=ModifyEmployee"
		class="linkVertMenu">Modify employee</a></td>
	</tr>

	<tr valign="middle">
		<td height="21" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="index.php?&content=DeactivateEmployee"
		class="linkVertMenu">Deactivate employee</a></td>
	</tr>
	<?php 
	}
	}
	?>

</tbody>
</table>