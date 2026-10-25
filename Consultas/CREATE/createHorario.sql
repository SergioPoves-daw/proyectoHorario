CREATE TABLE horario (
	idClase TINYINT NOT NULL,
	idAsignatura TINYINT NOT NULL,
	idProfesor SMALLINT NOT NULL,
	dia CHAR(1) NOT NULL,
	hora TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (idClase, dia, hora)
);