<?php
require_once "clases/Conexion.php";
          $obj = new conectar();
          $conexion = $obj->conexion();

          $sql ="SELECT * FROM usuarios WHERE usuario='SYSDEV'";
          $result= mysqli_query($conexion,$sql);
          $validar=0;

              if (mysqli_num_rows($result) > 0 ) {
                header("location:index.php");
              }
 ?>

<!DOCTYPE html>
<html>
  <head>
  <!--  <meta charset="utf-8">-->
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>


  </head>
<body style="background: rgb(249,252,247); /* Old browsers */
background: -moz-linear-gradient(-45deg, rgba(249,252,247,1) 0%, rgba(245,249,240,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#f5f9f0',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */)">      <br><br><br>


            <div class="container">
                  <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4">
                          <div class="panel panel-info">
                              <div class="panel panel-heading">Registrar Administrador  <i class="fas fa-user-tie"></i></div>
                                <div class="panel panel-body">

                              <form id="frmRegistro">
                                <label style="color: #3683bc">Nombre</label>
                                <input type="text" class="form-control input-sm" name="nombre"  id="nombre">
                                <label style="color: #3683bc">Apellido</label>
                                <input type="text" class="form-control input-sm" name="apellido"apellido  id="apellido">
                                <label style="color: #3683bc">Usuario</label>
                                <input type="text" class="form-control input-sm" name="usuario" id="usuario" >
                                <label style="color: #3683bc">Email</label>
                                <input type="email" class="form-control input-sm" name="email" id="email" >
                                <label style="color: #3683bc">Contraseña</label>
                                <input type="password" class="form-control input-sm" name="password" id="password" >
                                <p></p>
                                <span class="btn btn-success" id="registro">Registrar <i class="far fa-save"></i></span>
                                <a href="index.php" class="btn btn-warning">Regresar login <i class="fas fa-long-arrow-alt-left"></i></a>

                              </form>
                            </div><!--panel panel-body-->


                          </div>


                      </div>
                      <div class="col-sm-4"></div>



                  </div><!--row-->

            </div><!--container-->

  </body>
</html>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#registro').click(function(){

              vacios=validarFormVacio('frmRegistro');
                  if (vacios > 0) {
                      alert("Debes llenar todos los campos!!");
                      return false;

                  }

                datos=$('#frmRegistro').serialize();
                $.ajax({
                  type:"POST",
                  data:datos,
                  url:"procesos/regLogin/registrarUsuario.php",
                  success:function(r){
                    alert(r); /**para que arroje el error**/
                        if (r==1) {
                            alert("Agregado Con Exito!!");

                        }else {
                          alert("Fallo al Agregar :(");
                        }

                      }
                    });
                  });

                    });

              </script>
