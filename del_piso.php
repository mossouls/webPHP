<?php

    session_start();

    include("php_extra/connect.php");

    include("php_extra/array_piso.php");

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
        
        <div align="right">
            
            <a href="logout.php"><button>Logout</button></a>
        
        </div>    
    
    </section>

    <section>

        <div class="logo">
            
            <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
        
        </div>

    </section>

    <h1>Selecciona el piso que deseas eliminar</h1>

        <?php

            if (isset($_SESSION["admin"])) {

                $pisos="select * from pisos";
                $pisos_exe=mysqli_query($conexion,$pisos);
                $lineas_pisos=mysqli_num_rows($pisos_exe);

                for ($i=0; $i < $lineas_pisos; $i++) { 

                    $array_pisos=mysqli_fetch_array($pisos_exe);

                    print "<form action='del_piso_exe.php'>";

                    print "<div class='piso_list'>";

                    print "<div><b>Código</b> ".$cod[$i]."</div>";

                    print "<div><img src='uploaded/piso/".$imagen[$i]."'></div>";

                    print "<div><b>Calle</b> ".$calle[$i]."</div>";

                    print "<div><b>Número</b> ".$numero[$i]."</div>";

                    print "<div><b>Planta</b> ".$planta[$i]."</div>";

                    print "<div><b>Puerta</b> ".$puerta[$i]."</div>";

                    print "<div><b>Código Postal</b> ".$cp[$i]."</div>";

                    print "<div><b>Dimensión (m2)</b> ".$metros[$i]."</div>";

                    print "<div><b>Zona</b> ".$zona[$i]."</div>";

                    print "<div><b>Precio</b> ".$precio[$i]." €</div>";
                    
                    print "<div><b>Propietario</b> ".$nom_propietario[$i]."</div>";

                    if ($estado[$i]==0) {

                        print "<div><b>Estado</b> Disponible</div>";

                    }else{

                        print "<div><b>Estado</b> Vendido</div>";

                    }
                    //ponemos un input hidden para pasar en $request 
                    //el codigo del piso seleccionado
                    print "<input type=hidden name='cod' value='".$cod[$i]."'";

                    print "<div><input type='submit' value='Eliminar'</div>";

                    print "</div>";

                    print "</form>";

                }
            }
        
            //los vendedores sólo pueden eliminar 
            //los pisos de los que son propietarios

            if (isset($_SESSION["vendedor"])) {

                $pisos="select * from pisos where usuario_id = ".$_SESSION["codigo_usuario"];

                $pisos_exe=mysqli_query($conexion,$pisos);

                $lineas_pisos=mysqli_num_rows($pisos_exe);

                if ($lineas_pisos==0) {

                    print "<div class='msg'>No tienes ningún piso a la venta</div>";

                }else{

                    for ($i=0; $i < $lineas_pisos; $i++) { 

                        $array_pisos=mysqli_fetch_array($pisos_exe);
    
                        print "<form action='del_piso_exe.php'>";

                        print "<div class='piso_list'>";

                        print "<div><img src='uploaded/".$imagen[$i]."'></div>";

                        print "<div><b>Calle</b> ".$calle[$i]."</div>";

                        print "<div><b>Número</b> ".$numero[$i]."</div>";

                        print "<div><b>Planta</b> ".$planta[$i]."</div>";

                        print "<div><b>Puerta</b> ".$puerta[$i]."</div>";

                        print "<div><b>Código Postal</b> ".$cp[$i]."</div>";

                        print "<div><b>Dimensión (m2)</b> ".$metros[$i]."</div>";

                        print "<div><b>Zona</b> ".$zona[$i]."</div>";

                        print "<div><b>Precio</b> ".$precio[$i]." €</div>";

                        print "<div><b>Propietario</b> ".$nom_propietario[$i]."</div>";
    
                        if ($estado[$i]==0) {
    
                            print "<div><b>Estado</b> Disponible</div>";
    
                        }else{
    
                            print "<div><b>Estado</b> Vendido</div>";
    
                        }
    
                        print "<input type=hidden name='cod' value='".$cod[$i]."'";

                        print "<div><input type='submit' value='Eliminar'</div>";

                        print "</div>";

                        print "</form>";

                    }

                }
            }

            ?>

    </form>

</body>
</html>