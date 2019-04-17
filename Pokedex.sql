/*CREATE DOMAIN Type AS VARCHAR(25) CONSTRAINT type 
CHECK (VALUE IN ('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon'));*/


CREATE TABLE TableType(
	
	TypeP ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL PRIMARY KEY ,
	AttaqueNormal REAL NOT NULL,
	AttaqueFeu REAL NOT NULL,
	AttaqueEau REAL NOT NULL,
	AttaquePlante REAL NOT NULL,
	AttaqueElectrik REAL NOT NULL,
	AttaqueGlace REAL NOT NULL,
	AttaqueCombat REAL NOT NULL,
	AttaquePoison REAL NOT NULL,
	AttaqueSol REAL NOT NULL,
	AttaqueVol REAL NOT NULL,
	AttaquePsy REAL NOT NULL,
	AttaqueInsecte REAL NOT NULL,
	AttaqueRoche REAL NOT NULL,
	AttaqueSpectre REAL NOT NULL,
	AttaqueDragon REAL NOT NULL,
	DéfenseNormal REAL NOT NULL,
	DéfenseFeu REAL NOT NULL,
	DéfenseEau REAL NOT NULL,
	DéfensePlante REAL NOT NULL,
	DéfenseElectrik REAL NOT NULL,
	DéfenseGlace REAL NOT NULL,
	DéfenseCombat REAL NOT NULL,
	DéfensePoison REAL NOT NULL,
	DéfenseSol REAL NOT NULL,
	DéfenseVol REAL NOT NULL,
	DéfensePsy REAL NOT NULL,
	DéfenseInsecte REAL NOT NULL,
	DéfenseRoche REAL NOT NULL,
	DéfenseSpectre REAL NOT NULL,
	DéfenseDragon REAL NOT NULL
	);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Normal',
		1,1,1,1,1,1,1,1,1,1,1,1,0.5,0,1,
		1,1,1,1,1,1,2,1,1,1,1,1,1,0,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Feu',
		1,0.5,0.5,2,1,2,1,1,1,1,1,2,0.5,1,0.5,
		1,0.5,2,0.5,1,1,1,1,2,1,1,0.5,2,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Eau',
		1,2,0.5,0.5,1,1,1,1,2,1,1,1,2,1,0.5,
		1,0.5,0.5,2,2,0.5,1,1,1,1,1,1,1,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Plante',
		1,0.5,2,0.5,1,1,1,0.5,2,0.5,1,0.5,2,1,0.5,
		1,2,0.5,0.5,0.5,2,1,2,0.5,2,1,2,1,1,1);


INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Electrik',
		1,1,2,0.5,0.5,1,1,1,0,2,1,1,1,1,0.5,
		1,1,1,1,0.5,1,1,1,2,0.5,1,1,1,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Glace',
		1,1,0.5,2,1,0.5,1,1,2,2,1,1,1,1,2,
		1,2,1,1,1,0.5,2,1,1,1,1,1,2,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Combat',
		2,1,1,1,1,2,1,0.5,1,0.5,0.5,0.5,2,0,1,
		1,1,1,1,1,1,1,1,1,2,2,0.5,0.5,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Poison',
		1,1,1,2,1,1,1,0.5,0.5,1,1,2,0.5,0.5,1,
		1,1,1,0.5,1,1,0.5,0.5,2,1,2,2,1,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Sol',
		1,2,1,0.5,2,1,1,2,1,0,1,0.5,2,1,1,
		1,1,2,2,0,2,1,0.5,1,1,1,1,0.5,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Vol',
		1,1,1,2,0.5,1,2,1,1,1,1,2,0.5,1,1,
		1,1,1,0.5,2,2,0.5,1,0,1,1,0.5,2,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Psy',
		1,1,1,1,1,1,2,2,1,1,0.5,1,1,1,1,
		1,1,1,1,1,1,0.5,1,1,1,0.5,2,1,0,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Insecte',
		1,0.5,1,2,1,1,0.5,2,1,0.5,2,1,1,0.5,1,
		1,2,1,0.5,1,1,0.5,2,0.5,2,1,1,2,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Roche',
		1,2,1,1,1,2,0.5,1,0.5,2,1,2,1,1,1,
		0.5,0.5,2,2,1,1,2,0.5,2,0.5,1,1,1,1,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Spectre',
		0,1,1,1,1,1,1,1,1,1,0,1,1,2,1,
		0,1,1,1,1,1,0,0.5,1,1,1,0.5,1,2,1);

INSERT INTO TableType (TypeP,
					   AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,
					   AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,
					   DéfenseNormal,DéfenseFeu,DéfenseEau,DéfensePlante,DéfenseElectrik,DéfenseGlace,DéfenseCombat,DéfensePoison,DéfenseSol,
					   DéfenseVol,DéfensePsy,DéfenseInsecte,DéfenseRoche,DéfenseSpectre,DéfenseDragon)
VALUES('Dragon',
		1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,
		1,0.5,0.5,0.5,0.5,2,1,1,1,1,1,1,1,1,2);



/*CREATE DOMAIN CourbeXP AS VARCHAR(25) CONSTRAINT courbxep 
CHECK (VALUE IN ('Rapide','Moyen+','Moyen-','Lent');*/



