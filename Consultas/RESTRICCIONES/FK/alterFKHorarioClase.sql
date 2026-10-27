ALTER TABLE horario
ADD CONSTRAINT FK_horarioClase
FOREIGN KEY (idClase) REFERENCES clases(idClase);