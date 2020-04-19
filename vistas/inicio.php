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

   </body>
 </html>
 <?php
      }else {
          header("location:../index.php");
}

  ?>
