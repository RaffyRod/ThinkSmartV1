<?php
if(!isset($_SESSION))
    {
        session_start();
    }
      if (isset($_SESSION['usuario'])) {

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>

     <title>Clientes</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
     <div class="container" style="padding-top: 40px;">
       <h1 style="color: #3683bc">Clientes</h1>
       <br><br>
           <div class="row">
               <div class="col-sm-3">
                <form id="frmClientes">
                  <label style="color: #6c6c6c">Nombre</label>
                  <input type="text" class="form-control input-sm" id="nombre" name="nombre" >
                  <label style="color: #6c6c6c">Apellido</label>
                  <input type="text" class="form-control input-sm" id="apellido" name="apellido" >
                  <label style="color: #6c6c6c">Direccion</label>
                  <input type="text" class="form-control input-sm" id="direccion" name="direccion" >
                  <label style="color: #6c6c6c">Email</label>
                  <input type="email" class="form-control input-sm" id="email" name="email" >
                  <label style="color: #6c6c6c">Telefono</label>
                  <input type="tel" class="form-control input-sm" id="telefono" name="telefono" >
                  <label style="color: #6c6c6c">RNC</label>
                  <input type="number" class="form-control input-sm" id="rfc" name="rfc" >
                  <label style="color: #6c6c6c">Cedula</label>
                  <input type="number" class="form-control input-sm" id="cedula" name="cedula" >
                  <p></p>
                  <span class="btn btn-success"  id="btnAgregarCliente">Agregar</span>

                </form>

               </div><!--col1-->

               <div class="col-sm-9">
                     <div id="tablaClientesLoad"></div>

               </div><!--colsm8-->

           </div><!--row-->

     </div><!--articulos-->


              <!--inicio modal--> 
              


<!-- Modal -->
<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Clientes</h4>
      </div>
      <div class="modal-body">

      <form id="frmClientesU">
                  <input type="text" hidden="" name="idclienteU" id="idclienteU"> <!--hidden=""-->
                  <label style="color: #6c6c6c">Nombre</label>
                  <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                  <label style="color: #6c6c6c">Apellido</label>
                  <input type="text" class="form-control input-sm" id="apellidoU" name="apellidoU">
                  <label style="color: #6c6c6c">Direccion</label>
                  <input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
                  <label style="color: #6c6c6c">Email</label>
                  <input type="email" class="form-control input-sm" id="emailU" name="emailU">
                  <label style="color: #6c6c6c">Telefono</label>
                  <input type="tel" class="form-control input-sm" id="telefonoU" name="telefonoU">
                  <label style="color: #6c6c6c">RNC</label>
                  <input type="number" class="form-control input-sm" id="rfcU" name="rfcU">
                  <label style="color: #6c6c6c">Cedula</label>
                  <input type="number" class="form-control input-sm" id="cedulaU" name="cedulaU">                  
                </form>
      </div>
      <div class="modal-footer">
        <button id="btnAgregarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>        
      </div>
    </div>
  </div>
</div>          
              <!--final modal-->
   </body>
 </html>

          <!--Funciones-->           
              <script  type="text/javascript">
                    function agregaDatosCliente(idcliente){

                    $.ajax({
                      type:"POST",
                      data:"idcliente=" + idcliente,
                      url:"../procesos/clientes/obtenDatosCliente.php",
                      success:function(r){
                        
                        dato=jQuery.parseJSON(r);
                        $('#idclienteU').val(dato['id_cliente']);
                        $('#nombreU').val(dato['nombre']);
                        $('#apellidoU').val(dato['apellido']);
                        $('#direccionU').val(dato['direccion']);
                        $('#emailU').val(dato['email']);
                        $('#telefonoU').val(dato['telefono']);
                        $('#rfcU').val(dato['rfc']);
                        $('#cedulaU').val(dato['cedula']);     
                                              
                         }
                    });
                    }

                     //Funcion eliminar usuario

                     function eliminarCliente(idcliente){
                        alertify.confirm('Seguro que desea Eliminar a este Cliente?', function(){
                      $.ajax({
                        type:"POST",
                        data:"idcliente=" + idcliente,
                        url:"../procesos/clientes/eliminarCliente.php",
                        success:function(r){
                              if (r==1) {
                                $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                                    alertify.success("El Cliente ha sido Eliminado!!");

                              }else {
                                  alertify.error("No se pudo Eliminar Este Cliente!!");
                              }

                        }
                });
              }, function(){ alertify.error('Se Cancelo Operacion')
             });

            }

             //Funcion eliminar usuario
                
              </script>         
          
          
          <!--Funciones final-->


 <script type="text/javascript">

     $(document).ready(function(){

       $('#tablaClientesLoad').load("clientes/tablaClientes.php");

       $('#btnAgregarCliente').click(function(){

         vacios=validarFormVacio('frmClientes');
             if (vacios > 0) {
                 alertify.alert("Debes llenar todos los campos!!");
                 return false;
             }


         datos=$('#frmClientes').serialize();
        
         $.ajax({
           type:"POST",
           data:datos,
           url:"../procesos/clientes/agregaCLiente.php",
           success:function(r){
               
               if(r==1){
                   $('#frmClientes')[0].reset();
                   $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                 alertify.success("Cliente Agregado con Exito!!");
               } else {
                 alertify.error("No se Pudo agregar Cliente !!")
               }
           }
         });
     });
   });

 </script>
                <!--Actuaizar cliente-->
            <script  type="text/javascript">
                $(document).ready(function(){
                      $('#btnAgregarClienteU').click(function(){
                        datos=$('#frmClientesU').serialize();
        
                      $.ajax({
                        type:"POST",
                        data:datos,
                        url:"../procesos/clientes/actualizaCLiente.php",
                        success:function(r){
              
                            if(r==1){
                                $('#frmClientes')[0].reset();
                                $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                              alertify.success("Cliente Actualizado con Exito!!");
                            } else {
                                  alertify.error("No se Pudo Actualizar Cliente !!")
                            }

                        }
                      });

                      });
                });
               
            </script>
             <!--Actuaizar cliente fin-->



 <?php
      }else {
          header("location:../index.php");
}

  ?>
