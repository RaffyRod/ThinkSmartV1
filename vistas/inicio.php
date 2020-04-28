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

           <!--Inicio carouser-->
   <div id="carousel-example-generic" class="carousel slide mt-10" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="..." alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="..." alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

          <!--Fin carouser-->

   </body>
 </html>
 <?php
      }else {
          header("location:../index.php");
}

  ?>
