<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar pisos</title>
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
    <section>
    <?php
        require("php_extra/connect.php");
        if (isset($_REQUEST["findcod"])) {
            $cod=$_REQUEST["cod"];
            $consulta=mysqli_query($conexion,"select * from pisos where codigo_piso=$cod");
            
        }

        if (isset($_REQUEST["findcalle"])) {
            $calle=trim(strip_tags($_REQUEST["calle"]));
            $consulta=mysqli_query($conexion,"select * from pisos where calle like '$calle'");
            
        }

        if (isset($_REQUEST["findcp"])) {
            $cp=trim(strip_tags($_REQUEST["cp"]));
            $consulta=mysqli_query($conexion,"select * from pisos where cp = $cp");
            
        }

        if (isset($_REQUEST["findmetros"])) {
            $metros=$_REQUEST["metros"];
            $consulta=mysqli_query($conexion,"select * from pisos where metros = $metros");
            
        }

        if (isset($_REQUEST["findzona"])) {
            $zona=trim(strip_tags($_REQUEST["zona"]));
            $consulta=mysqli_query($conexion,"select * from pisos where metros = $metros");
            
        }

        if (isset($_REQUEST["findprecio"])) {
            $precio=$_REQUEST["precio"];
            $consulta=mysqli_query($conexion,"select * from pisos where precio = $metros");
            
        }

        if (isset($_REQUEST["findprop"])) {
            $prop=trim(strip_tags($_REQUEST["prop"]));
            $consulta=mysqli_query($conexion,"select * from pisos where usuario_id = (select usuario_id from usuarios where nombre like '$prop')");
            
        }

        if (isset($_REQUEST["find_disp"])) {
            $consulta=mysqli_query($conexion,"select * from pisos where vendido = 0");
            
        }

        if (isset($_REQUEST["find_vend"])) {
            $consulta=mysqli_query($conexion,"select * from pisos where vendido = 1");
            
        }

        $existe=mysqli_num_rows($consulta);
            if ($existe==0) {
                print "<div class='msg'>No existe ningún piso coincidente</div>";
            }else{
                for ($i=0; $i < $existe; $i++) { 
                    print "<div align='center' style='background-color:white; padding:2em; margin-top:2em;margin-bottom:2em; width:fit-content;border-radius:10px;margin:auto;margin-top:1em;'>";
                    $datos=mysqli_fetch_array($consulta);
                    
                        print "<div><img style='border-radius:10px;margin-bottom:1em;' width='500px' src='uploaded/piso/".$datos["imagen"]."'</div>";
                        print "<div><b>Calle</b> ". $datos["calle"] ."</div>";
                        print "<div><b>Número</b> ". $datos["numero"] ."</div>";
                        print "<div><b>Planta</b> ". $datos["planta"] ."</div>";
                        print "<div><b>Puerta</b> ". $datos["puerta"] ."</div>";
                        print "<div><b>Código Postal</b> ". $datos["cp"] ."</div>";
                        print "<div><b>Dimensiones</b> ". $datos["metros"] ."</div>";
                        print "<div><b>Zona</b> ". $datos["zona"] ."</div>";
                        print "<div><b>Precio</b> ". $datos["precio"] ."</div>";
                        $propietarios=mysqli_query($conexion,"select nombre from usuarios where usuario_id = (select usuario_id from pisos where codigo_piso =$cod)");
                        $datos_prop=mysqli_fetch_array($propietarios);
                        if ($datos["vendido"]==0) {
                            print "<div><b>Precio</b> Disponible</div>";
                        }else{
                            print "<div><b>Precio</b> Vendido</div>";
                        }
                        print "<hr style='border:solid black 0.2em; colour:black;'>";
                    print "</div>";
                    
                }
        }
    ?>
</body>
</html>
