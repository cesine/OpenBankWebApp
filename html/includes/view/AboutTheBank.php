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
}elseif($content=="Borrowing"){
	echo "paste some text here";
}elseif($content=="Investing"){
	echo "paste some text here";
}elseif($content=="Insurance"){
	echo "paste some text here";
}elseif($content=="PersonalServices"){?>

<table width="397" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr valign="top">
			<td width="5"><img src="/static/spacer.gif" width="5" height="10"></td>
			<td width="188">
			<table width="188" border="0" cellspacing="0" cellpadding="0">
							<tbody>

					<tr valign="top">
						<td width="13"><img src="/images/greyarrow.gif" alt="image" width="5"
							height="5" hspace="4" vspace="6" border="0"></td>
						<td><a href="/cda/eventdetail/0,1005,LIDen_SID3041,00.html"
							class="boldnav">Day-To-Day Banking</a> <br>
							<a href="/cda/content/0,1608,CID13190_LIDen,00.html"
							style="font-size: 11px;">Accounts & Plans</a>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			</td>
			<td width="11"><img src="/static/spacer.gif" width="5" height="10"></td>

			<td width="5"><img src="/static/spacer.gif" width="5" height="10"></td>
			<td width="188">
			<table width="188" border="0" cellspacing="0" cellpadding="0">

				<tbody>
					<tr valign="top">
						<td width="13"><img src="/images/greyarrow.gif" alt="image" width="5"
							height="5" hspace="4" vspace="6" border="0"></td>
						<td><a href="/cda/eventdetail/0,1005,LIDen_SID3042,00.html"
							class="boldnav">Borrowing</a> <br>
						<a href="/cda/content/0,1608,CID13386_LIDen,00.html"
							style="font-size: 11px;">Credit Cards</a>, <a
							href="/cda/content/0,1608,CID518_LIDen,00.html"
							style="font-size: 11px;">Line of Credit</a>
						</td>
					</tr>
				</tbody>
			</table>

			<br>
			</td>
			<td width="11"><img src="/static/spacer.gif" width="5" height="10"></td>
		</tr>


		<tr valign="top">
			<td width="5"><img src="/static/spacer.gif" width="5" height="10"></td>

			<td width="188">
			<table width="188" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr valign="top">
						<td width="13"><img src="images/greyarrow.gif" alt="image" width="5"
							height="5" hspace="4" vspace="6" border="0"></td>
						<td><a href="/cda/eventdetail/0,1005,LIDen_SID3043,00.html"
							class="boldnav">Investing</a> <br>
						<a href="/cda/content/0,1608,CID836_LIDen,00.html"
							style="font-size: 11px;">GICs</a>, <a
							href="/cda/content/0,1608,CID7207_LIDen,00.html"
							style="font-size: 11px;">RSPs</a>, <a
							href="/cda/content/0,1608,CID12354_LIDen,00.html"
							style="font-size: 11px;">TFSA</a> 
							</td>
					</tr>
				</tbody>
			</table>

			<br>
			</td>
			<td width="11"><img src="/static/spacer.gif" width="5" height="10"></td>

			<td width="5"><img src="/static/spacer.gif" width="5" height="10"></td>
			<td width="188">
			<table width="188" border="0" cellspacing="0" cellpadding="0">

				<tbody>
					<tr valign="top">
						<td width="13"><img src="/images/greyarrow.gif" alt="image" width="5"
							height="5" hspace="4" vspace="6" border="0"></td>
						<td><a href="/cda/eventdetail/0,1005,LIDen_SID3044,00.html"
							class="boldnav">Insurance</a> <br>
						<a href="/cda/content/0,1608,CID12581_LIDen,00.html"
							style="font-size: 11px;">Life & Health Insurance</a>
						</td>
					</tr>
				</tbody>
			</table>

			<br>
			</td>
			<td width="11"><img src="/static/spacer.gif" width="5" height="10"></td>

		</tr>
	</tbody>
</table>
<?php 
}elseif($content=="BusinessServices"){
	echo "paste some text here";
}
?>



