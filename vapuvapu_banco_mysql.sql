CREATE TABLE IF NOT EXISTS pagamento (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        valor DECIMAL(12, 2), 
        id_usuario INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS usuario (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        sobrenome VARCHAR(400), 
        cpf_cnpj VARCHAR(400), 
        razao_social VARCHAR(400), 
        email VARCHAR(400), 
        senha VARCHAR(400)
)ENGINE = InnoDB;

ALTER TABLE pagamento
    ADD CONSTRAINT fk_pagamento_usuario FOREIGN KEY (id_usuario)
    REFERENCES usuario (id);