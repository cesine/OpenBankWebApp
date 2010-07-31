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
<P></P>
<P>Address:</P>
<P>If applicable, please give the apartment number with a hyphen. (ex: 45-3456)</P>
<table>
<tr><td>Door Number:</td><td> <INPUT type="text" name="streetNumber"></td></tr>
<tr><td>Street name:</td><td> <INPUT type="text" name="streetName"></td></tr>
<tr><td>City:</td><td> <INPUT type="text" name="city"></td></tr>
<tr><td>Province:</td><td> <INPUT type="text" name="province"></td></tr>
<tr><td>Postal code:</td><td> <INPUT type="text" name="postalCode"></td></tr>
</table>
</Form>

<P> </P>

<P>Please select your choice.</P>
<table border="1">
<tr><td>Services:</td><td><select name="service" size="4" single="single">
<option value="banking">Banking</option>
<option value="investments">Investments</option>
<option value="insurance">Insurance</option>
<option value="borrowing">Borrowing</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Category:</td><td><select name="serviceCategory" size="2" single="single">
<option value="personal">Personal</option>
<option value="business">Business</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Type:</td><td><select name="serviceType" size="8" single="single">
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

<P></P>

<!-- The following values have to be changed after Anshu updates the table -->
<table border="1"> 
<tr><td>Account name:</td><td><select name="accountType" size="8" single="single">
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


