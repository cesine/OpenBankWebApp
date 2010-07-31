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
<P></P>
<P>Please fill in the details below.</P>
<Form>
<table>
<tr><td>First name:   </td><td> <INPUT type="text" name="firstName"></td></tr>
<tr><td>Last name:    </td><td> <INPUT type="text" name="lastName"></td></tr>
<tr><td>SIN:          </td><td> <INPUT type="text" name="socialInsuranceNumber"></td></tr>
<tr><td>Date of Birth:</td><td> <INPUT type="text" name="dateOfBirth"></td></tr>
</table>
</Form>

<P> </P>

<P>Please select your choice.</P>
<table border="1">
<tr><td>Services:</td><td><select name="service" size="4" single="single">
<option value="bank   ">Banking</option>
<option value="invest  ">Investments</option>
<option value="insure   ">Insurance</option>
<option value="borrow   ">Borrowing</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Category:</td><td><select name="category" size="2" single="single">
<option value="personal   ">Personal</option>
<option value="business   ">Business</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Type:</td><td><select name="type" size="8" single="single">
<option value="checking">Chequing</option>
<option value="savings">Savings</option>
<option value="foreignCurrency">Foreign Currency</option>
<option value="creditCard">Credit cards</option>
<option value="lineOfCredits">Line of credits</option>
<option value="rSP">RSP</option>
<option value="tSFA">TSFA</option>
<option value="life">Life</option>
</select>
</td>
</tr></table>
