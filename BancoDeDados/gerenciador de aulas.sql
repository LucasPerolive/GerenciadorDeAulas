-- DROP DATABASE gerenciadordeaulas;
CREATE DATABASE gerenciadordeaulas;
USE gerenciadordeaulas;

CREATE TABLE professores(
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    matricula VARCHAR(8) NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    formacao VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE materias(
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(25) NOT NULL,
    descricao VARCHAR(200),
    PRIMARY KEY(id)
);

CREATE TABLE salas(
	id INT NOT NULL AUTO_INCREMENT,
    bloco CHAR(1) NOT NULL,
    numero INT NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE aulas(
	id INT NOT NULL AUTO_INCREMENT,
    id_professor INT NOT NULL,
    id_materia INT NOT NULL,
    id_sala INT NOT NULL,
    hora_comeco TIME NOT NULL,
    hora_fim TIME NOT NULL,
    data DATE NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (id_professor) REFERENCES professores(id),
    FOREIGN KEY (id_materia) REFERENCES materias(id),
    FOREIGN KEY (id_sala) REFERENCES salas(id)
);
