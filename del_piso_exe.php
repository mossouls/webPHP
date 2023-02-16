<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Piso</title>
    <link rel="stylesheet" href="css/css.css">

</head>

<body>

    <section>

        <div align="right">
            <a href="logout.php"><button>Logout</button></a>
        </div> 

        <div class="logo">
            <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
    
        </div>

    </section>

    <?php

        include("php_extra/connect.php");

        $eliminar_cod=$_REQUEST["cod"];
        $delete=mysqli_query($conexion,"delete from pisos where codigo_piso = $eliminar_cod");
                    
        if ($delete) {
            
            print "<div class='msg'>Piso eliminado correctamente</div>";

        }else{

            print "<div class='msg'>Lo sentimos, se ha producido un error</div>";

        }

        mysqli_close($conexion);

    ?>
    
</body>
</html>
