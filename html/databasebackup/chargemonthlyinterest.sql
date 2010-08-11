DROP PROCEDURE IF EXISTS `chargemonthlyinterest`;
DELIMITER $$
CREATE DEFINER=`bankapp`@`%` PROCEDURE `chargemonthlyinterest`()

BEGIN
	DECLARE acctype INT;
	DECLARE monthcharge DECIMAL;
	DECLARE endapplife DATE;
	#SET endapplife = `2010-08-12`;	
	#WHILE (CURDATE()<endapplife)
		IF SECOND(CURTIME())==03 THEN
			INSERT INTO `bankapp`.`log` (`logId`, `timestampoflog`, `message`) VALUES (NULL,NULL, `testing log table`);
		END IF;
	#END WHILE;
END 
$$
DELIMITER ;
