<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotopiso</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="scripts/carrusel.js"></script>
</head>
<body>

    <section>

        <div class="logo">

            <img src="img/fotopiso_logo.png" width="200px" height="77.97">

        </div>

        <div id="menu">

            <a href="list_piso.php" class="no_fmt_link"><div class="menu_elem">Pisos en venta</div></a>
            <a href="login.php" class="no_fmt_link"><div class="menu_elem">Iniciar sesión</div></a>

        </div>

    </section>

    <section class='sec1'>
        <h1>Encuentra tu lugar en la ciudad</h1>
        <!-- carrusel de imagenes. Fuente: www.w3cschools.com -->
        
        <div class="gallery-wrapper"> <!-- contenedor de carrusel -->
            <div class="gallery-scroll">
                <div class="gallery">

                    <?php
                        // extraer imagenes
                        include("php_extra/connect.php");
                        $consulta=mysqli_query($conexion,"select imagen,calle,numero from pisos");
                        $lineas=mysqli_num_rows($consulta);

                        for ($i=0; $i < 6; $i++) { 

                            $array=mysqli_fetch_array($consulta);
                            // imagenes con calle y numero
                            print "<div class='item'>";
                            print "<img src='uploaded/piso/".$array["imagen"]."' alt='".$array["calle"].", ".$array["numero"]."'/>";
                            print "</div>";

                            $fotos[$i]=$array["imagen"];

                        }

                    ?>

                </div>
            </div>
        </div>
        <div align='center'><a href="registro.php"><button class='btn2'>Regístrate</button></a></div>
    </section>

</body>
</html>