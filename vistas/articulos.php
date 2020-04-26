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

     <title>Articulos</title>
     <?php require_once "menu.php"; ?>
     <?php require_once "../clases/Conexion.php";
            $c= new conectar();
            $conexion=$c->conexion();
            $sql = "SELECT id_categoria,nombreCategoria from categorias";           
            $result= mysqli_query($conexion,$sql);

     ?>
   </head>
   <body>
        <div class="container" style="padding-top: 40px;">
          <h1 style="color: #3683bc">Art&iacuteculos y Productos</h1>
          <br>
          <br>
              <div class="row">
                  <div class="col-sm-4">
                        <form id="frmArticulos"  enctype="multipart/form-data">

                          <label style="color: #6c6c6c">Categoria</label>
                           <select class="form-control input-sm"  id="categoriaSelect" name="categoriaSelect" >
                             <option value="A">Selecciona Categoria</option>
                             <?php 
                                 $sql = "SELECT id_categoria,nombreCategoria from categorias";           
                                 $result= mysqli_query($conexion,$sql);
                             
                             ?>
                             <?php while ($ver=mysqli_fetch_row($result)) :?>
                               <option value="<?php echo $ver[0] ?>"> <?php  echo $ver[1]; ?></option>
                             <?php endwhile; ?>

                          </select>
                          <label style="color: #6c6c6c">Nombre</label>
                          <input type="text" class="form-control input-sm"  id="nombre" name="nombre">
                          <label style="color: #6c6c6c">Descripcion</label>
                          <input type="text" class="form-control input-sm"  id="descripcion" name="descripcion">

                          <label style="color: #6c6c6c">Cantidad</label>
                          <input type="text" class="form-control input-sm"  id="cantidad" name="cantidad">

                          <label style="color: #6c6c6c">Precio</label>
                          <input type="text" class="form-control input-sm"  id="precio" name="precio">
                          <label style="color: #6c6c6c">Imagen</label>
                          <input type="file"   id="imagen" name="imagen" >
                          <p></p>
                          <span id="btnAgregaArticulo"  class="btn btn-success">Agregar</span>                     
                         
                        </form>
                  </div><!--col1-->

                  <div class="col-sm-8">
                        <div id="tablaArticulosLoad"></div>

                  </div><!--colsm8-->

              </div><!--row-->

        </div><!--articulos-->
        <!-- Button trigger modal -->
<!-- Modal -->

            <div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
                  </div>
                  <div class="modal-body">
                    <form id="frmArticulosU"  enctype="multipart/form-data">

                          <input type="text" id="" hidden="idArticulo" name="idArticulo">

                      <label style="color: #6c6c6c">Categoria</label>
                       <select class="form-control input-sm"  id="categoriaSelectU" name="categoriaSelectU" >
                         <option value="A">Selecciona Categoria</option>
                         <?php  
                             $sql = "SELECT id_categoria,nombreCategoria from categorias";           
                             $result= mysqli_query($conexion,$sql);                        
                         
                         ?>
                         <?php while ($ver=mysqli_fetch_row($result)) :?>
                           <option value="<?php echo $ver[0] ?>"><?php  
                            echo $ver[1]; ?></option>
                         <?php endwhile; ?>
                      </select>
                      <label style="color: #6c6c6c">Nombre</label>
                      <input type="text" class="form-control input-sm"  id="nombreU" name="nombreU">
                      <label style="color: #6c6c6c">Descripcion</label>
                      <input type="text" class="form-control input-sm"  id="descripcionU" name="descripcionU">

                      <label style="color: #6c6c6c">Cantidad</label>
                      <input type="text" class="form-control input-sm"  id="cantidadU" name="cantidadU">

                      <label style="color: #6c6c6c">Precio</label>
                      <input type="text" class="form-control input-sm"  id="precioU" name="precioU">
                      <!--<label style="color: #6c6c6c">Imagen</label>-->
                      <!--<input type="file"   id="imagen" name="imagen" > -->
                      <p></p>                                           

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button id="btnActualizaArticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

                  </div>
                  </div>
                </div>
              </div>
   </body>
 </html>

        <script type="text/javascript">
                

                function agregaDatosArticulo(idarticulo){
                  $.ajax({
			              type:"POST",
			              data:"idart=" + idarticulo,
			              url:"../procesos/articulos/obtenDatosArticulo.php",
			              success:function(r){
                     
                      //alert(r);                      
                        dato=jQuery.parseJSON(r);
                        $('#idArticulo').val(dato['id_producto']);
                        $('#categoriaSelectU').val(dato['id_categoria']);
                        $('#nombreU').val(dato['nombre']);
                        $('#descripcionU').val(dato['descripcion']);
                        $('#cantidadU').val(dato['cantidad']);
                        $('#precioU').val(dato['precio']);             
                       

		                          	}
	                        	});                  
                       }
                       //Eliminar Articulo

                       function eliminaArticulo(idArticulo){
                       alertify.confirm('Seguro que desea Eliminar este Articulo?', function(){
                      $.ajax({
                        type:"POST",
                        data:"idarticulo=" + idArticulo,
                        url:"../procesos/articulos/eliminarArticulo.php",
                        success:function(r){
                              if (r==1) {
                                $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                                alertify.success("Eliminado con Exito!!");
                              }else {
                                  alertify.error("No se pudo Eliminar Articulo!!");
                              }
                        }                });
              }, function(){ alertify.error('Se Cancelo Operacion')
             });
            }                
        </script>

        <!--Actualizar-->

        <script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaarticulo').click(function(){

				datos=$('#frmArticulosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/articulos/actualizaArticulos.php",
					success:function(r){
            console.log(r);
						if(r=>1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("Error al actualizar :(");
						}
					}
				});
			});
		});
	</script>
        <!--fin de actualizacion-->
                

  <script type="text/javascript">
      $(document).ready(function(){
          $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

          $('#btnAgregaArticulo').click(function(){

            vacios=validarFormVacio('frmArticulos');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }
                let frmArticulos = document.getElementById("frmArticulos");

                console.log(frmArticulos)

                var formData = new FormData(frmArticulos);

                  $.ajax({
                    url: "../procesos/articulos/insertaArticulos.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success:function(r){
                    alert(r);

                      if(r => 1){      ///debia ser r==1, pero r me daba mas de 1///
                        $('#frmArticulos')[0].reset();
                        $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                        alertify.success("Agregado con exito :D");
                      }else{
                        alertify.error("Fallo al subir el archivo :(");
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
