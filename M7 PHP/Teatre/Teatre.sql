drop schema teatre;
create database teatre;
use teatre;



create table Teatre (
	nom varchar(25),
    primary key(nom)
)engine = innodb;

create table Obra(
	nom varchar(25),
    primary key(nom)
)engine = innodb;

create table Seient(
	nomTeatre varchar(25),
    fila int,
    columna int,
    zona varchar(20),
    primary key(fila,columna,zona,nomTeatre)
) engine = innodb;

create table Entrada(
	teatre varchar(25),
	nomObra varchar(25),
    filaS int,
    colS int,
    zonaSeient varchar(20),
	dataObra date,
    preu decimal(5,2),
    primary key (teatre,nomObra,filaS,colS,zonaSeient,dataObra)

) engine = innodb;

-- Insert de dades
insert into Teatre values('TeatredeBarcelona');
insert into Obra values ('LaBellaylaBestia'),('ElReyLeon'),('ZipiZape');
insert into Seient values ('Teatre de Barcelona',6,6,'Platea'),('Teatre de Barcelona',2,2,'Palco');
insert into Entrada values ('Teatre de Barcelona','ZipiZape',10,16,'Platea','2017/01/25',15);
insert into Entrada values ('Teatre de Barcelona','ZipiZape',8,12,'Palco','2017/01/25',15);
insert into Entrada values('Teatre de Barcelona','ElReyLeon',1,1,'Palco','2017/01/25',15);

select count(*) as ocupats from Entrada where nomObra='ElReyLeon' and dataObra='2017/01/25';
