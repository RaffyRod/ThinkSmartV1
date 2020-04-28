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

     <title>Clientes</title>
     <?php require_once "menu.php"; ?>
   </head>
   <body>
     <div class="container" style="padding-top: 40px;">
       <h1 style="color: #3683bc">Clientes</h1>
       <br><br>
           <div class="row">
               <div class="col-sm-3">
                <form id="frmClientes" >

                  <label style="color: #6c6c6c">Nombre</label>
                  <input type="text" class="form-control input-sm" id="nombre" name="nombre" >
                  <label style="color: #6c6c6c">Apellido</label>
                  <input type="text" class="form-control input-sm" id="apellido" name="apellido" >
                  <label style="color: #6c6c6c">Direccion</label>
                  <input type="text" class="form-control input-sm" id="direccion" name="direccion" >
                  <label style="color: #6c6c6c">Email</label>
                  <input type="email" class="form-control input-sm" id="email" name="email" >
                  <label style="color: #6c6c6c">Telefono</label>
                  <input type="tel" class="form-control input-sm" id="telefono" name="telefono" >
                  <label style="color: #6c6c6c">RFC</label>
                  <input type="number" class="form-control input-sm" id="rfc" name="rfc" >
                  <label style="color: #6c6c6c">Cedula</label>
                  <input type="number" class="form-control input-sm" id="cedula" name="cedula" >
                  <p></p>
                  <span class="btn btn-success"  id="btnAgregarCliente">Agregar</span>

                </form>

               </div><!--col1-->

               <div class="col-sm-9">
                     <div id="tablaClientesLoad"></div>

               </div><!--colsm8-->

           </div><!--row-->

     </div><!--articulos-->

   </body>
 </html>
 <script type="text/javascript">

     $(document).ready(function(){

       $('#tablaClientesLoad').load("clientes/tablaClientes.php");

       $('#btnAgregarCliente').click(function(){

         vacios=validarFormVacio('frmClientes');
             if (vacios > 0) {
                 alertify.alert("Debes llenar todos los campos!!");
                 return false;
             }


         datos=$('#frmClientes').serialize();
         console.log(datos);
         $.ajax({
           type:"POST",
           data:datos,
           url:"../procesos/clientes/agregaCLiente.php",
           success:function(r){
                alert(r); //aliminar tras programar
               if(r==1){
                   $('#tablaClientesLoad').load("clientes/tablaClientes.php");
                 alertify.success("Cliente Agregado con Exito!!");
               } else {
                 alertify.error("No se Pudo agregar Cliente !!")
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
