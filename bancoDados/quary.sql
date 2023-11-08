CREATE DATABASE fastVelocidade;

USE fastVelocidade;

select * from fastVelocidade.usuarios;
select * from fastVelocidade.chaveIdClients;
select * from fastVelocidade.resultsClients;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    pais VARCHAR(50),
    numeroTelefone VARCHAR(15),
    cargo VARCHAR(100),
    chave VARCHAR(600)
);

CREATE TABLE chaveIdClients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    chave VARCHAR(255) NOT NULL
);

CREATE TABLE resultsClients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    insertion_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    computer_name VARCHAR(255),
    endmac VARCHAR(255),
    ipv4_address VARCHAR(15),
    tag_1 TEXT,
    tag_2 TEXT,
    tag_3 TEXT,
    tag_4 TEXT,
    tag_5 TEXT,
    tag_6 TEXT,
    tag_7 TEXT,
    tag_8 TEXT,
    tag_9 TEXT,
    tag_10 TEXT,
    chave TEXT,
    var1 TEXT,
    var2 TEXT
);