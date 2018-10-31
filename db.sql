
create table deporte(
	id int primary key auto_increment,
	nombre varchar(255)
);

create table equipo(
	id int primary key auto_increment,
	nombre varchar(255),
	deporte int,
	foreign key (deporte) references deporte(id)on delete cascade
);

create table jugador(
	id int primary key auto_increment,
	nombre varchar(255),
	email varchar(255),
	equipo int,
	deporte int,
	foreign key (equipo) references equipo(id)on delete cascade,
	foreign key (deporte) references deporte(id)on delete cascade
);

create table usuarios(
	id int primary key auto_increment,
	nombre varchar(255),
	contrasena varchar(255)
);

insert into usuarios (nombre,contrasena) values ('admin','admin');

insert into deporte (nombre) values ("ajedrez");
insert into deporte (nombre) values ("futbol");
insert into deporte (nombre) values ("beisbol");
insert into deporte (nombre) values ("voleibol");
insert into deporte (nombre) values ("tenis");

insert into equipo (nombre,deporte) values ("pumas",2);
insert into equipo (nombre,deporte) values ("america",2);
insert into equipo (nombre,deporte) values ("toluca",2);