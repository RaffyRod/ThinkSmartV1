<?php
      require_once "../../clases/Conexion.php";
      $c= new conectar();
      $conexion=$c->conexion();

?>

<br>
<h4 style="color: #3683bc">Vender un Producto</h4>
<div class="row">
      <div class="col-sm-4">
            <form id="frmVentasProductos" >
                        <label style="color: #6c6c6c">Selecciona el Cliente</label>
                        <select class="form-control input-sm" id="clienteVenta" name="clienteVenta" >
                        <option value="A">Selecciona</option>
                            <?php
                                  $sql="SELECT id_cliente,nombre,apellido 
                                  from clientes";
                                  $result=mysqli_query($conexion,$sql);
                                  while($cliente=mysqli_fetch_row($result)):                            
                            ?>
                           <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]." ".$cliente[2] ?></option>
                                  <?php endwhile; ?>
                            
                        </select>
                        <label style="color: #6c6c6c">Producto</label>
                        <select class="form-control input-sm" id="productoVenta" name="productoVenta" >
                            <option value="A">Selecciona</option>
                                      <?php
				                              $sql="SELECT id_producto,
				                              nombre
				                              from articulos";
				                              $result=mysqli_query($conexion,$sql);

			                    	          while ($producto=mysqli_fetch_row($result)):
				                    	          ?>
					                              <option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
				                              <?php endwhile; ?>
                        </select>
                        <label style="color: #6c6c6c">Descripcion</label>
                        <textarea  readonly="" class="form-control input-sm" id="descripcionV" name="descripcionV" ></textarea>
                        <label style="color: #6c6c6c">Cantidad</label>
                        <input readonly="" type="text" class="form-control input-sm" id="cantidadV" name="cantidadV">
                        <label style="color: #6c6c6c">Precio</label>
                        <input readonly="" type="text" class="form-control input-sm" id="precioV" name="precioV">
                        <p></p>
                        <span class="btn btn-success" id="btnAgregaVenta">Agregar</span>
                        <span class="btn btn-danger" id="btnVaciarVentas">Vaciar Ventas</span>
            </form>
      </div>
      <div class="col-sm-3 ">
		<div id="imgProducto"></div>
	</div>
      <div class="col-sm-4">
		<div id="tablaVentasTempLoad"></div>
	</div>
      </div>

    <!--Funciones-->

      <script type="text/javascript">
                  $('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");

              $().ready(function(){
                  $('#productoVenta').change(function(){
			$.ajax({
				type:"POST",
				data:"idproducto=" + $('#productoVenta').val(),
				url:"../procesos/ventas/llenarFormProducto.php",
				success:function(r){
                              
					dato=jQuery.parseJSON(r);

                    $('#descripcionV').val(dato['descripcion']);
					$('#cantidadV').val(dato['cantidad']);
					$('#precioV').val(dato['precio']);

                              $('#imgProducto').prepend('<img class="img-thumbnail" id="imgp" src="' + dato['ruta'] + '" />');
					
				}
			});
		});

                        //Funciones
                        $('#btnAgregaVenta').click(function(){
			vacios=validarFormVacio('frmVentasProductos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/agregaProductoTemp.php",
				success:function(r){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				}
			});
		});

                        //vaciar Ventas Boton
                        $('#btnVaciarVentas').click(function(){
                        $.ajax({
                        url:"../procesos/ventas/vaciarTemp.php",
                        success:function(r){
                        $('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
                                    }
                              });
                        });

                  }); 
            
       </script>

<script type="text/javascript">
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procesos/ventas/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				alertify.success("El Producto Ha sido Removido!");
			}
		});
	}

      function crearVenta(){
		$.ajax({
			url:"../procesos/ventas/crearVenta.php",
			success:function(r){
				if(r > 0){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Venta creada con exito, consulte la informacion de esta en ventas hechas!");
				}else if(r==0){
					alertify.alert("No hay lista de venta!!");
				}else{
					alertify.error("No se pudo crear la venta");
				}
			}
		});
	}
      </script>

<script type="text/javascript">
$(document).ready(function(){
  $('#clienteVenta').select2();
  $('#productoVenta').select2();

});
</script>
