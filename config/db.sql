CREATE DATABASE Atividade_14;

USE Atividade_14;

CREATE TABLE Usuario(
    id int auto_increment primary key not null,
    nome varchar(120) not null,
    email varchar(120) not null
);

CREATE TABLE Tarefas(
    id int auto_increment primary key not null,
    id_usuario int not null,
    descrisao varchar(120) not null,
    setor varchar(120) not null,
    prioridade ENUM('baixa','média','alta') not null,
    data default timestamp not null,
    status ENUM('a fazer','fazendo','pronto') not null,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id)
);