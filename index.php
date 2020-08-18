<?php


session_start();
require_once("lib/helper.php");
require_once("dbs/db.php");

if(isset($_GET["controller"])){
    if(file_exists("controladores/" . $_GET["controller"] . "Controller.php")){
        require_once("controladores/" . $_GET["controller"] . "Controller.php");
    }else {
        echo("Este controlador <b>" . $_GET["controller"] . "</b> No Existe");
    }
    
} else {
    require_once("controladores/loginController.php");
}


?>