<?php
if(!isset($_SESSION))
    {
        session_start();
    }
      if (isset($_SESSION['usuario'])) {
?>

    <!DOCTYPE html>
    <html >
    <head>

      <title>Modelos</title>
      <?php require_once "menu.php"; ?>
      <?php require_once "../clases/Conexion.php";
      $c= new conectar();
      $conexion=$c->conexion();
      $sql = "SELECT id_marca,nombre from marcas";
      $result= mysqli_query($conexion,$sql);

      ?>
    </head>
    <body>
           <div class="container" style="padding-top: 40px;">
             <h1 style="color: #3683bc">Modelos</h1>
               <div class="row">
                   <div class="col-sm-4">
                         <form id="frmModelos">
                           <br>
                             <label style="color: #6c6c6c"><bold>Modelo</bold></label>
                                 <input type="text" class="form-control input-sm" name="modelo" id="modelo"> <br>
                                  <br>
                                 
                                    <p></p>
                                    <span class="btn btn-success" id="btnAgregaModelo">Agregar</span>
                                     </form>
                   </div>
                   <div class="col-sm-6">
                         <div id="tablaModelosLoad"></div>
                   </div>
               </div><!--row-->
           </div> <!--container-->

          <!-- Modal -->
          <div class="modal fade" id="actualizaModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Modelo</h4>
      </div>
      <div class="modal-body">
          <form id="frmModeloU">
                <input type="text" hidden="" id="idmodelo"  name="idmodelo" >
                <label> Modelo</label>
                <input type="text" id="modeloU" name="modeloU" class="form-control input-sm" >
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnActualizaModelo" class="btn btn-warning" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>
         <!-- Modal -->      

      </body>
    </html>
    <script type="text/javascript">

        $(document).ready(function(){

          $('#tablaModelosLoad').load("modelos/tablaModelos.php");

          $('#btnAgregaModelo').click(function(){

            vacios=validarFormVacio('frmModelos');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

            datos=$('#frmModelos').serialize();
            $.ajax({
              type:"POST",
              data:datos,
              url:"../procesos/modelos/agregaModelo.php",
              success:function(r){
                  alert(r); // remover luego
                  if(r=>1){
                    //limpiar el form-->

                  $('#tablaModelosLoad').load("modelos/tablaModelos.php");
                  alertify.success("Modelo Agregado con Exito!!");
                    $('frmModelos')[0].reset();

                  } else {
                    alertify.error("No se Pudo agregar Modelo!!")
                  }
              }
            });
        });

      });

    </script>  <!--hasta aqui agregado-->

    <!--inicio de actualizacion-->

    <script type="text/javascript">
    $(document).ready(function(){
      $('#btnActualizaModelo').click(function(){

          datos=$('#frmModeloU').serialize();
          $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/modelos/actualizaModelo.php",
                success:function(r){
                  if( r == 1 ){
                    $('#tablaModelosLoad').load("modelos/tablaModelos.php");
                    alertify.success("Modelo Ha sido Actualizado!!")

                  } else {
                        alertify.error("Fallo en Actualizar Modelo");
                  }

            }
          });
          });

    });   
    
    </script>

<script type="text/javascript">   // actualizar marca comienza a qui
        function agregaDato(idModelo,modelo){
          $('#idmodelo').val(idModelo);     
          $('#modeloU').val(modelo);   
        } 

        // Eliminacion 
        function eliminaModelo(idmodelo){
          alertify.confirm('Desea Borrar esta Modelo?', function(){ 
            $.ajax({
			      type:"POST",
			      data:"idmodelo=" + idmodelo,
			      url:"../procesos/modelos/eliminarModelo.php",
			      success:function(r){
              alert(r);  // Eliminar despues
              if( r==1 ){
                $('#tablaModelosLoad').load("modelos/tablaModelos.php");
                alertify.success("Eliminado con Exito!!");
              } else {
                alertify.error("Fallo en la Operacion");
              }

			}
		}); 
          }, function(){ alertify.error('Cancelo Operacion')
          });

        }
        
    
       </script>       


    <?php

         }else {
             header("location:../index.php");
   }

     ?>
