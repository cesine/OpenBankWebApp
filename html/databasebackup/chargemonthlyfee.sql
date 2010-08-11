drop event chargemonthlyfee;
create event chargemonthlyfee 
on schedule every 1 minute
enable
do call chargemonthly;

DROP PROCEDURE IF EXISTS `chargemonthly`;
DELIMITER $$
CREATE  PROCEDURE `chargemonthly`()

BEGIN
	DECLARE	done INT DEFAULT 0;
	DECLARE acctype INT;
	DECLARE monthlycharge DECIMAL;
	DECLARE feetype INT;
	DECLARE balance DECIMAL;
	DECLARE newbalance DECIMAL;
	DECLARE account INT;
	DECLARE q TEXT;
	DECLARE cursor1 CURSOR FOR SELECT a.clientaccountid, a.currentbalance, b.monthlyfee FROM `clientaccount` a, `bankingplans` b WHERE a.accounttypeid=b.accounttypeid AND a.accounttypeid=1;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done=1;

 	SET newbalance =2;
        SET account=210004074;
	SET newbalance= 3;
	open cursor1;
REPEAT
	FETCH cursor1 INTO account, balance, monthlycharge;
	SET newbalance=balance + monthlycharge;	

	INSERT INTO  transaction 
	(`transactionid` ,`branchid` ,`accountid` , 
	`date` ,`transactionfeecharged`,`transactionfeetype` ,	
	`depositamount` ,`withdrawalamount` , `balanceaftertransaction` ,
	`transactiondescription` , `transperformedby`)	
	VALUES 
	(NULL,10001,account,
	CURDATE(),monthlycharge,'fee',
	'NULL',monthlycharge,newbalance,
	'Monthly Fee', 20000001);

	UPDATE clientaccount SET `currentbalance` = newbalance WHERE `clientaccountid`=account;

UNTIL done END REPEAT;
END 
$$
DELIMITER ;
