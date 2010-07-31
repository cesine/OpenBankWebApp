<?php 
include('includes/model/ClientAccount.Class.php');
echo '<div>';
$accountNo1 = new ClientAccount();
$accountNo1->test();


echo '</div>';
?>
<TABLE border="0" cellspacing="1" cellpadding="3" width="100%">
<TR class="bgcoloroption0">
	<TD class="fieldTitleLeftC" valign=top width="30%"><nobr>Account Type</nobr></TD>

	<TD class="fieldTitleCenterC" valign=top width="20%"><nobr>Account Number</nobr></TD>
	<TD class="fieldTitleRightC" valign=top width="25%"><A class="hyperlinkItem" HREF="/html/en/infoaccts.hlp.html#current_balance" onClick="staticPage('')" TARGET="HelpWindow">Current<br> Balance&nbsp;CAD</A></TD>
	<TD class="fieldTitleRightC" valign=top width="25%"><A class="hyperlinkItem" HREF="/html/en/infoaccts.hlp.html#available_balance" onClick="staticPage('')" TARGET="HelpWindow">Available<br> Balance&nbsp;CAD</A></TD>
</TR>
<?php $accountNo1->DisplayAcountDetailsInRow();?>


</TABLE>
