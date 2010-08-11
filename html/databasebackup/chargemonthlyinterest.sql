DROP PROCEDURE IF EXISTS `chargemonthlyinterest`;
DELIMITER $$
CREATE PROCEDURE chargemonthlyinterest

BEGIN
	DECLARE acctype INT;
	DECLARE monthlycharge DECIMAL;
	DECLARE endapplicationlife ='2010-08-12';
	USE bankapp; 							/*set to appropriate database */
	
	WHILE (CURDATE()<endapplicationlife)
		IF SECOND(CURTIME)==03 THEN
			INSERT INTO `bankapp`.`log` (`logId`, `timestampoflog`, `message`) VALUES (NULL, CURRENT_TIMESTAMP, 'testing log table');
		END IF;
	END WHILE;
END 
$$
DELIMITER ;