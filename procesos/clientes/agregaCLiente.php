<?php
            require_once "../../clases/Conexion.php";
            require_once "../../clases/Clientes.php";

            $obj= new clientes();

            $datos=array(

                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['direccion'],
                $_POST['email'],
                $_POST['telefono'],
                $_POST['rfc'],
                $_POST['cedula']

            );
                    echo $obj->agregaCliente($datos);
           



?>