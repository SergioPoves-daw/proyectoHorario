ALTER TABLE asignaturas
ADD CONSTRAINT FK_asignaturasProfesor
FOREIGN KEY (idProfesor) REFERENCES profesores(idProfesor);