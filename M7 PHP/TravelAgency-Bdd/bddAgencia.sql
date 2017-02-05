create table admin(
	nombre varchar(40) primary key,
    contrasenya varchar(40)
)engine=innodb;

insert into admin values ('admin','admin');
select * from admin;

create table usuario(
	nombre varchar(40) primary key,
    edad int,
    email varchar(40)
)engine=innodb;

insert into usuario values ('xavi','20', 'xavi@gmail.com');
select * from usuario;

Select * from usuario where nombre='xavi';


create table viajes(
	id int,
	destino varchar(40) primary key,
    precio int,
    imagen varchar(150),
    descuento int
)engine=innodb;

insert into viajes values ('1','Rio de Janeiro','1500', 'destino/img1.jpg', '15');
insert into viajes values ('2','Costa Rica','2000', 'destino/img2.jpg', '10');
insert into viajes values ('3','Hawaii','2700', 'destino/img3.jpg', '8');
insert into viajes values ('4','Jamaica','2100', 'destino/img4.jpg', '15');
insert into viajes values ('5','Machu Picchu','1900', 'destino/img5.jpg', '5');

select * from viajes;
