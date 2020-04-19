<?php
if(!isset($_SESSION))
    {
        session_start();
    }

        class articulos {

              public function agregaImagen($datos)
          {
                $c= new conectar();
                $conexion = $c->conexion();
                $fecha= date('Y-m-d');
                $sql= "INSERT INTO imagenes (id_categoria,
                                            nombre,
                                            ruta,
                                            fechaSubida) values ('$datos[0]',
                                                                  '$datos[1]',
                                                                  '$datos[2]',
                                                                  '$fecha')";
                $result = mysqli_query ($conexion,$sql);

                return mysqli_insert_id($conexion);


          }
              public Function insertaArticulo($datos){

                $c= new conectar();
                $conexion = $c->conexion();
                $fecha= date('Y-m-d');

                    $sql="INSERT INTO articulos (id_categoria,
                                                    id_imagen,
                                                    id_usuario,
                                                    nombre,
                                                    descripcion,
                                                    cantidad,
                                                    precio,
                                                    fechaCaptura) values('$datos[0]',
                                                                          '$datos[1]',
                                                                          '$datos[2]',
                                                                          '$datos[3]',
                                                                          '$datos[4]',
                                                                          '$datos[5]',
                                                                          '$datos[6]','$fecha' )";
                                                    return mysqli_query ($conexion,$sql);


              }
        }

  ?>
