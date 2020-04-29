<?php
      require_once "../../clases/Conexion.php";

      $obj = new conectar();
      $conexion= $obj->conexion();

      $sql="SELECT  id_cliente,
                    nombre,
                   apellido,
                   direccion,
                   email,
                   telefono,
                   rfc,
                   cedula
              from clientes";

              $result=mysqli_query($conexion,$sql);


?>


<div class="table-responsive">
  <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption> <label>Clientes</label> </caption>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th colspan="2">Direccion</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>RNC</th>
            <th>Cedula</th><!--Agregar este campo a la Table clientes-->
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        <?php while($ver=mysqli_fetch_row($result)): ?>

        <tr>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td colspan="2"><?php echo $ver[3]; ?></td>
            <td><?php echo $ver[4]; ?></td>
            <td><?php echo $ver[5]; ?></td>
            <td><?php echo $ver[6]; ?></td>
            <td><?php echo $ver[7]; ?></td>
            <td>
              <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalClientesUpdate"
              onclick="agregaDatosCliente('<?php echo $ver[0]; ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
              </span>
            </td>
            <td>
                <span  class="btn btn-danger btn-sm">
                   <span class="glyphicon glyphicon-remove"></span>
                 </span>
            </td>
        </tr>
        <?php endwhile; ?>
  </table>
</div>
