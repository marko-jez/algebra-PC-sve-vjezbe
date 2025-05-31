DELIMITER $$
CREATE PROCEDURE brojFilmovaLoop()
BEGIN
	DECLARE ukupanBrojFilmova INT DEFAULT 1;
    DECLARE zbrojFilmova INT DEFAULT 0;
    
    SET ukupanBrojFilmova = (SELECT COUNT(*) FROM filmovi);
    
    prebroji_loop: LOOP
		IF zbrojFilmova >= ukupanBrojFilmova THEN 
        LEAVE prebroji_loop;
        END IF;
        SET zbrojFilmova = zbrojFilmova +1;
    END LOOP;
    
    SELECT zbrojFilmova AS zbrojFilmova;
    
END$$
DELIMITER ;