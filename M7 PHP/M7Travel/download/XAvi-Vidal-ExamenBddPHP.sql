
CREATE SCHEMA ExamenPhpBdd ;

drop table if exists vacances;
CREATE TABLE `vacances` (
  `NOM_EMPLEAT` varchar(20) DEFAULT NULL,
  `COGNOM_EMPLEAT` varchar(50) DEFAULT NULL,
  `CODI_EMPLEAT` int(11) NOT NULL,
  `PRIMER_DIA_VACANCES` date NOT NULL,
  `ULTIM_DIA_VACANCES` date NOT NULL,
  `VALIDAT` int(11) NOT NULL,
  `N_DIES` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Gestió de vacances d''empleats';

select * from vacances;
SELECT * FROM vacances WHERE PRIMER_DIA_VACANCES<now();

DELETE FROM vacances WHERE id>10;

INSERT INTO vacances VALUES ('Steven','King', 100,date('2016/12/01'),date('2016/12/03'),1,3, null);
INSERT INTO vacances VALUES ('Lex','De Haan', 102,date('2016/12/01'),date('2016/12/03'),1,3, null);
INSERT INTO vacances VALUES ('Diana','Lorentz', 107,date('2016/12/01'),date('2016/12/05'),1,5, null);
INSERT INTO vacances VALUES ('Alexander','Hunold', 103,date('2016/12/12'),date('2016/12/16'),1,5, null);
INSERT INTO vacances VALUES ('Lex','De Haan', 102,date('2016/12/26'),date('2016/12/30'),0,5, null);
INSERT INTO vacances VALUES ('Diana','Lorentz', 107,date('2016/12/26'),date('2016/12/30'),0,5, null);
INSERT INTO vacances VALUES ('Alexander','Hunold', 103,date('2016/12/26'),date('2016/12/30'),0,5, null);
INSERT INTO vacances VALUES ('Bruce','Ernst', 104,date('2016/12/26'),date('2016/12/30'),0,5, null);
INSERT INTO vacances VALUES ('David','Austin', 105,date('2016/12/26'),date('2016/12/30'),0,5, null);
INSERT INTO vacances VALUES ('John','Chen', 110,date('2016/12/26'),date('2016/12/30'),0,5, null);


