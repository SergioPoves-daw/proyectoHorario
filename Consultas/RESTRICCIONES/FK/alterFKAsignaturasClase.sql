ALTER TABLE asignaturas
ADD CONSTRAINT FK_asignaturasClase
FOREIGN KEY (idClase) REFERENCES clases(idClase);