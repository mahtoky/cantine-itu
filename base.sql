create database cantine;

use cantine;

create table Etudiant(
  numETU varchar(10) PRIMARY KEY,
  nom varchar(50) ,
  pwd text NOT NULL,
  dateNaissance date
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE PLAT(
  idPlat int PRIMARY KEY AUTO_INCREMENT,
  nomPlat TEXT NOT NULL,
  prix double NOT NULL,
  devise varchar(2) NOT NULL DEFAULT 'AR'
)ENGINE=InnoDB CHARSET=utf8 AUTO_INCREMENT=1;

create table MENU(
  dateMenu DATE PRIMARY KEY
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE MenuPLAT(
  menu DATE NOT NULL,
  idPlat INT NOT NULL,
  FOREIGN KEY (menu) REFERENCES MENU(dateMenu),
  FOREIGN KEY (idPlat) REFERENCES PLAT(idPlat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE UNIQUE INDEX CONTRAINTPLAT ON MenuPLAT (menu, idplat);

CREATE TABLE COMMANDE(
  idCommande int PRIMARY KEY AUTO_INCREMENT,
  numero varchar(10) NOT NULL,
  quantite double NOT NULL,
  idPlat int NOT NULL,
  dateCommande TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (numero) REFERENCES Etudiant(numETU),
  FOREIGN KEY (idPlat) REFERENCES PLAT(idPlat)
)ENGINE=InnoDB CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE TOKEN(
  numeroETU varchar(10) NOT NULL,
  tokenETU text NOT NULL,
  FOREIGN KEY (numeroETU) REFERENCES Etudiant(numETU)
)ENGINE=InnoDB CHARSET=utf8;

INSERT INTO Etudiant VALUES
('ETU000889', 'Etudiant1', SHA1('Mot2passe'), '1999-02-15'),
('ETU000569', 'Etudiant2', SHA1('MOT2PASSE'), '1992-06-13');

INSERT INTO PLAT (nomPlat, prix) VALUES
('plat1', 3000),
('plat2', 2500),
('plat3', 3000);

INSERT INTO MENU VALUES(CURRENT_TIMESTAMP);

INSERT INTO MENUPLAT VALUES
(CURRENT_TIMESTAMP, 1),
(CURRENT_TIMESTAMP, 2);

CREATE table MenuToday as select * from menuperday where dateMenu = current_date;
CREATE table MENUPERDAY AS SELECT menu as dateMenu, nomplat, prix, devise from menuplat natural join plat
