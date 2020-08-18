<?php

  verificarPermisos('administrador');
  //Llamada al modelo
  require_once("modelos/usuariosModel.php");

  if( isset($_GET['action'])){

    switch( $_GET['action'] ){

      case 'create':
        require_once("vistas/usuarios/form_crear_view.phtml");
        break;

      case 'save':

        $usuario = new usuariosModel();
        $usuario->saveUsuario($_POST);

        $datos = $usuario->getUsuarios();
        require_once("vistas/usuarios/usuarios_view.phtml");
        break;

      case 'view':

        $usuario = new usuariosModel();
        $datos = $usuario->viewUsuario($_GET['id']);
        require_once("vistas/usuarios/usuario_view.phtml");
        break;

      case 'edit':
        $usuario = new usuariosModel();
        $datos = $usuario->viewUsuario($_GET['id']);
        require_once("vistas/usuarios/form_update_view.phtml");
        break;

      case 'update':
        $usuario = new usuariosModel();
        $usuario->updateUsuario($_POST);

        $datos = $usuario->getUsuarios();
        require_once("vistas/usuarios/usuarios_view.phtml");
        break;

      case 'delete':
        $usuario = new usuariosModel();
        $usuario->deleteUsuario($_GET['id']);

        $datos = $usuario->getUsuarios();
        require_once("vistas/usuarios/usuarios_view.phtml");
        break;

    }

  }else{

    $usuario = new usuariosModel();
    $datos = $usuario->getUsuarios();
    //Llamada a la vista
    require_once("vistas/usuarios/usuarios_view.phtml");
  }


?>