create database cadastropessoa;

use cadastropessoa;

create table pessoa(
    cpf char(14) not null primary key,
    nome varchar(100) default null,
    contato char(11) default null
);

create table agenda(
    codigo int primary key auto_increment,
    cpf char(14) not null,
    foreign key (cpf) references pessoa(cpf),
    data date not null,
    descricao varchar(100) not null
);