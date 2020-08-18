<?php

verificarPermisos('administrador');

require_once("modelos/trabajosModel.php");
$trabajo = new trabajosModel();
$datos = $trabajo->getTrabajos();

require_once("vistas/administradores/homeAdministradores.phtml");

?>