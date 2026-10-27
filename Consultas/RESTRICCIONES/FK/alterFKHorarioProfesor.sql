ALTER TABLE horario
ADD CONSTRAINT FK_horarioProfesor
FOREIGN KEY (idProfesor) REFERENCES profesores(idProfesor);