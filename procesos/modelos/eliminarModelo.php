<?php 

if(!isset($_SESSION))
{
    session_start();
}

  require_once "../../clases/Conexion.php";
  require_once "../../clases/Modelos.php";

        $id=$_POST['idmodelo'];

        $obj= new modelos();
        echo $obj->eliminaModelo($id);





?>