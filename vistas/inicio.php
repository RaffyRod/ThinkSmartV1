<?php
    session_start();

      if (isset($_SESSION['usuario'])) {
           // echo $_SESSION['usuario'];//

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     
     <title>Inicio</title>
     <?php require_once "menu.php"; ?>
     
   </head>
   <body>
              <section class="container2">
              <div class="wave"></div>
              </section>
          

   </body>
 </html>
 <?php
      }else {
          header("location:../index.php");
}

  ?>
