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
              <!--Inicio Modal-->
                     

<!-- Modal -->
<div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
      </div>
      <div class="modal-body">

      <form id="frmRegistroU">
                      <input type="number" hidden="" id="idUsuario" name="idUsuario"> <!---->
                      <label style="color: #6c6c6c">Nombre</label>
                      <input type="text" class="form-control input-sm" name="nombreU" maxlength="15" id="nombreU">
                      <label style="color: #6c6c6c">Apellido</label>
                      <input type="text" class="form-control input-sm" name="apellidoU"apellido maxlength="15" id="apellidoU">
                      <label style="color: #6c6c6c">Usuario</label>
                      <input type="text" class="form-control input-sm" name="usuarioU" maxlength="12" id="usuarioU" >
                      <label style="color: #6c6c6c">Email</label>
                      <input type="email" class="form-control input-sm" name="emailU" id="emailU" >                     
                    </form>
        
      </div>
      <div class="modal-footer">
        <button id="btnActualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualiza Usuario</button>
        
      </div>
    </div>
  </div>
</div>
           
              <!--fin modal-->
 </html>
          <!--Inicio Actualizacion--> 
              <script type="text/javascript">
                    function agregaDatosUsuario(idusuario){

                      $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario,
                        url:"../procesos/usuarios/obtenDatosUsuario.php",
                        success:function(r){
                          dato=jQuery.parseJSON(r);

                          $('#idUsuario').val(dato['id_usuario']);
                          $('#nombreU').val(dato['nombre']);
                          $('#apellidoU').val(dato['apellido']);
                          $('#usuarioU').val(dato['usuario']);
                          $('#emailU').val(dato['email']);
                        }
                      });
                      }

                      //Funcion eliminar usuario

                      function eliminarUsuario(idusuario){
                        alertify.confirm('Seguro que desea Eliminar a este Usuario?', function(){
                      $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario,
                        url:"../procesos/usuarios/eliminarUsuario.php",
                        success:function(r){
                              if (r==1) {
                                  $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                                    alertify.success("El Usuario ha sido Eliminado!!");

                              }else {
                                  alertify.error("No se pudo Eliminar Este Usuario!!");
                              }

                        }
                });
              }, function(){ alertify.error('Se Cancelo Operacion')
             });

            }

             //Funcion eliminar usuario
                   
              </script>

              <script  type="text/javascript">
                  $(document).ready(function(){
                    $('#btnActualizaUsuario').click(function(){
                    datos=$('#frmRegistroU').serialize();
                    $.ajax({
                      type:"POST",
                      data:datos,
                      url:"../procesos/usuarios/actualizaUsuario.php",
                      success:function(r){
                                  
                                  if(r==1){
                                    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                                       alertify.success("Actualizado Con Exito!!");
                                  } else{
                                       alertify.error("Fallo al Actualizar");

                                  }

                              }
                          });
                       });


                  });
                
              </script>
          
          
          
          
          
          
          
          
          
          
          
          
          <!--final Actualizacion-->




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
                     $('#frmRegistro')[0].reset();
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
