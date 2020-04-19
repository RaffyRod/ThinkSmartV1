<?php

if(!isset($_SESSION))
    {
        session_start();
}

      require_once "../../clases/Conexion.php";
      require_once "../../clases/Modelos.php";

      $datos= array(
        $_POST['idmodelo'],
        $_POST['modeloU']
      );



    $obj= new modelos();

      echo $obj->actualizaModelos($datos);
  ?>
