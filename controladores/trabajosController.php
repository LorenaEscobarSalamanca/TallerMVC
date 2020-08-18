<?php

  
  //Llamada al modelo
  require_once("modelos/trabajosModel.php");

  if( isset($_GET['action'])){

    switch( $_GET['action'] ){

      case 'create':
        require_once("vistas/tecnicos/form_crear_trabajo.phtml");
        break;

      case 'save':

        $trabajo = new trabajosModel();
        $trabajo->saveTrabajo($_POST);

        $datos = $trabajo->getTrabajos();
        require_once("vistas/tecnicos/homeTecnicos.phtml");
        break;

      case 'view':

        $trabajo = new trabajosModel();
        $datos = $trabajo->viewTrabajo($_GET['id']);
        require_once("vistas/tecnicos/trabajo_view.phtml");
        break;

      case 'edit':
        $trabajo = new trabajosModel();
        $datos = $trabajo->viewTrabajo($_GET['id']);
        require_once("vistas/tecnicos/form_update_trabajo.phtml");
        break;

      case 'update':
        $trabajo = new trabajosModel();
        $trabajo->updateTrabajo($_POST);

        $datos = $trabajo->getTrabajos();

        verificarPermisos('administrador');
        
        break;

      case 'delete':
        verificarPermisos('administrador');
        $trabajo = new trabajosModel();
        $trabajo->deleteTrabajo($_GET['id']);

        $datos = $trabajo->getTrabajos();
        require_once("vistas/administradores/homeAdministradores.phtml");
        break;

    }

  }else{

    $trabajo = new trabajosModel();
    $datos = $trabajo->getTrabajos();
    //Llamada a la vista
    require_once("vistas/tecnicos/homeTecnicos.phtml");
  }


?>