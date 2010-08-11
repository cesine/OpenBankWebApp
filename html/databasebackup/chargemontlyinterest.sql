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
/*
DROP PROCEDURE IF EXISTS `calcola_stats_mese`;
DELIMITER $$
CREATE DEFINER=`corra`@`%` PROCEDURE `calcola_stats_mese`()
BEGIN

  DECLARE p_mese INT;
  DECLARE p_anno INT;
  DECLARE start_date DATE;
  DECLARE end_date DATE;
  DECLARE day_list TEXT DEFAULT '(';

  SET p_mese = MONTH(CURDATE() - INTERVAL 1 MONTH);
  SET p_anno = YEAR(CURDATE() - INTERVAL 1 MONTH);

  SET start_date = CONCAT(p_anno,'-',p_mese,'-01');
  SET end_date = start_date + INTERVAL 1 MONTH - INTERVAL 1 DAY;


/* day_list contains the list of all the days of the month in order to take advantage of partition pruning  */

  WHILE start_date <= end_date DO

	SET day_list = CONCAT(day_list,"'",start_date,"'");
 
    IF start_date < end_date THEN
      SET day_list = CONCAT(day_list,',');
    END IF;

    SET start_date = start_date + INTERVAL 1 DAY;

  END WHILE;
   
  SET day_list = CONCAT(day_list,")");


/* due to day_list variable we use a dynamic query */ 

  SET @query = "CREATE TEMPORARY TABLE stats_buff "; 
  SET @query = CONCAT(@query,"SELECT IF(referer REGEXP '^http://inter.sina.com.cn','sina',");
  SET @query = CONCAT(@query,"REPLACE(SUBSTRING_INDEX(referer,'.inter.it',1),'http://','')) AS site,");
  SET @query = CONCAT(@query,"COUNT(*) AS page_impressions,");
  SET @query = CONCAT(@query,"COUNT(DISTINCT ipaddr) AS unique_ip,");
  SET @query = CONCAT(@query,"COUNT(DISTINCT usertrack) AS unique_usertrack");
  SET @query = CONCAT(@query," FROM logger_archive ");
  SET @query = CONCAT(@query," WHERE data IN ",day_list); 
  SET @query = CONCAT(@query," AND (referer REGEXP '^http://[a-z0-9]+\.inter\.it' OR referer='-' OR referer REGEXP '^http://inter.sina.com.cn') ");
  SET @query = CONCAT(@query," GROUP BY site WITH ROLLUP"); 
  
  PREPARE ps_query FROM @query; 
  EXECUTE ps_query; 
  DEALLOCATE PREPARE ps_query; 


/* insert monthly stats */ 

  DELETE FROM statistics_month WHERE (anno,mese) = (p_anno,p_mese); 

  INSERT INTO statistics_month(anno,mese,site,page_impressions,unique_ip,unique_usertrack) 
    SELECT p_anno, p_mese, site, page_impressions, unique_ip, unique_usertrack 
    FROM stats_buff 
    WHERE site IN ('www','interchannel','interclub','intercampus','giovanili','store','archivio','-','interchannel','mobile','sina','reg','interwall','cento','b2b');
 DROP TABLE IF EXISTS stats_buff; 

END
$$

*/