CREATE TABLE Pokédex (
	NumP INT NOT NULL PRIMARY KEY, 
	NomP VARCHAR(25) NOT NULL,
	PV INT NOT NULL, 
	Attaque INT NOT NULL, 
	Défense INT NOT NULL, 
	AttSpé INT NOT NULL, 
	DéfSPé INT NOT NULL, 
	Vitesse INT NOT NULL,
    TypeU ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL References TableType(TypeP),
    TypeD ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') References TableType(TypeP),
    TauxCapture INT NOT NULL,
    Evolution INT References Pokédex (NumP),
    NiveauEvolution INT,
    Courbe ENUM('Rapide','Moyen+','Moyen-','Lent') NOT NULL,
    XPVaincu INT NOT NULL
    );


INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(152,'Mew',100,100,100,100,100,100,'Psy',NULL,45,NULL,NULL,'Moyen-',64);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(151,'Mewtwo',106,110,90,154,90,130,'Psy',NULL,3,NULL,NULL,'Lent',220);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(150,'Dracolosse',91,134,95,100,100,80,'Dragon','Vol',45,NULL,NULL,'Lent',218);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(149,'Draco',61,84,65,70,70,70,'Dragon',NULL,45,149,55,'Lent',144);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(148,'Mini Draco',41,64,45,50,50,50,'Dragon',NULL,45,148,30,'Lent',67);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(147,'Sulfura',90,100,90,125,85,90,'Feu','Vol',3,NULL,NULL,'Lent',217);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(146,'Electhor',90,90,85,125,90,100,'Electrik','Vol',3,NULL,NULL,'Lent',216);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(145,'Artikodin',90,85,100,95,125,85,'Glace','Vol',3,NULL,NULL,'Lent',215);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(144,'Ronflex',160,110,65,65,110,30,'Normal',NULL,25,NULL,NULL,'Lent',154);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(143,'Ptéra',80,105,65,60,75,130,'Roche','Vol',45,NULL,NULL,'Lent',202);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(142,'Kabutops',60,115,105,65,70,80,'Roche','Eau',45,NULL,NULL,'Moyen+',199);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(141,'Kabuto',30,80,90,55,45,55,'Roche','Eau',45,142,40,'Moyen+',99);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(140,'Amonistar',70,60,125,115,70,55,'Roche','Eau',45,NULL,NULL,'Moyen+',199);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(139,'Amonita',35,40,100,90,55,35,'Roche','Eau',45,140,40,'Moyen+',99);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(138,'Porygon',65,60,70,85,75,40,'Normal',NULL,45,NULL,NULL,'Moyen+',130);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(137,'Pyroli',65,130,60,95,110,65,'Feu',NULL,45,NULL,NULL,'Moyen+',198);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(136,'Voltali',65,65,60,110,95,130,'Electrik',NULL,45,NULL,NULL,'Moyen+',197);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(135,'Aquali',130,65,60,110,95,65,'Eau',NULL,45,NULL,NULL,'Moyen+',196);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(134,'Evoli',55,55,50,45,65,55,'Normal',NULL,45,137,30,'Moyen+',92);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(133,'Evoli',55,55,50,45,65,55,'Normal',NULL,45,136,30,'Moyen+',92);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(132,'Evoli',55,55,50,45,65,55,'Normal',NULL,45,135,30,'Moyen+',92);

