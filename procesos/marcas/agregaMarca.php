<?php

if(!isset($_SESSION))
    {
        session_start();
}

      require_once "../../clases/Conexion.php";
      require_once "../../clases/Marcas.php";
    //  $fecha=date("Y-m-d");
    //  $idusuario=$_SESSION['iduser'];
      $marca =$_POST['marca'];


        $datos=array(
                      $marca
         );


            $obj= new marcas();

	echo $obj->agregaMarca($datos);


  ?>
