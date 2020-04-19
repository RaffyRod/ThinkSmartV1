<?php

if(!isset($_SESSION))
    {
        session_start();
}

      require_once "../../clases/Conexion.php";
      require_once "../../clases/Marcas.php";

      $datos= array(
        $_POST['idmarca'],
        $_POST['marcaU']
      );



    $obj= new marcas();

      echo $obj->actualizaMarcas($datos);
  ?>