/*Pas de métamorph*/

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(131,'Lokhlass',130,85,80,85,95,60,'Eau','Glace',45,NULL,NULL,'Lent',219);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(130,'Léviator',95,125,79,60,100,81,'Eau','Vol',45,NULL,NULL,'Lent',214);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(129,'Magicarpe',20,10,55,15,20,80,'Eau',NULL,255,130,20,'Lent',20);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(128,'Tauros',75,100,95,40,70,110,'Normal',NULL,45,NULL,NULL,'Lent',211);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(127,'Scarabrute',65,125,100,55,70,85,'Insecte',NULL,45,NULL,NULL,'Lent',200);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(126,'Magmar',65,95,57,100,85,93,'Feu',NULL,45,NULL,NULL,'Moyen+',127);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(125,'Elektek',65,83,57,95,85,105,'Electrik',NULL,45,NULL,NULL,'Moyen+',156);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(124,'Lippoutou',65,50,35,115,95,95,'Glace','Psy',45,NULL,NULL,'Moyen+',137);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(123,'Insécateur',70,110,80,55,80,105,'Insecte','Vol',45,NULL,NULL,'Moyen+',187);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(122,'M.Mime',40,45,65,100,120,90,'Psy',NULL,45,NULL,NULL,'Moyen+',136);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(121,'Staross',60,75,85,100,85,115,'Eau','Psy',60,NULL,NULL,'Lent',207);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(120,'Stari',30,45,55,70,55,85,'Eau',NULL,225,121,40,'Lent',106);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(119,'Poissoroy',80,92,65,65,80,68,'Eau',NULL,60,NULL,NULL,'Moyen+',170);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(118,'Poissirène',45,67,60,35,50,63,'Eau',NULL,225,119,33,'Moyen+',111);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(117,'Hypocéan',55,55,65,95,45,85,'Eau',NULL,75,NULL,NULL,'Moyen+',155);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(116,'Hypotrempe',30,40,70,70,25,60,'Eau',NULL,225,117,32,'Moyen+',83);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(115,'Kangourex',105,95,80,40,80,90,'Normal',NULL,45,NULL,NULL,'Moyen+',175);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(114,'Saquedeneu',65,55,115,100,40,60,'Plante',NULL,45,NULL,NULL,'Moyen+',166);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(113,'Leveinard',250,5,5,35,105,50,'Normal',NULL,30,NULL,NULL,'Rapide',395);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(112,'Rhinoféros',105,130,120,45,45,40,'Sol','Roche',60,NULL,NULL,'Lent',204);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(111,'Rhinocorne',80,85,95,30,30,25,'Sol','Roche',120,112,42,'Lent',135);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(110,'Smogogo',65,90,120,85,70,60,'Poison',NULL,60,NULL,NULL,'Moyen+',173);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(109,'Smogo',40,65,95,60,45,35,'Poison',NULL,190,110,35,'Moyen+',114);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(108,'Excelangue',90,55,75,60,75,30,'Normal',NULL,45,NULL,NULL,'Moyen+',127);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(107,'Tygnon',50,105,79,35,110,76,'Combat',NULL,45,NULL,NULL,'Moyen+',140);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(106,'Kicklee',50,120,53,35,110,87,'Combat',NULL,45,NULL,NULL,'Moyen+',139);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(105,'Ossatueur',60,80,110,50,80,45,'Sol',NULL,75,NULL,NULL,'Moyen+',124);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(104,'Osselait',50,50,95,40,50,35,'Sol',NULL,190,105,28,'Moyen+',87);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(103,'Noadkoko',95,95,85,125,75,65,'Plante','Psy',45,NULL,NULL,'Lent',212);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(102,'Noeunoeuf',60,40,80,60,45,40,'Plante','Psy',90,103,40,'Lent',98);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(101,'Electrode',60,50,70,80,80,150,'Electrik',NULL,60,NULL,NULL,'Moyen+',150);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(100,'Voltorbe',40,30,50,55,55,100,'Electrik',NULL,190,101,30,'Moyen+',103);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(99,'Krabboss',55,130,115,50,50,75,'Eau',NULL,60,NULL,NULL,'Moyen+',206);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(98,'Krabby',30,105,90,25,25,50,'Eau',NULL,225,99,28,'Moyen+',115);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(97,'Hypnomade',85,73,70,73,115,67,'Psy',NULL,75,NULL,NULL,'Moyen+',165);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(96,'Soprifik',60,48,45,43,90,42,'Psy',NULL,190,97,26,'Moyen+',102);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(95,'Onix',35,45,160,30,45,70,'Roche','Sol',45,NULL,NULL,'Moyen+',108);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(94,'Ectoplasma',60,65,600,130,75,110,'Spectre','Poison',45,NULL,NULL,'Moyen-',190);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(93,'Spectrum',45,50,45,115,55,95,'Spectre','Poison',90,94,50,'Moyen-',126);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(92,'Fantominus',30,35,30,100,35,80,'Spectre','Poison',190,93,25,'Moyen-',95);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(91,'Crustarbi',50,95,180,85,45,70,'Eau','Glace',60,NULL,NULL,'Lent',203);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(90,'Kokiyas',30,65,100,45,25,40,'Eau',NULL,190,91,40,'Lent',97);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(89,'Grotadmorv',105,105,75,65,100,50,'Poison',NULL,75,NULL,NULL,'Moyen+',157);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(88,'Tadmorv',80,80,50,40,50,25,'Poison',NULL,190,89,38,'Moyen+',90);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(87,'Lamantine',90,70,80,70,95,70,'Eau','Glace',75,NULL,NULL,'Moyen+',176);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(86,'Otaria',65,45,55,45,70,45,'Eau',NULL,190,87,35,'Moyen+',100);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(85,'Dodrio',60,110,70,60,60,110,'Normal','Vol',45,NULL,NULL,'Moyen+',158);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(84,'Doduo',35,85,45,35,35,75,'Normal','Vol',190,85,31,'Moyen+',96);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(83,'Canarticho',52,90,55,58,62,60,'Normal','Vol',45,NULL,NULL,'Moyen+',94);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(82,'Magnéton',50,60,95,120,70,70,'Electrik',NULL,60,NULL,NULL,'Moyen+',161);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(81,'Magnéti',25,35,70,95,55,45,'Electrik',NULL,190,82,30,'Moyen+',89);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(80,'Flagadoss',95,75,110,100,80,30,'Eau','Psy',75,NULL,NULL,'Moyen+',164);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(79,'Ramoloss',90,65,65,40,40,15,'Eau','Psy',190,80,37,'Moyen+',99);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(78,'Galopa',65,100,70,80,80,105,'Feu',NULL,60,NULL,NULL,'Moyen+',192);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(77,'Ponyta',50,85,55,65,65,90,'Feu',NULL,190,78,40,'Moyen+',152);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(76,'Grolem',80,120,130,55,65,45,'Roche','Sol',45,NULL,NULL,'Moyen-',177);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(75,'Gravalanch',55,95,115,45,45,35,'Roche','Sol',120,76,50,'Moyen-',134);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(74,'Racaillou',40,80,100,30,30,20,'Roche','Sol',255,75,25,'Moyen-',73);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(73,'Tentacruel',80,70,65,80,120,100,'Eau','Poison',60,NULL,NULL,'Lent',205);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(72,'Tentacool',40,40,35,50,100,70,'Eau','Poison',190,73,30,'Lent',105);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(71,'Empiflor',80,105,65,100, 70,70,'Plante','Poison',45,NULL,NULL,'Moyen-',191);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(70,'Boustiflor',65,90,50,85,45,55,'Plante','Poison',120,71,42,'Moyen-',151);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(69,'Chétiflor',50,75,35,70,30,40,'Plante','Poison',255,70,21,'Moyen-',84);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(68,'Mackogneur',90,130,80,65,85,55,'Combat',NULL,45,NULL,NULL,'Moyen-',193);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(67,'Machopeur',80,100,70,50,60,45,'Combat',NULL,90,68,56,'Moyen-',146);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(66,'Machoc',70,80,50,35,35,35,'Combat',NULL,180,67,28,'Moyen-',75);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(65,'Alakazam',55,50,45,135,95,120,'Psy',NULL,50,NULL,NULL,'Moyen-',186);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(64,'Kadabra',40,35,30,120,70,105,'Psy',NULL,100,65,40,'Moyen-',145);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(63,'Abra',25,20,15,105,55,90,'Psy',NULL,200,64,16,'Moyen-',75);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(62,'Tartard',90,95,95,70,90,70,'Eau','Combat',45,NULL,NULL,'Moyen-',185);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(61,'Têtarte',65,65,65,50,50,90,'Eau',NULL,120,62,50,'Moyen-',131);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(60,'Ptitard',40,50,40,40,40,90,'Eau',NULL,255,61,25,'Moyen-',77);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(59,'Arcanin',90,110,80,100,80,95,'Feu',NULL,75,NULL,NULL,'Lent',213);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(58,'Caninos',55,70,45,70,50,60,'Feu',NULL,190,59,40,'Lent',91);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(57,'Colossinge',65,105,60,60,70,95,'Combat',NULL,75,NULL,NULL,'Moyen+',149);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(56,'Férosinge',40,80,35,35,45,70,'Combat',NULL,190,57,28,'Moyen+',74);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(55,'Akwakwak',80,82,78,95,80,85,'Eau',NULL,75,NULL,NULL,'Moyen+',174);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(54,'Psykokwak',50,52,48,65,50,55,'Eau',NULL,190,55,33,'Moyen+',80);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(53,'Persian',65,70,60,65,65,115,'Normal',NULL,90,NULL,NULL,'Moyen+',148);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(52,'Miaouss',40,45,35,40,40,90,'Normal',NULL,225,53,28,'Moyen+',69);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(51,'Triopikeur',35,100,50,50,70,120,'Sol',NULL,50,NULL,NULL,'Moyen+',153);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(50,'Taupiqueur',10,55,25,35,45,95,'Sol',NULL,255,51,26,'Moyen+',81);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(49,'Aéromite',70,65,60,90,75,90,'Insecte','Poison',75,NULL,NULL,'Moyen+',138);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(48,'Mimitoss',60,55,50,40,55,45,'Insecte','Poison',190,49,31,'Moyen+',75);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(47,'Parasect',60,95,80,60,80,30,'Insecte','Plante',75,NULL,NULL,'Moyen+',128);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(46,'Paras',35,70,55,45,55,25,'Insecte','Poison',190,47,24,'Moyen+',70);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(45,'Rafflesia',75,80,85,110,90,50,'Plante','Poison',45,NULL,NULL,'Moyen-',184);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(44,'Ortide',60,65,70,85,75,40,'Plante','Poison',120,45,42,'Moyen-',132);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(43,'Mystherbe',45,50,55,75,65,30,'Plante','Poison',255,44,21,'Moyen-',78);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(42,'Nosferalto',75,80,70,65,75,90,'Poison','Vol',90,NULL,NULL,'Moyen+',171);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(41,'Nosferapti',40,45,35,30,40,55,'Poison','Vol',255,42,22,'Moyen+',54);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(40,'Grodoudou',140,70,45,85,50,45,'Normal',NULL,50,NULL,NULL,'Rapide',109);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(39,'Rondoudou',115,45,20,45,25,20,'Normal',NULL,170,40,45,'Rapide',76);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(38,'Feunard',73,76,75,81,100,100,'Feu',NULL,75,NULL,NULL,'Moyen+',178);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(37,'Goupix',38,41,40,50,65,65,'Feu',NULL,190,38,35,'Moyen+',63);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(36,'Mélodelfe',95,70,73,95,90,60,'Normal',NULL,25,NULL,NULL,'Rapide',129);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(35,'Mélofée',70,45,48,60,65,35,'Normal',NULL,150,36,40,'Rapide',68);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(34,'Nidoking',81,102,77,85,75,85,'Poison','Sol',45,NULL,NULL,'Moyen-',195);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(33,'Nidorino',61,72,57,55,55,65,'Poison',NULL,120,34,32,'Moyen-',118);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(32,'Nidoran m',46,57,40,40,40,50,'Poison',NULL,235,33,16,'Moyen-',60);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(31,'Nidoqueen',90,92,87,75,85,76,'Poison','Sol',45,NULL,NULL,'Moyen-',194);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(30,'Nidorina',70,62,67,55,55,56,'Poison',NULL,120,31,32,'Moyen-',117);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(29,'Nidoran f',55,47,52,40,40,41,'Poison',NULL,235,30,16,'Moyen-',59);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(28,'Sablaireau',75,100,110,45,55,65,'Sol',NULL,90,NULL,NULL,'Moyen+',163);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(27,'Sabelette',50,75,85,20,30,40,'Sol',NULL,255,28,22,'Moyen+',93);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(26,'Raichu',60,90,55,90,80,110,'Electrik',NULL,75,NULL,NULL,'Moyen+',122);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(25,'Pikachu',35,55,40,50,50,90,'Electrik',NULL,190,26,30,'Moyen+',82);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(24,'Arbok',60,95,69,65,79,80,'Poison',NULL,90,NULL,NULL,'Moyen+',147);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(23,'Abo',35,60,44,40,54,55,'Poison',NULL,255,24,22,'Moyen+',62);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(22,'Rapasdepic',65,90,65,61,61,100,'Normal','Vol',90,NULL,NULL,'Moyen+',162);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(21,'Piafabec',40,60,30,31,31,70,'Normal','Vol',255,22,20,'Moyen+',58);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(20,'Rattatac',55,81,60,50,70,97,'Normal',NULL,127,NULL,NULL,'Moyen+',116);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(19,'Rattata',30,56,35,25,35,72,'Normal',NULL,255,20,20,'Moyen+',57);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(18,'Roucarnage',83,80,75,70,70,101,'Normal','Vol',45,NULL,NULL,'Moyen-',172);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(17,'Roucoups',63,60,55,50,50,71,'Normal','Vol',120,18,36,'Moyen-',113);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(16,'Roucool',40,45,40,35,35,56,'Normal','Vol',255,17,18,'Moyen-',55);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(15,'Dardagnan',65,90,40,45,80,75,'Insecte','Poison',45,NULL,NULL,'Moyen+',159);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(14,'Coconfort',45,25,50,25,25,25,'Insecte','Poison',120,15,10,'Moyen+',71);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(13,'Aspicot',40,35,30,20,20,50,'Insecte','Poison',255,14,7,'Moyen+',52);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(12,'Papilusion',60,45,50,90,80,70,'Insecte','Vol',45,NULL,NULL,'Moyen+',160);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(11,'Chrysacier',50,20,55,25,25,30,'Insecte',NULL,120,12,10,'Moyen+',72);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(10,'Chenipan',45,30,35,20,20,45,'Insecte',NULL,255,11,7,'Moyen+',53);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(9,'Tortank',79,83,100,85,105,78,'Eau',NULL,45,NULL,NULL,'Moyen-',210);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(8,'Carabaffe',59,63,80,65,80,58,'Eau',NULL,45,9,36,'Moyen-',143);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(7,'Carapuce',44,48,65,50,64,43,'Eau',NULL,45,8,16,'Moyen-',66);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(6,'Dracaufeu',78,84,78,109,85,100,'Feu','Vol',45,NULL,NULL,'Moyen-',209);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(5,'Reptincel',58,64,58,80,65,80,'Feu',NULL,45,6,32,'Moyen-',142);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(4,'Salamèche',39,52,43,60,50,65,'Feu',NULL,45,5,16,'Moyen-',65);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(3,'Florizarre',80,82,83,100,100,80,'Plante','Poison',45,NULL,NULL,'Moyen-',236);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(2,'Herbizarre',60,62,63,80,80,60,'Plante','Poison',45,3,32,'Moyen-',141);

