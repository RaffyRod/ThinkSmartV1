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

     <title>Proceso de Ventas</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
      <div class="container" style="padding-top: 40px;">
          <h1 style="color: #3683bc">Venta de Productos</h1>
          <br>
            <div class="row">
                <div class="col-sn-12">
                                  <span class="btn btn-success" id="ventaProductosBtn">Vender Productos</span>
                                  <span class="btn btn-warning" id="ventasHechasBtn">Ventas Hechas</span>
              </div>
            </div>
            <div class="row">
                  <div class="col-sm-12">
                        <div id="ventaProductos"></div>
                        <div id="ventasHechas"></div>



                  </div>
            </div>

      </div> <!--container-->

   </body>
 </html>
    <script type="text/javascript">
        $(document).ready(function(){
          $('#ventaProductosBtn').click(function(){
            esconderSeccionVenta();
              $('#ventaProductos').load('ventas/ventasDeProductos.php');
              $('#ventaProductos').show();
          });
          $('#ventasHechasBtn').click(function(){
            esconderSeccionVenta();
              $('#ventasHechas').load('ventas/ventasyReportes.php');
              $('#ventasHechas').show();

          });
        });
            function esconderSeccionVenta() {
                $('#ventaProductos').hide();
                $('#ventasHechas').hide();
         }

    </script>
 <?php
      }else {
          header("location:../index.php");
}

  ?>
