<?php
  //Llamada al modelo
  require_once("modelos/usuariosModel.php");

  if( isset($_GET['action'])){

    switch( $_GET['action'] ){

      case 'ingresar':
        $usuario = new usuariosModel();
        $usuario = $usuario->verificarLogin($_POST);
        
        if($usuario == false){
          //si falla login
          $datos['error']= "Usuario o Contraseña incorrectos";
          require_once("vistas/login/login_view.phtml");
        }else{
          //login correcto
          $_SESSION['id'] = $usuario['id'];
          $_SESSION['nombre'] = $usuario['nombre'];
          $_SESSION['email'] = $usuario['email'];
          $_SESSION['rol'] = $usuario['rol'];

          redirigirHome();
          
        }
      break;

      case 'salir':
        session_unset();
        header('Location: index.php?controller=login');
      break;

    }

  }else{

    redirigirHome();
    
  }


?>