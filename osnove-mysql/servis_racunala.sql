CREATE DATABASE IF NOT EXISTS servis_racunala;

CREATE TABLE IF NOT EXISTS vrsta_uredaja (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS korisnici (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(255) NOT NULL,
prezime VARCHAR(255) NOT NULL,
broj INT NOT NULL,
email VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tehnicari (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(255) NOT NULL,
prezime VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS status_popravka (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS kvarovi (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
naziv VARCHAR(255) NOT NULL,
korisnikID INT UNSIGNED NOT NULL,
vrstaUredajaID INT UNSIGNED NOT NULL,
tehnicarID INT UNSIGNED NOT NULL,
statusPopravkaID INT UNSIGNED NOT NULL,
datumPrijave DATE NOT NULL,
datumZavrsetka DATE NOT NULL,
FOREIGN KEY (korisnikID) REFERENCES korisnici(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (vrstaUredajaID) REFERENCES vrsta_uredaja(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (tehnicarID) REFERENCES tehnicari(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (statusPopravkaID) REFERENCES status_popravka(id) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE kvarovi
MODIFY datumZavrsetka DATE NULL;

INSERT INTO vrsta_uredaja (naziv)
VALUES
('PC'), ('Laptop'), ('Mac'), ('Tablet')
;

INSERT INTO tehnicari (ime, prezime)
VALUES
('Stipo', 'Hranilko'), ('Mladen', 'Susak'), ('Tomislav', 'Lepinjica')
;

INSERT INTO korisnici (ime, prezime, broj, email)
VALUES
  ('Josip',   'Kovačić',  '0911234567', 'josip.kovacic@example.com'),
  ('Marija',  'Novak',    '0987654321', 'marija.novak@example.com'),
  ('Ivan',    'Horvat',   '0951122334', 'ivan.horvat@example.com'),
  ('Ana',     'Babić',    '0923344556', 'ana.babic@example.com'),
  ('Luka',    'Perić',    '0975566778', 'luka.peric@example.com');

INSERT INTO status_popravka (naziv)
VALUES
('Zaprimljeno'), ('U tijeku'), ('Dovršeno'), ('Predano korisniku');

INSERT INTO kvarovi (naziv, korisnikID, vrstaUredajaID, tehnicarID, statusPopravkaID, datumPrijave, datumZavrsetka)
VALUES 
('Matična izgorjela', 3, 1, 2, 3, '2025-01-17', '2025-03-15'),
('Puknut ekran', 1, 3, 1, 2, '2025-02-12', NULL)
;

INSERT INTO kvarovi (naziv, korisnikID, vrstaUredajaID, tehnicarID, statusPopravkaID, datumPrijave, datumZavrsetka)
VALUES
('Laptop se pregrijava', 2, 2, 1, 2, '2025-02-18', NULL),
('Ne radi touch ekran', 4, 4, 2, 3, '2025-01-12', '2025-01-20'),
('Ne daje sliku na monitor', 5, 1, 3, 1, '2025-03-01', NULL),
('Mac ne prepoznaje tastaturu', 1, 3, 1, 3, '2025-01-10', '2025-01-12'),
('Tabletu brzo pada baterija', 3, 4, 2, 4, '2025-01-05', '2025-01-15'),
('Laptop ima crni ekran nakon pokretanja', 4, 2, 1, 2, '2025-02-25', NULL),
('PC se stalno restartira', 2, 1, 3, 3, '2025-01-20', '2025-01-25'),
('Mac ima problem s operativnim sustavom', 5, 3, 3, 1, '2025-03-05', NULL);

SELECT kv.id 'Broj kvara', kv.naziv 'Opis kvara', kv.datumPrijave, kv.datumZavrsetka, 
CONCAT(k.ime, ' ', k.prezime) 'Korisnik', 
v.naziv 'Uređaj', 
CONCAT(t.ime, ' ', t.prezime) 'Tehničar'
FROM kvarovi kv
INNER JOIN korisnici k ON k.id = kv.korisnikID
INNER JOIN vrsta_uredaja v ON v.id = kv.vrstaUredajaID
INNER JOIN tehnicari t ON t.id = kv.tehnicarID
ORDER BY kv.id ASC;

SELECT kv.id 'Broj kvara',
kv.naziv 'Opis kvara', kv.datumPrijave,
CONCAT(t.ime, ' ', t.prezime) 'Tehničar',
s.naziv 'Status popravka' 
FROM kvarovi kv
LEFT JOIN tehnicari t ON t.id = kv.tehnicarID
LEFT JOIN status_popravka s ON s.id = kv.statusPopravkaID
WHERE statusPopravkaID = 2
ORDER BY datumPrijave ASC;


