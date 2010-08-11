drop event chargemonthlyfee;
create event chargemonthlyfee 
on schedule every 1 minute
enable
do call chargemonthly;

DROP PROCEDURE IF EXISTS `chargemonthly`;
DELIMITER $$
CREATE  PROCEDURE `chargemonthly`()

BEGIN
	DECLARE acctype INT;
	DECLARE monthlycharge DECIMAL;
	DECLARE feetype INT;
	DECLARE balance DECIMAL;
	DECLARE newbalance DECIMAL;
	DECLARE account INT;
	DECLARE q TEXT;
	DECLARE cursor1 CURSOR FOR SELECT a.clientaccountid, a.currentbalance, b.monthlyfee FROM `clientaccount` a, `bankingplans` b WHERE a.accounttypeid=b.accounttypeid AND a.accounttypeid=1;
 	SET newbalance =2;
        SET account=210004074;
	SET newbalance= 3;
	open cursor1;
REPEAT
	FETCH cursor1 INTO account, balance, monthlycharge;
 
	SET newbalance=balance + monthlycharge;	

	SET q  = CONCAT("INSERT INTO  transaction 
	(`transactionid` ,`branchid` ,`accountid` , 
	`date` ,`transactionfeecharged`,`transactionfeetype` ,	
	`depositamount` ,`withdrawalamount` , `balanceaftertransaction` ,
	`transactiondescription` , `transperformedby`)	
	VALUES 
	(NULL,10001,",account,",",
	CURDATE(),",",monthlycharge,",'fee',
	NULL,",monthlycharge,",",newbalance,",
	'Monthly Fee', 20000001);");

	PREPARE ps_q FROM @q;
	EXECUTE ps_q;
	DEALLOCATE PREPARE ps_q;
UNTIL done END REPEAT;
END 
$$
DELIMITER ;
