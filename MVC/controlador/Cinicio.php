<?php
    class Cinicio {
        public $vista;

        function mostrarMenu() {
            $this->vista = "MVC/vista/menu.html";
        }

        function mostrarLogin() {
            $this->vista = "MVC/vista/login.html";
        }
    }
?>