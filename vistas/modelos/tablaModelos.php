<?php
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_modelo,nombre
					FROM modelos";
			$result=mysqli_query($conexion,$sql);	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
  <caption> <label>Modelos</label>  </caption>
  
    <tr>
        <td>Modelo</td>  
         <td>Editar</td>
        <td>Borrar</td>
    </tr>
    
    <?php
				while ($ver=mysqli_fetch_row($result)):
						?>
    <tr>
        
          <td><?php echo $ver[1]?></td>
            
        <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaModelo"
					 onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">

                  <span class="glyphicon glyphicon-pencil"></span>
              </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaModelo('<?php echo $ver[0] ?>')">
                    <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
