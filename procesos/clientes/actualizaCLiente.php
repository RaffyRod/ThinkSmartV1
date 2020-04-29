<?php

            if(!isset($_SESSION))
            {
                session_start();
            }

            require_once "../../clases/Conexion.php";
            require_once "../../clases/Clientes.php";

            $obj= new clientes();

            $datos=array(

                $_POST['idclienteU'],
                $_POST['nombreU'],
                $_POST['apellidoU'],
                $_POST['direccionU'],
                $_POST['emailU'],
                $_POST['telefonoU'],
                $_POST['rfcU'],
                $_POST['cedulaU']

            );
                    echo $obj->actualizaCliente($datos);
           



?>