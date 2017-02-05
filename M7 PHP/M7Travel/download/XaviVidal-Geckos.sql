
CREATE SCHEMA xavigeckos ;

use xavigeckos;
drop table if exists cart_geckos;
drop table if exists viajes_geckos;
drop table if exists users_geckos;

create table viajes_geckos (
	id int,	
    destino varchar(60),
    urlImg varchar(100),
    preu int,
    descuento int,
    primary key(id));
    

create table users_geckos (
	nom varchar(20),
    pass varchar(20),
    edat int,
    email varchar(100),
    primary key(nom,pass)
);


create table cart_geckos (
	nom varchar(20),
    pass varchar(20),
    id int,
    qtt int,
    PRIMARY KEY (nom,pass,id),
    foreign key (nom,pass) references users_geckos(nom,pass),
    foreign key (id) references viajes_geckos(id)
);

INSERT INTO viajes_geckos VALUES (
	1,'Canada','img/canada.jpg',600,10
);
INSERT INTO viajes_geckos VALUES (
	2,'Alemania','img/alemania.jpg',300,5
);
INSERT INTO viajes_geckos VALUES (
	3,'Madrid','img/madrid.jpg',50,4
);
INSERT INTO viajes_geckos VALUES (
	4,'Japon','img/japon.jpg',1200,8
);
INSERT INTO viajes_geckos VALUES (
	5,'Brasil','img/brasil.jpg',700,2
);
INSERT INTO viajes_geckos VALUES (
	6,'Italia','img/italia.jpg',600,3
);

/*
select * from viajes_geckos;
select * from users_geckos;
select * from cart_geckos;
select * from cart_geckos where nom='admin' and pass='admin' group by id;
select * from cart_geckos where nom='admin' and pass='admin' and id='2';
select max(id) from viajes_geckos;
DELETE FROM viajes_geckos WHERE id>6;
*/

/*
insert into users_geckos value (
	'admin','admin',20,'xvidalllicasmx@gmail.com'
);
*/


