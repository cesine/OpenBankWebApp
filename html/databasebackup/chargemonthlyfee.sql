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
	DECLARE endapplife DATE;
	DECLARE sec INT;	
	SET endapplife = "2010-08-12";
	SET @sec = SECOND(CURTIME());	
	SET @q  = CONCAT("INSERT INTO `bankapp`.`log` (`logId`, 
	`timestampoflog`, `message`) VALUES (NULL, NULL, 
	'testfromconsole first",@sec,"');");
	PREPARE ps_q FROM @q;
	EXECUTE ps_q;
	DEALLOCATE PREPARE ps_q;
	
	
END 
$$
DELIMITER ;
