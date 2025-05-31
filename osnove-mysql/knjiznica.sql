CREATE DATABASE IF NOT EXISTS knjiznica;

CREATE TABLE IF NOT EXISTS korisnici (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(255) NOT NULL,
prezime VARCHAR(255) NOT NULL,
oib CHAR(11) NOT NULL UNIQUE,
email VARCHAR(255) NOT NULL,
datumUclanjenja DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS zanrovi (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS autori (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(255) NOT NULL,
prezime VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS knjige (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL,
godine INT UNSIGNED NOT NULL,
autorID INT UNSIGNED NOT NULL,
zanrId INT UNSIGNED NOT NULL,
FOREIGN KEY (autorID) REFERENCES autori(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (zanrID) REFERENCES zanrovi(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS posudbe (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
datumPosudbe DATE NOT NULL,
datumPovrata DATE NOT NULL,
korisnikID INT UNSIGNED NOT NULL,
knjigeID INT UNSIGNED NOT NULL,
FOREIGN KEY (korisnikID) REFERENCES korisnici(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (knjigeID) REFERENCES knjige(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO korisnici (ime, prezime, oib, email, datumUclanjenja)
VALUES
('Karlo', 'Divić', 18376057321, 'karlodiv@gmail.com', '2023-11-08'),
('Ana', 'Kovač', 29038523458, 'ana.kovac@gmail.com', '2023-11-10'),
('Luka', 'Horvat', 32109845673, 'luka.horvat@hotmail.com', '2023-11-11'),
('Maja', 'Jurić', 12345678901, 'maja.juric@yahoo.com', '2023-11-12'),
('Ivan', 'Perić', 98765432109, 'ivan.peric@gmail.com', '2023-11-15'),
('Helena', 'Krpan', 45678912345, 'helena.krpan@outlook.com', '2023-11-18'),
('Petar', 'Novak', 23456789012, 'petar.novak@gmail.com', '2023-11-20'),
('Ema', 'Babić', 34567890123, 'ema.babic@gmail.com', '2023-11-22'),
('Tomislav', 'Šarić', 56789012345, 't.saric@hotmail.com', '2023-11-25'),
('Martina', 'Vidaković', 67890123456, 'martina.vidakovic@gmail.com', '2023-11-28');

INSERT INTO zanrovi (naziv)
VALUES
('Horor'), ('Komedija'), ('Erotika'), ('Drama'), ('Akcija'), ('SciFi');

INSERT INTO autori (ime, prezime)
VALUES 
('Ivo', 'Andrić'),
('Miroslav', 'Krleža'),
('Ivana', 'Brlić-Mažuranić'),
('Ranko', 'Marinković'),
('Antun', 'Gustav Matoš'),
('Vladimir', 'Nazor'),
('Tin', 'Ujević'),
('Jure', 'Kaštelan'),
('Dobriša', 'Cesarić'),
('Petar', 'Šegedin'),
('Slaven', 'Reljić'),
('Zvonimir', 'Balog'),
('Pavao', 'Pavličić'),
('Miljenko', 'Jergović'),
('Kristian', 'Novak');

INSERT INTO knjige (naziv, godine, autorID, zanrID)
VALUES
('Pjesma mrtvog pjesnika', 1994, 9, 4),
('Na rubu tišine', 2001, 3, 2),
('Crveni snijeg', 1987, 7, 5),
('Tihi ljudi', 1999, 5, 1),
('Otok bez sjećanja', 2010, 12, 3),
('Mirisi djetinjstva', 1975, 2, 4),
('U sjeni masline', 2003, 8, 6),
('Noć bez zvijezda', 2015, 4, 1),
('Vrijeme istine', 1990, 10, 2),
('Zidovi od stakla', 2007, 6, 5),
('Tišina pod morem', 2021, 14, 3),
('Peta strana svijeta', 1996, 13, 6),
('Lovci na riječi', 2004, 11, 1),
('Grad izvan vremena', 1982, 1, 4),
('Gdje ptice umiru', 2018, 15, 2),
('Proljeće u prosincu', 2000, 3, 5),
('Zrcalo tame', 1993, 5, 3),
('Kamen i vatra', 1985, 7, 6),
('Prašina sjećanja', 2009, 2, 2),
('Posljednji trag svjetla', 2012, 6, 1);

INSERT INTO posudbe (datumPosudbe, datumPovrata, korisnikID, knjigeID)
VALUES 
('2025-03-19', '2025-05-05', 3, 14),
('2025-04-01', '2025-04-20', 5, 7),
('2025-02-15', '2025-03-15', 1, 2),
('2025-05-01', '2025-06-01', 8, 11),
('2025-03-10', '2025-04-10', 2, 6),
('2025-01-25', '2025-02-28', 4, 3),
('2025-04-12', '2025-05-10', 7, 8),
('2025-02-05', '2025-03-07', 6, 12),
('2025-03-20', '2025-04-20', 9, 5),
('2025-04-25', '2025-05-30', 10, 1),
('2025-03-01', '2025-03-31', 3, 4);

SELECT p.id 'Broj posudbe', p.datumPosudbe, p.datumPovrata, CONCAT(k.ime, ' ', k.prezime) 'Ime i prezime', knj.naziv 'Knjiga'
FROM posudbe p
INNER JOIN korisnici k ON k.id = p.korisnikID
INNER JOIN knjige knj ON knj.id = p.knjigeID;

CREATE TABLE IF NOT EXISTS status_posudbe (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL
);

ALTER TABLE posudbe
ADD status_posudbeID INT UNSIGNED NOT NULL;

ALTER TABLE posudbe
ADD FOREIGN KEY (status_posudbeID) REFERENCES status_posudbe(id) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO status_posudbe (naziv) VALUES
('Posuđeno'),
('Vraćeno'),
('Izgubljeno'),
('Produljeno'),
('Oštećeno');

UPDATE posudbe
SET status_posudbeID = 1
WHERE id = 1;

INSERT INTO posudbe (datumPosudbe, datumPovrata, korisnikID, knjigeID, status_posudbeID)
VALUES
('2025-05-01', '2025-07-01', 2, 5, 1),
('2025-05-03', '2025-07-05', 4, 8, 1),
('2025-04-05', '2025-07-10', 6, 12, 1),
('2025-05-07', '2025-07-15', 7, 3, 1),
('2025-05-10', '2025-07-20', 1, 9, 1),
('2025-04-15', '2025-05-25', 3, 7, 2);

UPDATE posudbe
SET status_posudbeID = 2
WHERE id = 1;

UPDATE posudbe
SET status_posudbeID = 
	CASE 
    WHEN id = 4 THEN 1
    ELSE 2
    END
WHERE id BETWEEN 1 AND 11;

SELECT p.id, p.datumPosudbe, p.datumPovrata, CONCAT(k.ime, ' ', k.prezime) 'Ime i prezime', knj.naziv 'Knjiga'
FROM posudbe p
INNER JOIN korisnici k ON k.id = p.korisnikID
INNER JOIN knjige knj ON knj.id = p.knjigeID
WHERE status_posudbeID = 1;

SELECT  k.id,
    CONCAT(k.ime, ' ', k.prezime) AS ime_prezime,
    COUNT(p.id) AS broj_posudenih_knjiga
FROM posudbe p
INNER JOIN korisnici k ON k.id = p.korisnikID
WHERE status_posudbeID = 1
GROUP BY k.id, k.ime, k.prezime;

SELECT p.id, p.datumPosudbe, p.datumPovrata, CONCAT(k.ime, ' ', k.prezime) 'Ime i prezime', knj.naziv 'Knjiga'
FROM posudbe p
INNER JOIN korisnici k ON k.id = p.korisnikID
INNER JOIN knjige knj ON knj.id = p.knjigeID
WHERE status_posudbeID = 1;

SELECT k.id 'Broj knjige', k.naziv AS 'Knjige koje nisu trenutno posuđene'
FROM knjige k
WHERE k.id NOT IN (
	SELECT knjigeID
    FROM posudbe
	WHERE status_posudbeID = 1
);

DELIMITER $$
CREATE PROCEDURE brojPosudbiPoZanru ()
BEGIN
	SELECT  z.id, z.naziv, COUNT(p.id) AS 'Broj posudbi po žanru'
	FROM posudbe p
	INNER JOIN knjige knj ON knj.id = p.knjigeID
	INNER JOIN zanrovi z ON z.id = knj.zanrId
	GROUP BY z.id;
END$$
DELIMITER ;

CALL brojPosudbiPoZanru();

CREATE VIEW posudbeSaKorisincimaIKnjigama AS
SELECT p.id 'Broj posudbe', 
CONCAT(k.ime, ' ', k.prezime) 'Ime i prezime', 
k.oib 'OIB', 
k.email,
k.datumUclanjenja 'Datum učlanjenja', 
knj.naziv 'Knjiga',
knj.godine 'Godina',
p.datumPosudbe, p.datumPovrata
FROM posudbe p
LEFT JOIN korisnici k ON k.id = p.korisnikID
LEFT JOIN knjige knj ON knj.id = p.knjigeID;

SELECT * FROM posudbesakorisincimaiknjigama;

SELECT * FROM korisnici k
INNER JOIN posudbe p ON p.korisnikID = k.id;
















