create database cadastropessoa;

use cadastropessoa;

create table pessoa(
    cpf char(14) not null primary key,
    nome varchar(100) default null,
    contato char(11) default null,
);