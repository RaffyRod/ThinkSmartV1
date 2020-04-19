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

     <title>Categorias</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
          <div class="container" style="padding-top: 40px;">
            <h1 style="color: #3683bc">Categorias</h1>
              <div class="row">
                  <div class="col-sm-4">
                        <form id="frmCategorias">
	                        <br>
                            <label style="color: #6c6c6c"><bold>Categoria</bold></label>
                                <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                                   <p></p>
                                   <span class="btn btn-success" id="btnAgregaCategoria">Agregar</span>
                                    </form>
                  </div>
                  <div class="col-sm-6">
                        <div id="tablaCategoriaLoad"></div>
                  </div>
              </div><!--row-->
          </div> <!--container-->

          <!--actualizar cat-->

          <!-- Button trigger modal -->


</button>

<!-- Modal -->
<div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Categorias</h4>
      </div>
      <div class="modal-body">
          <form id="frmCategoriaU">
                <input type="text" hidden="" id="idcategoria"  name="idcategoria" >
                <label> Categoria</label>
                <input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm" >
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>

      </div>
    </div>
  </div>
</div>

   </body>
 </html>
    <script type="text/javascript">

        $(document).ready(function(){

          $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

          $('#btnAgregaCategoria').click(function(){

            vacios=validarFormVacio('frmCategorias');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;

                }


            datos=$('#frmCategorias').serialize();
            $.ajax({
              type:"POST",
              data:datos,
              url:"../procesos/categorias/agregaCategoria.php",
              success:function(r){
                  if(r=>1){
                    //limpiar el form-->

                    $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

                    alertify.success("Categoria Agregada con Exito!!");
                    $('frmCategorias')[0].reset();
                  } else {
                    alertify.error("No se Pudo agregar Categoria!!")
                  }

              }
            });
        });

      });

    </script>

        <script type="text/javascript">

        $(document).ready(function(){
          $('#btnActualizaCategoria').click(function(){

            datos=$('#frmCategoriaU').serialize();
            $.ajax({
              type:"POST",
              data:datos,
              url:"../procesos/categorias/actualizaCategoria.php",
              success:function(r){
                $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
                    if (r==1) {
                        alertify.success ("Categoria Actualizada!!");

                    }else {
                            alertify.error("No se Pudo Actualizar la Categoria!");
                    }
              }
            });
          });
        });

        </script>

      <script type="text/javascript">

          function agregaDato(idCategoria,categoria){
            $('#idcategoria').val(idCategoria);
            $('#categoriaU').val(categoria);

          }
            function eliminaCategoria(idcategoria){
              alertify.confirm('Seguro que desea Eliminar esta Categoria?', function(){
                      $.ajax({
                        type:"POST",
                        data:"idcategoria=" + idcategoria,
                        url:"../procesos/categorias/eliminarCategoria.php",
                        success:function(r){
                              if (r==1) {
                                    $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
                                    alertify.success("Eliminado con Exito!!");

                              }else {
                                  alertify.error("No se pudo Eliminar Categoria!!");
                              }

                        }
                });
              }, function(){ alertify.error('Se Cancelo Operacion')
             });

            }

      </script>


 <?php
      }else {
          header("location:../index.php");
}

  ?>
