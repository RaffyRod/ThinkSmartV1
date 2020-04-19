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

     <title>Marcas</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
          <div class="container" style="padding-top: 40px;">
            <h1 style="color: #3683bc">Marcas</h1>
              <div class="row">
                  <div class="col-sm-4">
                        <form id="frmMarcas">
	                        <br>
                            <label style="color: #6c6c6c"><bold>Marca</bold></label>
                                <input type="text" class="form-control input-sm" name="marca" id="marca">
                                   <p></p>
                                   <span class="btn btn-success" id="btnAgregaMarca">Agregar</span>
                                    </form>
                  </div>
                  <div class="col-sm-6">
                        <div id="tablaMarcasLoad"></div>
                  </div>
              </div><!--row-->
          </div> <!--container-->

          <!--actualizar cat-->

          <!-- Button trigger modal -->



<!--</button>-->
<!-- Modal -->
<div class="modal fade" id="actualizaMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Marca</h4>
      </div>
      <div class="modal-body">
          <form id="frmMarcaU">
                <input type="text" hidden="" id="idmarca"  name="idmarca" >
                <label> Marca</label>
                <input type="text" id="marcaU" name="marcaU" class="form-control input-sm" >
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnActualizaMarca" class="btn btn-warning" data-dismiss="modal">Guardar</button>

      </div>
    </div>
  </div>
</div>

   </body>
 </html>
    <script type="text/javascript"> // agregar la marca 

        $(document).ready(function(){

          $('#tablaMarcasLoad').load("marcas/tablaMarcas.php");

          $('#btnAgregaMarca').click(function(){

            vacios=validarFormVacio('frmMarcas');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;

                }

                datos=$('#frmMarcas').serialize();
                            $.ajax({
                              type:"POST",
                              data:datos,
                              url:"../procesos/marcas/agregaMarca.php",
                              success:function(r){
                                  alert(r);  // remover luego
                                  if(r=>1){
                                    //limpiar el form-->


                                    $('#tablaMarcasLoad').load("marcas/tablaMarcas.php");
                                    alertify.success("Marca Agregada con Exito!!");

                                    $('frmMarcas')[0].reset();
                                  } else {
                                    alertify.error("No se Pudo agregar Marca!!")
                                  }

                              }
                            });
                        });

                      });
    </script>       <!--hasta aqui agregado-->


    <script type="text/javascript">
    $(document).ready(function(){
      $('#btnActualizaMarca').click(function(){

          datos=$('#frmMarcaU').serialize();
          $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/marcas/actualizaMarca.php",
                success:function(r){
                  if( r == 1 ){
                    $('#tablaMarcasLoad').load("marcas/tablaMarcas.php");
                    alertify.success("Marca Actualizada con Exito!!")

                  } else {
                        alertify.error("Fallo en Actualizar Marca");
                  }

            }
          });
          });

    });    
    
    </script>


    <script type="text/javascript">   // actualizar marca comienza a qui
        function agregaDato(idMarca,marca){
          $('#idmarca').val(idMarca);     
          $('#marcaU').val(marca);   
        } 

        // Eliminacion de Marcas

        function eliminaMarca(idmarca){
          alertify.confirm('Desea Borrar esta Marca?', function(){ 
            $.ajax({
			      type:"POST",
			      data:"idmarca=" + idmarca,
			      url:"../procesos/marcas/eliminarMarca.php",
			      success:function(r){
              alert(r);  // Eliminar despues
              if( r==1 ){
                $('#tablaMarcasLoad').load("marcas/tablaMarcas.php");
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
