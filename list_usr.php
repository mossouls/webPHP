<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <section>
    <section>
            <div align="right">

                <a href="logout.php"><button>Logout</button></a>

            </div>   

        </section>

        <section>

            <div class="logo">

                <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>

            </div>

        </section>
    </section>
    <?php
    require("php_extra/connect.php");
    $consulta=mysqli_query($conexion,"select * from usuarios");
    $lineas=mysqli_num_rows($consulta);
    for ($i=0; $i < $lineas; $i++) { 
        $array_usr=mysqli_fetch_array($consulta);
                print "<div style='display:inline-block;height:20em;margin-right:1em;' class='usr_list'>";
                print "<div ><b>ID: </b>".$array_usr["usuario_id"]."</div>";
                print "<div><img height='200px' src='uploaded/prof/".$array_usr["imagen"]."'/></div>";
                print "<div><b>Nombre </b>".$array_usr["nombre"]."</div>";
                print "<div><b>Email </b>".$array_usr["correo"]."</div>";
                if ($array_usr["tipo_usuario"]=="admin") {
                    print "<div><b>Tipo </b>Administrador</div>";
                }else{
                    print "<div><b>Tipo </b>".ucfirst($array_usr["tipo_usuario"]) ."</div>";
                }
                print "</div>";
    }
    ?>
</body>
</html>