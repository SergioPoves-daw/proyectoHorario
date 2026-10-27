ALTER TABLE horario
ADD CONSTRAINT CK_diaValido
CHECK (dia IN ('L', 'M', 'X', 'J', 'V'));