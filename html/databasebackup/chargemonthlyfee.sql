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
	DECLARE monthcharge DECIMAL;
	DECLARE feetype INT;
	DECLARE newbalance DECIMAL;
	DECLARE sec INT;	
	DECLARE account INT;
	DECLARE cursor1 CURSOR FOR SELECT clientaccountid FROM `clientaccount` WHERE accounttypeid=1;
 	SET @newbalance =2;
        SET @fee=3;
        SET account=210004074;

	open cursor1;
	FETCH cursor1 INTO account;
 
	
	SET @newbalance =2;
	SET @fee=3;
	SET @q  = CONCAT("INSERT INTO  transaction 
	(`transactionid` ,`branchid` ,`accountid` , 
	`date` ,`transactionfeecharged`,`transactionfeetype` ,	
	`depositamount` ,`withdrawalamount` , `balanceaftertransaction` ,
	`transactiondescription` , `transperformedby`)	
	VALUES 
	(NULL,10001,",@account,",",
	CURDATE(),",",@fee,",'fee',
	NULL,",@fee,",",@newbalance,",
	'Monthly Fee', 20000001);");

	PREPARE ps_q FROM @q;
	EXECUTE ps_q;
	DEALLOCATE PREPARE ps_q;
END 
$$
DELIMITER ;
