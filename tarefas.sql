CREATE TABLE tarefas (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45),
	senha VARCHAR(45),
	email VARCHAR(110),
	telefone VARCHAR(15),
	sexo VARCHAR(15),
	data_nasc DATE,
	cidade VARCHAR(45),
	estado VARCHAR(45),
	endereco VARCHAR(45) )