<?php
      class modelos{
            public function agregaModelo($datos){
              $c= new conectar();
              $conexion= $c->conexion();

                $sql= "INSERT into modelos (nombre) values ('$datos[0]')" ;                                                                              
                          return mysqli_query ($conexion,$sql);

            }
            public function actualizaModelos($datos){
              $c= new conectar();
              $conexion= $c->conexion();

              $sql = "UPDATE modelos set nombre = '$datos[1]'
              where id_modelo ='$datos[0]'";
              echo mysqli_query($conexion,$sql);

            }
            public function eliminaModelo($idmodelo){
              $c= new conectar();
              $conexion= $c->conexion();
              $sql="DELETE from modelos where id_modelo ='$idmodelo'";

              return mysqli_query($conexion,$sql);

            }

   }



 ?>
