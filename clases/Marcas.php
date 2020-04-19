<?php
      class marcas{
            public function agregaMarca($datos){
              $c= new conectar();
              $conexion= $c->conexion();

                $sql= "INSERT into marcas (nombre) values ('$datos[0]')";
                return mysqli_query ($conexion,$sql);
            }

            public function actualizaMarcas($datos){
              $c= new conectar();
              $conexion= $c->conexion();

              $sql = "UPDATE marcas set nombre = '$datos[1]'
              where id_marca ='$datos[0]'";
              echo mysqli_query($conexion,$sql);

            }
            public function eliminaMarca($idmarca){
              $c= new conectar();
              $conexion= $c->conexion();
              $sql="DELETE from marcas where id_marca ='$idmarca'";

              return mysqli_query($conexion,$sql);

            }
   }

 ?>
