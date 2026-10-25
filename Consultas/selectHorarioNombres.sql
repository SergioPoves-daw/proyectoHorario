SELECT c.nombre, a.nombre, p.nombre, dia, hora  FROM horario h
INNER JOIN clases c ON h.idClase = c.idClase
INNER JOIN asignaturas a ON h.idAsignatura = a.idAsignatura
INNER JOIN profesores p ON h.idProfesor = p.idProfesor
ORDER BY dia, hora;