INSERT INTO Pokédex (NumP,NomP,PV,Attaque,Défense,AttSpé,DéfSPé,Vitesse,TypeU,TypeD,TauxCapture,Evolution,NiveauEvolution,Courbe,XPVaincu)
VALUES(1,'Bulbizarre',45,49,49,65,65,45,'Plante','Poison',45,2,16,'Moyen-',64);









/*CREATE DOMAIN Classe AS VARCHAR(25) CONSTRAINT class 
CHECK (VALUE IN ('Physique','Spéciale','Autre'));*/

/*CREATE DOMAIN Effets AS VARCHAR(25) CONSTRAINT effet
CHECK (VALUE IN ('Bru','Para','Som','Poi','Gel','Conf','Peur'));*/

/*CREATE DOMAIN Nbatt AS VARCHAR(25) CONSTRAINT nbatt 
CHECK (VALUE IN ('1','2','1-2','2-5'));

CREATE DOMAIN Stat AS VARCHAR(25) CONSTRAINT stats
CHECK (VALUE IN ('Attaque','Défense','AttSpé','DéfSpé','Vitesse'));*/

/*CREATE DOMAIN Soin AS VARCHAR(25) CONSTRAINT heal
CHECK (VALUE IN ('1/2 l','1/2 d'));*/


