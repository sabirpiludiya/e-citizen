DELIMITER $$

USE `db_ppud`$$

DROP PROCEDURE IF EXISTS `MIN_MAX`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MIN_MAX`()
BEGIN
	DECLARE MIN,MAX FLOAT;
	DECLARE i,c,t INT;
	SET i=0;
	SELECT `student_marks` INTO MAX FROM `student_mark` LIMIT 1;
	SELECT `student_marks` INTO MIN FROM `student_mark` LIMIT 1;
	SELECT COUNT(*) INTO t FROM `student_mark`;
	WHILE (t>i) DO
	SELECT `student_marks` INTO c FROM `student_mark` LIMIT i,1;
	IF (c>MAX) THEN
	SET MAX=c;
	ELSEIF (c<MIN) THEN
	SET MIN=c;
	END IF;
	SET i=i+1;
	END WHILE;
	SELECT MIN;
	SELECT MAX;
    END$$

DELIMITER ;