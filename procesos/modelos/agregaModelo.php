<?php

if(!isset($_SESSION))
    {
        session_start();
}

      require_once "../../clases/Conexion.php";
      require_once "../../clases/Modelos.php";
        //$fechasalida=date("Y-m-d");
    //  $idusuario=$_SESSION['iduser'];
      $modelo =$_POST['modelo'];
    
     
    


          $datos=array(
                        
                      $modelo,                      
                  

          );


            $obj= new modelos();

	echo $obj->agregaModelo($datos);


  ?>
