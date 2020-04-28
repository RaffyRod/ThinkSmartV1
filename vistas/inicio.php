<?php
    session_start();

      if (isset($_SESSION['usuario'])) {
           // echo $_SESSION['usuario'];//

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     
     <title>Inicio</title>
     
   </head>
   <body>
     <?php require_once "menu.php"; ?>
            
        <div style="background-image: linear-gradient(135deg, #ffffff12, #ffffff61), url(../img/back.png);
    width: 80%;
    margin: 0 auto;
    height: 60vh;
    background-size: contain;
    background-position: right;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;">
          <h2 style="width: 50%; font-size:135px;">Bienvenido sea!</h2>
        </div>
   </body>
 </html>
 <?php
      }else {
          header("location:../index.php");
}

  ?>
