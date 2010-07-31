<?php
include('includes/model/Client.Class.php');
echo '<div>';
$branchToDisplay = new Client();
$branchToDisplay->test();
$branchToDisplay->displayClientDetails();
echo '</div>';

?>

<!-- creating a table-->
<table border="1">
<tr><td> 1 </td><td> Hi! </td></tr>
<tr></tr>
<tr></tr>
</table>

<!-- Form to add a client -->
<P>Please fill in the form below.</P>
<Form>

First name: <INPUT type="text" name="firstName"><BR>
Last name:<INPUT type="text" name="lastName"><BR>
SIN: <INPUT type="text" name="socialInsuranceNumber"><BR>
</Form>

<table border="1">
<tr><td>Services:</td><td><select name="b" size="5" multiple="multiple">

<option value="bank   ">Banking</option>
<option value="invest  ">Investments</option>
<option value="insure   ">Insurance</option>
<option value="borrow   ">Borrowing</option>
</select>
</td>
</tr></table>
