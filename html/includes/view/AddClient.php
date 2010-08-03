<?php
include('includes/model/Client.Class.php');
echo '<div>';
$branchToDisplay = new Client();
$branchToDisplay->test();
$branchToDisplay->displayClientDetails();
echo '</div>';

?>

<script language="Javascript1.2"> 
function verifyFirstName(strng) {
	var error = "";
	if (strng == "") {
		error = "Please enter the client's First Name.\n";
	}
	return error;
}
function verifyLastName(strng) {
	var error = "";
	if (strng == "") {
		error = "Please enter the client's Last Name.\n";
	}
	return error;
}
function check_valid(form)
{
	var error = "";
	error += verifyFirstName(form.$firstName.value);
	error += verifyLastName(form.$lastName.value);
	if (error != "") {
		alert(error);
		return false;
	}
	return true;
}

</script> 


<!-- creating a table-->
<table border="1">
<tr><td> 1 </td><td> Hi! </td></tr>
<tr></tr>
<tr></tr>
</table>

<!-- Form to add a client -->
<P></P>
<P>Please fill in the details below.</P>
<Form>
<table>
<tr><td>First name:   </td><td> <INPUT type="text" name="$firstName"></td></tr>
<tr><td>Last name:    </td><td> <INPUT type="text" name="$lastName"></td></tr>
<tr><td>SIN:          </td><td> <INPUT type="text" name="$socialInsuranceNumber"></td></tr>
<tr><td>Date of Birth:</td><td> <INPUT type="text" name="dateOfBirth"></td></tr>
</table>
<P></P>
<P>Address:<BR>
</P>
<table>
<tr><td>Door Number:</td><td> <INPUT type="text" name="streetNumber"></td></tr>
<tr><td>Street name:</td><td> <INPUT type="text" name="streetName"></td></tr>
<tr><td>City:</td><td> <INPUT type="text" name="city"></td></tr>
<tr><td>Province:</td><td> <INPUT type="text" name="province"></td></tr>
<tr><td>Postal code:</td><td> <INPUT type="text" name="postalCode"></td></tr>
</table>
</Form>

<P> </P>

