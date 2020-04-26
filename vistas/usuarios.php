<?php
if(!isset($_SESSION))
    {
        session_start();
    }

      if (isset($_SESSION['usuario']) || $_SESSION['usuario']=='admin') {


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>

     <title>Usuarios</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
        <div class="container" style="padding-top: 40px;">
            <h1 style="color: #3683bc">Administrar Usuarios</h1>
            <br>
            <br>
              <div class="row">
                  <div class="col-sm-4">
                    <form id="frmRegistro">
                      <label style="color: #6c6c6c">Nombre</label>
                      <input type="text" class="form-control input-sm" name="nombre" maxlength="15" id="nombre">
                      <label style="color: #6c6c6c">Apellido</label>
                      <input type="text" class="form-control input-sm" name="apellido"apellido maxlength="15" id="apellido">
                      <label style="color: #6c6c6c">Usuario</label>
                      <input type="text" class="form-control input-sm" name="usuario" maxlength="12" id="usuario" >
                      <label style="color: #6c6c6c">Email</label>
                      <input type="email" class="form-control input-sm" name="email" id="email" >
                      <label style="color: #6c6c6c">Contraseña</label>
                      <input type="password" class="form-control input-sm" name="password" maxlength="8" id="password" >
                      <p></p>
                      <span class="btn btn-success" id="registro">Registrar <i class="far fa-save"></i></span>

                    </form>

                  </div>
                  <div class="col-sm-8">
                      <div id="tablaUsuariosLoad">

                      </div>

                  </div>

              </div><!--row-->

        </div><!--container-->

   </body>
 </html>
 <script type="text/javascript">
   $(document).ready(function(){
       $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
     $('#registro').click(function(){

         vacios=validarFormVacio('frmRegistro');
             if (vacios > 0) {
                 alertify.alert("Debes llenar todos los campos!!");
                 return false;

             }

           datos=$('#frmRegistro').serialize();
           $.ajax({
             type:"POST",
             data:datos,
             url:"../procesos/regLogin/registrarUsuario.php",
             success:function(r){
               alert(r); /**para que arroje el error**/
                   if (r==1) {
                      $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                       alertify.success("Agregado Con Exito!!");

                   }else {
                    alertify.error("Fallo al Agregar :(");
                   }

                 }
               });
             });

               });

         </script>

 <?php
      }else {
          header("location:../index.php");
}

  ?>
