DELIMITER $$

CREATE PROCEDURE napraviPosudbuUzParametre(IN zeljeniFilm INT, zeljeniClanskiBroj INT, IN noviFilm VARCHAR(255))

BEGIN

START TRANSACTION;

-- SELECT @posudbaId:= MAX(posudbaId) +1 FROM posudbe;
SELECT IFNULL(MAX(posudbaId), 0) +1 INTO @posudbaId FROM posudbe;

IF @posudbaId = 4 THEN 
	ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Nije moguće napraviti posudbu';
ELSE 
	INSERT INTO posudbe (posudbaId, filmId, clanskiBroj, datumPosudbe, datumPovrata, cjenikId)
	VALUES (@posudbaId, zeljeniFilm, zeljeniClanskiBroj, CURDATE(), CURDATE() + INTERVAL 30 DAY, 3);
END IF;


-- SELECT @filmId:= MAX(imdbId) +1 FROM filmovi;
SELECT IFNULL(MAX(imdbId), 0) +1 INTO @filmId FROM filmovi;

IF @filmId <= 11 THEN
	ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Film nije moguće ubaciti u bazu';
ELSE 
	INSERT INTO filmovi (imdbId, naziv, godina, kolicinaDvd, kolicinaBluRay, zanrId)
	VALUES (@filmId, noviFilm, 2012, 10, 10, 4);
END IF;

COMMIT;

END$$

DELIMITER ;