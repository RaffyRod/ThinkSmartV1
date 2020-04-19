<?php 

if(!isset($_SESSION))
{
    session_start();
}

  require_once "../../clases/Conexion.php";
  require_once "../../clases/Marcas.php";

        $id=$_POST['idmarca'];

        $obj= new marcas();
        echo $obj->eliminaMarca($id);





?>