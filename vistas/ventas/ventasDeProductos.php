<br>
<h4 style="color: #3683bc">Vender un Producto</h4>
<div class="row">
      <div class="col-sm-4">
            <form id="frmVentasProductos" >
                        <label style="color: #6c6c6c">Selecciona el Cliente</label>
                        <select class="form-control input-sm" id="clienteVenta" name="clienteVenta" >
                            <option value="A">Selecciona</option>
                        </select>
                        <label style="color: #6c6c6c">Producto</label>
                        <select class="form-control input-sm" id="productoVenta" name="productoVenta" >
                            <option value="A">Selecciona</option>
                        </select>
                        <label style="color: #6c6c6c">Descripcion</label>
                        <textarea class="form-control input-sm" id="" name="name" ></textarea>
                        <label style="color: #6c6c6c">Cantidad</label>
                        <input type="text" class="form-control input-sm" id="" name="" >
                        <label style="color: #6c6c6c">Precio</label>
                        <input type="text" class="form-control input-sm" id="" name="" >
                        <p></p>
                        <span class="btn btn-success" id="btnAgregarVenta">Agregar</span>

            </form>
      </div>

</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#clienteVenta').select2();
  $('#productoVenta').select2();

});
</script>
