ALTER TABLE horario
ADD CONSTRAINT FK_horarioAsignatura
FOREIGN KEY (idAsignatura) REFERENCES asignaturas(idAsignatura);