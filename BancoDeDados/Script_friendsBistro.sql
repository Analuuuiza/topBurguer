drop database if exists friendsBistro;

create database friendsBistro;

use friendsBistro;

create table cliente(
id int not null auto_increment,
nome varchar(200) not null,
endereco varchar(200) not null,
telefone varchar(11) not null unique,
email varchar(45) not null unique,
CPF varchar(11) not null unique,
senha varchar(45) not null unique,
primary key (id)
);

create table produtos(
id int not null auto_increment,
nome varchar(200) not null,
preco decimal(8,2) not null,
ingredientes varchar(200) not null,
imagens varchar(500) not null,
primary key (id)
);

create table status(
id int not null auto_increment,
status varchar(45) not null,
primary key (id)
);

create table pedidos(
id int not null auto_increment,
valorTotal decimal(8,2) not null,
primary key (id),
status_id int not null,
constraint fk_status_pedidos
			foreign key (status_id)
			references status (id),
cliente_id int not null,
constraint fk_cliente_pedidos
			foreign key (cliente_id)
			references cliente (id)
);

create table produtos_has_pedidos(
produtos_id int not null,
pedidos_id int not null,
constraint fk_produtos_produtos_has_pedidos
         foreign key (produtos_id)
         references produtos (id),
constraint fk_pedidos_produtos_has_pedidos
         foreign key (pedidos_id)
         references pedidos (id)
);


