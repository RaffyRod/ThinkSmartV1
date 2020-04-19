<?php
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_marca,nombre
					FROM marcas";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
  <caption> <label>Marcas</label>  </caption>
    <tr>
      <td>Marca</td>
      <td>Editar</td>
      <td>Borrar</td>

    </tr>

    <?php
    while ($ver=mysqli_fetch_row($result)):
        ?>

    <tr>
        <td><?php echo $ver[1]?></td>
        <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaMarca"
					 onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">

                  <span class="glyphicon glyphicon-pencil"></span>
              </span>


        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaMarca('<?php echo $ver[0] ?>')">
                    <span class="glyphicon glyphicon-remove"></span>

            </span>


        </td>
    </tr>
    <?php endwhile; ?>
</table>
