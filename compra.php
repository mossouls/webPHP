<?php

    session_start();

    include("php_extra/connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar piso</title>
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

        <section>

            <div class='muestra'>
                
            <?php

                $cod=$_REQUEST["cod"];

                $query="select * from pisos where codigo_piso = $cod";

                $consulta=mysqli_query($conexion,$query);

                $lineas=mysqli_num_rows($consulta);

                for ($i=0; $i < $lineas; $i++) {

                    $array_pisos=mysqli_fetch_array($consulta);
                    
                    print "<form action='compra.php'>";

                    print "<input type='hidden' name='cod' value='" . $array_pisos["codigo_piso"] . "'/>";
                    
                    print "<div><img src='uploaded/piso/".$array_pisos["imagen"]."'></div>";

                    print "<div><b>Calle </b>".$array_pisos["calle"]."</div>";

                    print "<div><b>Numero </b>".$array_pisos["numero"]."</div>";

                    print "<div><b>Planta </b>".$array_pisos["planta"]."</div>";

                    print "<div><b>Puerta </b>".$array_pisos["puerta"]."</div>";

                    print "<div><b>Código Postal </b>".$array_pisos["cp"]."</div>";

                    print "<div><b>Dimensiones (metros) </b>".$array_pisos["metros"]."</div>";

                    print "<div><b>Zona </b>".$array_pisos["zona"]."</div>";

                    print "<div><b>Precio </b>".$array_pisos["precio"]."€</div>";

                    $propietario=mysqli_fetch_array(mysqli_query($conexion,"select nombre from usuarios where usuario_id in (select usuario_id from pisos where usuario_id='".$array_pisos['usuario_id']."')"));

                    print "<div><b>Vendedor </b>".$propietario["nombre"]."</div>";

                    print "<button name='comprar'>Comprar Inmueble</button> ";
                    
                    print "</form>";

                }

            ?>

                <a href="principal.php"><button>Volver</button></a>

            </div>

        </section>
        
        <?php

            if (isset($_REQUEST["comprar"])) {

                print_r($_REQUEST);

                $cod=$_REQUEST["cod"];

                $compra="update pisos set usuario_id =".$_SESSION["codigo_usuario"]." where codigo_piso = $cod";

                $compra_exec=mysqli_query($conexion,$compra);

                if ($compra_exec) {

                    print "<div class='msg'>Compra realizada correctamente</div>";

                }else{

                    print "<div class='msg'>Algo ha fallado. Compra no realizada.</div>";

                }

            }

            mysqli_close($conexion);

        ?>

</body>
</html>