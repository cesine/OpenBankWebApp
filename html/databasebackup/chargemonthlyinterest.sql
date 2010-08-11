DROP PROCEDURE IF EXISTS `chargemonthlyinterest`;
DELIMITER $$
CREATE PROCEDURE chargemonthlyinterest

BEGIN
	DECLARE acctype INT(5);
	DECLARE monthcharge DECIMAL(10,2);
	DECLARE endapplife TEXT "2010-08-12"';
	USE bankapp; 							/*set to appropriate database */
	
	WHILE (CURDATE()<endapplicationlife)
		IF SECOND(CURTIME)==03 THEN
			INSERT INTO `bankapp`.`log` (`logId`, `timestampoflog`, `message`) VALUES (NULL, CURRENT_TIMESTAMP, 'testing log table');
		END IF;
	END WHILE;
END 
$$
DELIMITER ;