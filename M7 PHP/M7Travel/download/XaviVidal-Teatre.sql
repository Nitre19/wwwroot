CREATE SCHEMA xaviteatre ;
use xaviteatre;

create table teatre(
	nom varchar(60),
    primary key (nom));
    
    create table obra(
	nom varchar(60),
    primary key(nom));
    
create table seient (
	zona varchar(60),
    fila int,
    col int,
    primary key(zona,fila,col));
    
create table entrada(
	preu int,
    dataEntrada date,
    primary key(dataEntrada));
    
