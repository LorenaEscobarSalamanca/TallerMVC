<?php

    function verificarPermisos($rolRequerido){
        if ($rolRequerido != $_SESSION['rol']){
            header('Location: index.php?controller=login');
        }
    } 

    function redirigirHome(){

        if(isset($_SESSION['rol'])){

            if ($_SESSION['rol'] == 'administrador'){
                header('Location: index.php?controller=homeAdministrador');
              }else{
                header('Location: index.php?controller=homeTecnicos');
              }

        } 
            require_once("vistas/login/login_view.phtml");  

        
    }

    function dirigirMenu(){
        if($_SESSION['rol'] =='administrador'){
            require_once("./vistas/menuAdministrador.phtml");
          }else{
            require_once("./vistas/menuTecnicos.phtml");
          }
    }

    function horaActual(){
        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d H:i:s");
        return $fecha;
    }


?>