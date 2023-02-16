<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisos en venta</title>
    <link rel="stylesheet" href="css/css.css">

</head>
<body>
        
<?php

    if (!empty($_SESSION)) {
        print "<section>";
            print "<div align='right'>";
            print "<a href='logout.php'></a><button>Logout</button></a>";
            print "</div>";
        print "</section>";
    }

?>
        <section>

            <div class="logo">
                
                <?php
                    //si no hay una sesión iniciada
                    //solo se muestran los pisos en venta
                    
                    if(empty($_SESSION)){
                    
                        print "<a href='index.php'><img src='img/fotopiso_logo.png' width='200px' height='77.97'></a>";
                    
                    }else{
                    
                        print "<a href='principal.php'><img src='img/fotopiso_logo.png' width='200px' height='77.97'></a>";
                    
                    }
                
                ?>
            </div>
        </section>
        <section>
            <h1>Lista de pisos en venta</h1>
            
            <?php
                require("php_extra/connect.php");
               
                $consulta=mysqli_query($conexion,"select * from pisos");
                
                $lineas_pisos=mysqli_num_rows($consulta);

                for ($i=0; $i < $lineas_pisos; $i++) {

                    $datos=mysqli_fetch_array($consulta);
                    
                    print "<div class='piso_list'>";

                    //el administrador puede mostrar pisos comprados
                    //y vendidos de todos los propietarios
                    if (isset($_SESSION["admin"])) {
                        print "<div><b>Código</b> ".$datos["codigo_piso"]."</div>";
                    }

                    print "<div><img src='uploaded/piso/".$datos["imagen"]."'></div>";
                    print "<div><b>Calle</b> ".$datos["calle"]."</div>";
                    print "<div><b>Número</b> ".$datos["numero"]."</div>";
                    print "<div><b>Planta</b> ".$datos["planta"]."</div>";
                    print "<div><b>Puerta</b> ".$datos["puerta"]."</div>";
                    print "<div><b>Código Postal</b> ".$datos["cp"]."</div>";
                    print "<div><b>Dimensión (m2)</b> ".$datos["metros"]."</div>";
                    print "<div><b>Zona</b> ".$datos["zona"]."</div>";
                    print "<div><b>Precio</b> ".$datos["precio"]." €</div>";

                    //para que no aparezca el ID del propietario, sino su nombre
                    $query_prop="select nombre from usuarios where usuario_id = (select usuario_id from pisos where codigo_piso = ". $datos["codigo_piso"] . ")";
                    $consulta_prop=mysqli_query($conexion,$query_prop);
                    $propietario=mysqli_fetch_array($consulta_prop);

                    print "<div><b>Propietario</b> ".$propietario["nombre"]."</div>";

                    if ($datos["vendido"]==0) {
                        print "<div><b>Estado</b> Disponible</div>";
                    }else{
                        print "<div><b>Estado</b> Vendido</div>";
                    }
                    
                        if (isset($_SESSION["comprador"])) {
                            //el comprador puede mostrar pisos propios
                            //y pisos en venta
                            
                            if ($datos["vendido"]==0) {

                                print "<form action='compra.php'>";
                                    
                                    print "<div><button class='compra_btn' name='compra'>Comprar</button></div>";
                                    
                                    print "<div><input type='hidden' name='cod' value='". $datos["codigo_piso"] ."'></div>";
                                
                                print "</form>"; 

                            }
                        }
                    
                    print "</div>";
                        
                    }
                
            ?>
        </section>
</body>
</html>