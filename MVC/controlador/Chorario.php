<?php
    require 'MVC/modelo/CmodeloAsignatura.php';
    require 'MVC/modelo/CmodeloHorario.php';
    require 'MVC/modelo/CmodeloClase.php';

    class Chorario {
        public $vista;
        public $mensaje;

        // Obtiene las filas de clases para alta horario para seleccionar
        function obtenerClasesParaHorario() {
            $datos = new CmodeloClase();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/seleccionarClaseAltaHorario.php';
            return $clases;
        }

        // Saber si una clase tiene horario
        function obtenerHorarioClase($idClase) {
            $datos = new CmodeloHorario();
            $existe = $datos->obtenerFilaHorario($idClase);
            return $existe;
        }

        // Recoge los datos del formulario de horario
        function introducirDatosHorario() {

            // Si la clase ya tiene un horario, no permite introducir uno nuevo
            if ($this->obtenerHorarioClase($_POST["clase"])) {
                $this->mensaje = "Esta clase ya tiene un horario";
                $this->vista = "MVC/vista/mensajeValidacion.php";
                return;
            }

            $datosAsignaturas = new CmodeloAsignatura();
            // HORAS
            $horas = [
                1 => "8:15-9:10",
                2 => "9:10-10:05",
                3 => "10:05-11:00",
                4 => "11:30-12:25",
                5 => "12:25-13:20",
                6 => "13:20-14:15",
                7 => "14:15-15:30"
            ];

            // DIAS
            $dias = [
                "L" => "Lunes",
                "M" => "Martes",
                "X" => "Miércoles",
                "J" => "Jueves",
                "V" => "Viernes"
            ];

            $horario = $_POST["horario"] ?? []; // Recibe los input hidden, almacenando el total de entradas

            // Recoger valores principales para la consulta
            if (isset($_POST["clase"])) $idClase = $_POST["clase"]; // Recibe el id de la clase
            if (isset($_POST["asignaturas"])) $idAsignaturas = $_POST["asignaturas"]; // Recibe un array del id de las asignaturas seleccionadas
            if (isset($_POST["horas"])) $horaAsignaturas = $_POST["horas"];
            $dia = $_POST["dia"] ?? "L";
            $diaAnterior = $_POST["dia"] ?? null;

            // Guardar/acumular datos insertados en el array de horario
            if (isset($_POST["asignaturas"])) {
                foreach ($idAsignaturas as $c => $asignatura) {
                    $horario[] = [
                        "clase" => $idClase,
                        "asignatura" => $asignatura,
                        "profesor" => $datosAsignaturas->obtenerProfesorAsignatura($asignatura),
                        "dia" => $dia,
                        "hora" => $horaAsignaturas[$c] // Hora que se imparte la asignatura
                    ];
                }
            }

            // Si se ha insertado datos del viernes, guardar datos
            if ($dia == "V") {
                $datos = new CmodeloHorario();
                $resultado = $datos->insertarHorario($horario);

                if ($resultado) {
                    $this->mensaje = "Horario guardado correctamente";
                }
                else {
                    $this->mensaje = "Error al guardar el horario";
                }

                $this->vista = 'MVC/vista/mensajeValidacion.php';
                header("refresh: 3 url=index.php?controlador=Cinicio&metodo=mostrarMenu");
            }

            // Si no, seguir pasando días e insertando datos
            else {
                // SABER DÍA SIGUIENTE
                switch ($diaAnterior) {
                    case "L": 
                        $dia = "M";
                        break;

                    case "M":
                        $dia = "X";
                        break;

                    case "X":
                        $dia = "J";
                        break;

                    case "J":
                        $dia = "V";
                        break;
                }

                // FUNCIÓN PRINCIPAL
                $asignaturas = $datosAsignaturas->obtenerAsignaturasClase($idClase);
                $this->vista = 'MVC/vista/altaHorario.php';

                // Datos a mostrar en el formulario
                $datos = [
                    "clase" => $idClase, 
                    "asignaturas" => $asignaturas, 
                    "dias" => $dias,
                    "dia" => $dia,
                    "horas" => $horas,
                    "horario" => $horario
                ];

                // Envía de nuevo los datos que ya tiene para que el formulario sepa el día, datos insertados, etc...
                return $datos;
            }
        }
    }
?>