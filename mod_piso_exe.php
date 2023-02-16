<?php
    session_start();

    require("php_extra/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
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

        <?php

                $cod=$_REQUEST["cod"];
                $calle=trim(strip_tags($_REQUEST["calle"]));
                $num=$_REQUEST["num"];
                $zona=trim(strip_tags($_REQUEST["zona"]));
                $cp=$_REQUEST["cp"];
                $prop=trim(strip_tags($_REQUEST["prop"]));
                $upl=false;

                if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
                    $filepath="C:/AppServ/www/inmo/upload/";
                    $filename=$_FILES["imagen"]["name"];
                    $upl=true;
                    
                    $completo=$filepath.$filename;
                    if (is_file($completo)) {
                        $uni=time();
                        $filename=$uni."-".$filename;
                    }
                }

                if($upl){
                    move_uploaded_file($_FILES["imagen"]["tmp_name"],$completo);
                    mysqli_query($conexion,"update pisos set imagen='$filename' where codigo_piso=$cod");
                    print "<div class='msg'>Imagen Modificada</div>";
                }

            if (!empty($cod)) {
                if (!empty($calle)) {
                    mysqli_query($conexion,"update pisos set calle='$calle' where codigo_piso=$cod");
                    print "<div class='msg'>Calle Modificada</div>";
                }

                if (!empty($num)) {
                    mysqli_query($conexion,"update pisos set numero='$num' where codigo_piso=$cod");
                    print "<div class='msg'>Número Modificada</div>";
                }

                if (!empty($zona)) {
                    mysqli_query($conexion,"update pisos set zona='$zona' where codigo_piso=$cod");
                    print "<div class='msg'>Zona Modificada</div>";
                }

                if (!empty($cp)) {
                    mysqli_query($conexion,"update pisos set cp='$cp' where codigo_piso=$cod");
                    print "<div class='msg'>Código Postal Modificado</div>";
                }

                if (!empty($prop)) {
                    $usu_query="select usuario_id from usuarios where nombre like '$prop'";
                    $usu_consulta=mysqli_query($conexion,$usu_query);
                    $datos_usu=mysqli_fetch_array($usu_consulta);
                    mysqli_query($conexion,"update pisos set usuario_id=".$datos_usu["usuario_id"]." where codigo_piso=$cod");
                    print "<div class='msg'>Propietario modificado</div>";
                }

            }else{

                print "<div class='msg'>No has introducido un código de piso</div>";
            
            }

        ?>
</body>
</html>