<?php
        session_start();

        session_destroy(); /**elimina la sesion iniciada**/

    header ("location:../index.php"); /**redirige al inicio**/
    ?>