CREATE TABLE Attaque (
	IDAtt INT PRIMARY KEY,
	NomA VARCHAR(25) NOT NULL,
	TypeA ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL References TableType (TypeP),
	ClasseA ENUM('Physique','Spéciale','Autre') NOT NULL,
	Puissance INT,
	Précision INT,
	PP INT NOT NULL,
	Effets ENUM('Bru','Para','Som','Poi','Gel','Conf','Peur'),
	AjoutPV ENUM('1/2 l','1/2 d'),
	RetirePV INT,
	NbAttaque ENUM('1','2','1-2','2-5'),
	StatMBoost ENUM('Attaque','Défense','AttSpé','DéfSpé','Vitesse'),
	StatANerf ENUM('Attaque','Défense','AttSpé','DéfSpé','Vitesse')
	);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(1,'Double Pied','Combat','Physique',30,100,30,NULL,NULL,NULL,'2',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(2,'Balyage','Combat','Physique',50,100,20,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(3,'Mawashi Geri','Combat','Physique',60,85,15,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(4,'Pied Sauté','Combat','Physique',70,95,25,NULL,NULL,1,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(5,'Pied Voltige','Combat','Physique',85,90,20,NULL,NULL,1,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(6,'Repli','Eau','Autre',NULL,100,40,NULL,NULL,NULL,'1','Défense',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(7,'Ecume','Eau','Spéciale',20,100,30,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(8,'Pistolet à O','Eau','Spéciale',40,100,25,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(9,'Bulle d O','Eau','Spéciale',65,100,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(10,'Cascade','Eau','Spéciale',80,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(11,'Pince-Masse','Eau','Spéciale',90,85,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(12,'Surf','Eau','Spéciale',95,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(13,'Hydrocanon','Eau','Spéciale',120,80,5,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(14,'Cage-éclair','Electrik','Autre',NULL,100,20,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(15,'Eclair','Electrik','Spéciale',40,100,30,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(16,'Poing-Eclair','Electrik','Spéciale',75,100,15,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(17,'Tonnerre','Electrik','Spéciale',95,100,15,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(18,'Fatal-Foudre','Electrik','Spéciale',120,70,5,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(19,'Flammèche','Feu','Spéciale',40,100,25,'Bru',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(20,'Poing de Feu','Feu','Spéciale',75,100,15,'Bru',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(21,'Lance-Flamme','Feu','Spéciale',95,100,15,'Bru',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(22,'Déflagaration','Feu','Spéciale',120,85,5,'Bru',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(23,'Onde Boréale','Glace','Spéciale',65,100,20,'Gel',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(24,'Poing-glace','Glace','Spéciale',75,100,15,'Gel',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(25,'Laser-Glace','Glace','Spéciale',95,100,10,'Gel',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(26,'Blizzard','Glace','Spéciale',120,90,5,'Gel',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(27,'Sécrétion','Insecte','Autre',NULL,95,40,NULL,NULL,NULL,'1',NULL,'Vitesse');

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(28,'Dard-nuée','Insecte','Physique',14,85,20,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(29,'Vampirisme','Insecte','Physique',20,100,15,NULL,'1/2 d',NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(30,'Double-Dard','Insecte','Physique',25,100,20,'Poi',NULL,NULL,'2',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(31,'Affûtage','Normal','Autre',NULL,NULL,30,NULL,NULL,NULL,'1','Attaque',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(32,'Armure','Normal','Autre',NULL,NULL,30,NULL,NULL,NULL,'1','Défense',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(33,'Berceuse','Normal','Autre',NULL,55,15,'Som',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(34,'Boul Armure','Normal','Autre',NULL,NULL,40,NULL,NULL,NULL,'1','Défense',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(35,'Brouillard','Normal','Autre',NULL,100,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(36,'E-Coque','Normal','Autre',NULL,NULL,10,NULL,'1/2 l',NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(37,'Flash','Normal','Autre',NULL,70,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(38,'Grobisou','Normal','Autre',NULL,75,10,'Som',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(39,'Groz Yeux','Normal','Autre',NULL,100,30,NULL,NULL,NULL,'1',NULL,'Défense');

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(40,'Intimidation','Normal','Autre',NULL,75,20,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(41,'Jet de Sable','Normal','Autre',NULL,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(42,'Mimi-Queue','Normal','Autre',NULL,100,30,NULL,NULL,NULL,'1',NULL,'Défense');

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(43,'Rugissement','Normal','Autre',NULL,NULL,40,NULL,NULL,NULL,'1',NULL,'Attaque');

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(44,'Soin','Normal','Autre',NULL,NULL,20,NULL,'1/2 l',NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(45,'Trempette','Normal','Autre',NULL,NULL,40,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(46,'Ultrason','Normal','Autre',NULL,55,20,'Conf',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(47,'Furie','Normal','Physique',15,85,20,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(48,'Pilonnage','Normal','Physique',15,85,20,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(49,'Torgnoles','Normal','Physique',15,85,10,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(50,'Combo-Griffe','Normal','Physique',18,80,15,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(51,'Poing Comète','Normal','Physique',18,85,15,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(52,'Picanon','Normal','Physique',20,100,15,NULL,NULL,NULL,'2-5',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(53,'Charge','Normal','Physique',35,95,35,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(54,'Tornade','Normal','Physique',35,100,40,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(55,'Ecras Face','Normal','Physique',40,100,35,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(56,'Griffe','Normal','Physique',40,100,35,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(57,'Coupe','Normal','Physique',50,95,30,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(58,'Lutte','Normal','Physique',50,100,100,NULL,NULL,25,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(59,'Force Poigne','Normal','Physique',55,100,30,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(60,'Morsure','Normal','Physique',60,100,25,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(61,'Ecrasement','Normal','Physique',65,100,20,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(62,'Koud Korne','Normal','Physique',65,100,25,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(63,'Coud Boule','Normal','Physique',70,100,15,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(64,'Upercut','Normal','Physique',70,100,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(65,'Croc de Mort','Normal','Physique',80,90,15,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(66,'Force','Normal','Physique',80,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(67,'Souplesse','Normal','Physique',80,75,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(68,'Triplattaque','Normal','Physique',80,100,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(69,'Ultimapoing','Normal','Physique',80,85,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(70,'Plaquage','Normal','Physique',85,100,15,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(71,'Bélier','Normal','Physique',90,85,20,NULL,NULL,45,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(72,'Bomb Oeuf','Normal','Physique',100,75,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(73,'Damoclès','Normal','Physique',100,100,15,NULL,NULL,50,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(74,'Ultimawashi','Normal','Physique',120,75,5,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(75,'Destruction','Normal','Physique',260,100,5,NULL,NULL,999999,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(76,'Explosion','Normal','Physique',340,100,5,NULL,NULL,999999,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(77,'Para-Spore','Plante','Autre',NULL,75,30,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(78,'Poudre Dodo','Plante','Autre',NULL,75,15,'Som',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(79,'Spore','Plante','Autre',NULL,100,15,'Som',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(80,'Vol-Vie','Plante','Spéciale',20,100,20,NULL,'1/2 d',NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(81,'Fouet Lianes','Plante','Spéciale',35,100,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(82,'Méga-Sangsue','Plante','Spéciale',40,100,10,NULL,'1/2 d',NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(83,'Tranch Herbe','Plante','Spéciale',55,95,25,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(84,'Lame-Feuille','Plante','Physique',90,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(85,'Gaz Toxik','Poison','Autre',NULL,55,40,'Poi',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(86,'Poudre Toxik','Poison','Autre',NULL,75,35,'Poi',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(87,'Dard-Venin','Poison','Physique',15,100,35,'Poi',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(88,'Purédpois','Poison','Physique',20,70,20,'Poi',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(89,'Acide','Poison','Physique',40,100,30,NULL,NULL,NULL,'1',NULL,'Défense');

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(90,'Détritus','Poison','Physique',65,100,20,'Poi',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(91,'Amnésie','Psy','Autre',NULL,NULL,20,NULL,NULL,NULL,'1','AttSpé',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(92,'Bouclier','Psy','Autre',NULL,NULL,20,NULL,NULL,NULL,'1','DéfSpé',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(93,'Hâte','Psy','Autre',NULL,NULL,20,NULL,NULL,NULL,'1','Vitesse',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(94,'Hypnose','Psy','Autre',NULL,60,20,'Som',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(95,'Télékinésie','Psy','Autre',NULL,80,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(96,'Yoga','Psy','Autre',NULL,NULL,40,NULL,NULL,NULL,'1','Attaque',NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(97,'Vague Psy','Psy','Spéciale',40,80,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(98,'Choc Mental','Psy','Spéciale',50,100,25,'Conf',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(99,'Rafale Psy','Psy','Spéciale',65,100,20,'Conf',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(100,'Psyko','Psy','Spéciale',90,100,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(101,'Extrasenseur','Psy','Spéciale',80,100,20,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(102,'Jet-Pierres','Roche','Physique',50,65,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(103,'Eboulement','Roche','Physique',75,90,10,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(104,'Osmerang','Sol','Physique',50,90,10,NULL,NULL,NULL,'2',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(105,'Massd Os','Sol','Physique',65,85,10,'Peur',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(106,'Séisme','Sol','Physique',100,100,10,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(107,'Mini Tunel','Sol','Physique',80,100,15,NULL,NULL,NULL,'1',NULL,NULL);


INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(108,'Onde Folie','Spectre','Autre',NULL,100,10,'Conf',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(109,'Poing Ombre','Spectre','Physique',60,100,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(110,'Léchouille','Spectre','Physique',20,100,30,'Para',NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(111,'Cru d Aile','Vol','Physique',35,100,35,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(112,'Picpic','Vol','Physique',35,100,35,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(113,'Premier Vol','Vol','Physique',70,100,15,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(114,'Bec Vrille','Vol','Physique',80,100,20,NULL,NULL,NULL,'1',NULL,NULL);

INSERT INTO Attaque (IDAtt,NomA,TypeA,ClasseA,Puissance,Précision,PP,Effets,
					 AjoutPV,RetirePV,NbAttaque,StatMBoost,StatANerf)
VALUES(115,'Faible Piqué','Vol','Physique',100,90,10,NULL,NULL,NULL,'1',NULL,NULL);



CREATE TABLE Listeinventaire (
	Objet VARCHAR(25) PRIMARY KEY,
	TypeO ENUM('Pokeball','Soin','Statut','Rappel','PP') NOT NULL,
	Prix REAL NOT NULL,
	TauxCaptureBall INT,
	PVSoin INT,
	StatSoin ENUM('Bru','Para','Som','Poi','Gel'),
	PPrajoute INT,
	PPcible ENUM('Une','Toutes'),
	Rappel ENUM('Partiel','Total')
	);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('PokeBall','Pokeball',200,1,NULL,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('SuperBall','Pokeball',600,1.5,NULL,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('HyperBall','Pokeball',1200,2,NULL,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Potion','Soin',300,NULL,20,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('SuperPotion','Soin',700,NULL,50,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('HyperPotion','Soin',1200,NULL,200,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('PotionMax','Soin',2500,NULL,999,NULL,NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Antidote','Statut',100,NULL,NULL,'Poi',NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Anti-Para','Statut',200,NULL,NULL,'Para',NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Anti-Brûle','Statut',250,NULL,NULL,'Bru',NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Antigel','Statut',250,NULL,NULL,'Gel',NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Réveil','Statut',200,NULL,NULL,'Som',NULL,NULL,NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Rappel','Rappel',1500,NULL,NULL,NULL,NULL,NULL,'Partiel');

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('RappelMax','Rappel',10000,NULL,NULL,NULL,NULL,NULL,'Total');

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Elexir','PP',7500,NULL,NULL,NULL,10,'Toutes',NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('MaxElexir','PP',10000,NULL,NULL,NULL,40,'Toutes',NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('Huile','PP',2500,NULL,NULL,NULL,10,'Une',NULL);

INSERT INTO Listeinventaire (Objet,TypeO,Prix,TauxCaptureBall,PVSoin,StatSoin,PPrajoute,PPcible,Rappel)
VALUES('HuileMax','PP',5000,NULL,NULL,NULL,40,'Une',NULL);















CREATE TABLE Compte (

	Nom VARCHAR(35) PRIMARY KEY,
	MDP VARCHAR(35) NOT NULL,
	Pokédollar INT DEFAULT 1000);










CREATE TABLE Banque (

	ID INT PRIMARY KEY,
	NumP INT NOT NULL,
	NomP VARCHAR(25) NOT NULL,
	TypeU ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL,
	TypeD ENUM('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre'),
	Courbe ENUM('Rapide','Moyen+','Moyen-','Lent') NOT NULL,
	XP INT NOT NULL,
	XPVaincu INT NOT NULL,
	Niv INT NOT NULL DEFAULT 1,
	IVPV INT NOT NULL,
	IVAttaque INT NOT NULL,
	IVDéfense INT NOT NULL,
	IVAttSpé INT NOT NULL,
	IVDéfSpé INT NOT NULL,
	IVVitesse INT NOT NULL,
	PVmax INT NOT NULL,
	Vitesse INT NOT NULL,
	Attaque INT NOT NULL,
	Défense INT NOT NULL,
	AttSpé INT NOT NULL,
	DéfSPé INT NOT NULL,
	Attaque1 INT NOT NULL References Attaque(IDAtt),
	Attaque2 INT References Attaque(IDAtt),
	Attaque3 INT References Attaque(IDAtt),
	Attaque4 INT References Attaque(IDAtt),
	Dresseur VARCHAR(35) References Compte(Nom),
	PVact INT NOT NULL,
	Statut ENUM('Bru','Para','Som','Poi','Gel','Conf','Peur'),
	FOREIGN KEY (NumP,NomP,TypeU,TypeD,Courbe,XPVaincu) References Pokédex(NumP,NomP,TypeU,TypeD,Courbe,XPVaincu)
	);





CREATE TABLE Equipe (
	IDEq INT NOT NULL,
	Dresseur VARCHAR(35) NOT NULL References Compte(Nom),
	Pokeu INT NOT NULL References Banque(ID),
	Poked INT References Banque(ID),
	Poket INT References Banque(ID),
	Pokeq INT References Banque(ID),
	Pokec INT References Banque(ID),
	Pokes INT References Banque(ID),
	PRIMARY KEY(IDEq)
	);

CREATE TABLE Sac (
	IDSac INT NOT NULL,
	Dresseur VARCHAR(35) NOT NULL References Compte(Nom),
	nbPokeball INT NOT NULL DEFAULT 5,
	nbSuperBall INT NOT NULL,
	nbHyperBall INT NOT NULL,
	nbPotion INT NOT NULL DEFAULT 10,
	nbSuperPotion INT NOT NULL,
	nbHyperPotion INT NOT NULL,
	nbPotionMax INT NOT NULL,
	nbAntidote INT NOT NULL,
	nbAntiPara INT NOT NULL,
	nbAntiBrule INT NOT NULL,
	nbAntiGel INT NOT NULL,
	nbReveil INT NOT NULL,
	nbRappel INT NOT NULL,
	nbRappelMax INT NOT NULL,
	nbElexir INT NOT NULL,
	nbMaxElexir INT NOT NULL,
	nbHuile INT NOT NULL,
	nbHuileMax INT NOT NULL,
	PRIMARY KEY(IDSac)
	);