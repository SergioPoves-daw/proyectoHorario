ALTER TABLE usuarios
ADD CONSTRAINT UQ_correo
UNIQUE (correo);