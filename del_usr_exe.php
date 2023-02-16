<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar cuenta</title>
    <link rel="stylesheet" href="css/css.css">

</head>

<body>

    <div align="right">
            <a href="logout.php"><button>Logout</button></a>
        </div>    
    </section>

    <section>
        <div class="logo">
            <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
        </div>
    </section>

    <?php
    require("php_extra/connect.php");

    if(isset($_REQUEST["del_usr"])){

        $cod=$_REQUEST["id"];

        $existe_usr=mysqli_num_rows(mysqli_query($conexion,"select * from usuarios where usuario_id=$cod"));

        if($existe_usr==0){

            echo "<div class='msg'>No existe ningún usuario asociado a ese código</div>";

        }else{

            $consulta=mysqli_query($conexion,"delete from pisos where usuario_id=$cod");

            $consulta2=mysqli_query($conexion,"delete from usuarios where usuario_id=$cod");

            if($consulta && $consulta2){

                echo "<div class='msg'>Usuario eliminado</div>";

            }

        }
    }

    if(isset($_REQUEST["del_prof"])){
        $consulta=mysqli_query($conexion,"delete from usuarios where usuario_id=".$_SESSION["codigo_usuario"]);

        $consulta2=mysqli_query($conexion,"delete from usuarios where usuario_id=".$_SESSION["codigo_usuario"]);
        
        if($consulta && $consulta2){

            session_unset();

            session_destroy();

            echo "<div class='msg'>Usuario eliminado</div>";

            header( "refresh:3; url=index.php" ); 
            
        }
    }
    ?>
</body>
</html>