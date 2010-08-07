<?php

$content = $_GET["content"];

if($content=="Banking"){
	echo "<div class='containerLeft'>Our Bank offers a variety of chequing accounts to simplify the way 
	you want to bank and get control of your money. Whether you are looking to 
	<a href='index.php?&content=OpenNewAccount'>open a new account</a>, or 
	<a href='index.php'>make changes to your existing account</a>, we
	are there every step of the way to help you 
	<a href='index.php?&content=OpenNewAccount'>find the right account</a> for your everyday banking needs.<br /><br />
          <img src='images/greyarrow.gif' border='0' /> 
            Check out our <a href='index.php?&content=BankingRates'>current rates</a><br />
          <img src='images/greyarrow.gif' border='0' /> 
            <a href=''>Day-to-Day Banking Companion Booklet</a> <span class='smalltext'>&#91;PDF: 499 kb&#93;</span><br />
          <img src='images/greyarrow.gif' border='0' /> 
            Visit any <a href='index.php?&content=BranchLocator'>Branch</a><br />
          <img src='images/greyarrow.gif' border='0' /> Call us at 1-800-000-0000
        </div> ";
}

?>