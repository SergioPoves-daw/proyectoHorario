ALTER TABLE horario
ADD CONSTRAINT UQ_ProfesorDiaHora
UNIQUE (idProfesor, dia, hora);