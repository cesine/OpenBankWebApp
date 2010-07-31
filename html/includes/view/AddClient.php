<?php
include('includes/model/client.Class.php');
echo '<div>';
$branchToDisplay = new Client();
$branchToDisplay->test();
$branchToDisplay->displayClientDetails();
echo '</div>';

?>