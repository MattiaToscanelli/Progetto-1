create database banca;
use banca;
create table conto (
  numero int auto_increment primary key,
  intestatario varchar(50),
  saldo int,
  valuta varchar(10)
);

INSERT INTO conto VALUES(null, "Mario Monti", 500, "chf");
INSERT INTO conto VALUES(null, "Maria Monte", 6000, "chf");
INSERT INTO conto VALUES(null, "Pillo Lillo", 700, "chf");
INSERT INTO conto VALUES(null, "Pro va", 300, "chf");

set autocommit = 0;
start transaction;
UPDATE conto SET saldo = saldo + 40 WHERE intestatario = "Mario Monti";
SELECT * FROM conto WHERE intestatario = "Mario Monti";
SAVEPOINT save1;
UPDATE conto SET saldo = saldo - 40 WHERE intestatario = "Maria Monte";
SELECT * FROM conto WHERE intestatario = "Maria Monte";
UPDATE conto SET saldo = saldo + 5000 WHERE intestatario = "Pro Va";
ROLLBACK to save1;
SELECT * FROM conto WHERE intestatario = "Pro Va";
UPDATE conto SET saldo = saldo - 200 WHERE intestatario = "Pillo Lillo";
SELECT * FROM conto WHERE intestatario = "Pillo Lillo";
commit;
SELECT * FROM conto;

2)
Create database ricerca;
use ricerca;
create table google(
  id int auto_increment primary key,
  titolo_ricerca varchar(50),
  link varchar(40)
);

INSERT INTO google VALUES(null, "Amazon", "amazon.it");
INSERT INTO google VALUES(null, "Youtube", "youtube.com");
INSERT INTO google VALUES(null, "Bing", "bing.com");
INSERT INTO google VALUES(null, "YourLittlePony", "yourlittlepony.com");
INSERT INTO google VAlUES(null, "Minecraft", "minecraft.net");
INSERT INTO google VALUES(null, "Maps", "googlemaps.com");

Select * from google
ORDER BY RAND()
LIMIT 5;

b)
Delete from google
ORDER BY RAND()
LIMIT 1;

