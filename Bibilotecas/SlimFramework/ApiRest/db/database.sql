CREATE DATABASE gerenciador_de_loja  CHARACTER SET utf8 COLLATE utf8_general_ci;


USE gerenciador_de_loja;

CREATE TABLE loja (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    endereco VARCHAR(200)  NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE produto (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    loja_id INT UNSIGNED NOT NULL,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL NOT NULL,
	quantidade INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_produtos_loja_id_lojas_id
		FOREIGN KEY (loja_id) REFERENCES loja(id)
);

/* INSERTS */

INSERT INTO loja (nome, telefone, endereco) VALUES ('Almansa Store', '9108-8462', 'Rua Coronel Vicente');

INSERT INTO produto (loja_id, nome, preco, quantidade)VALUES (1, 'Keyboard', 79.00, 20);

/* SELECTS */
SELECT 
	loja.nome as loja,
	produto.nome as produtos,
	produto.preco as preco,
	produto.quantidade as quantidade
FROM produto
INNER JOIN loja ON produto.loja_id = loja.id
WHERE 
	produto.nome= 'Keyboard'
ORDER BY produto.nome;
	