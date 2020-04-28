<?php

        if(!isset($_SESSION))
        {
            session_start();
        }
        
        class clientes{

                    public function agregaCliente($datos){
                        $c= new conectar();
                        $conexion=$c->conexion();

                        $idusuario=$_SESSION['iduser'];

                        $sql="INSERT into clientes (id_usuario,
                                                    nombre,
                                                    apellido,
                                                    direccion,
                                                    email,
                                                    telefono,
                                                    rfc,
                                                    cedula)                                                    
                         values('$idusuario',
                                '$datos[0]',
                                '$datos[1]',
                                '$datos[2]',
                                '$datos[3]',
                                '$datos[4]',
                                '$datos[5]',
                                '$datos[6]')";

                        return mysqli_query($conexion,$sql);

                    }










                }

?>