<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Piso</title>
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

    <section class='sec1'>

        <h1>Buscar Pisos</h1>

        <form action="find_piso.php">

            <div align='center'><button name='find_id' class='mod_btn'>Buscar por ID</button></div>
            <div align='center'><button name='find_calle' class='mod_btn'>Buscar por calle</button></div>
            <div align='center'><button name='find_cp' class='mod_btn'>Buscar por Código Postal</button></div>
            <div align='center'><button name='find_metros' class='mod_btn'>Buscar por dimensiones</button></div>
            <div align='center'><button name='find_zona' class='mod_btn'>Buscar por zona</button></div>
            <div align='center'><button name='find_precio' class='mod_btn'>Buscar por precio</button></div>
            <div align='center'><button name='find_prop' class='mod_btn'>Buscar por propietario</button></div>
        
        </form>

        <form action="find_piso_exe.php">

            <div align='center'><button name='find_disp' class='mod_btn'>Mostrar pisos disponibles</button></div>
            <div align='center'><button name='find_vend' class='mod_btn'>Mostrar pisos vendidos</button></div>
        
        </form>

    </section>

    <?php

        if (isset($_REQUEST["find_id"])){

            ?>
            <form class='change' action="find_piso_exe.php">
                <div>Introduce el ID del piso</div>
                <div><input type='number' name='cod'></div>
                <div><input type='submit' name='findcod'></div>
            </form>
            <?php

        }

        if (isset($_REQUEST["find_calle"])) {

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce la calle del piso</div>
                <div><input type='text' name='calle'></div>
                <div><input type='submit' name='findcalle'></div>
            </form>
            
            <?php

        }

        if (isset($_REQUEST["find_cp"])) {

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce el código postal del piso</div>
                <div><input type='number' name='cp' maxlength="5" minlength="5"></div>
                <div><input type='submit' name='findcp'></div>
            </form>
            
            <?php

        }

        if (isset($_REQUEST["find_metros"])) {

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce las dimensiones del piso</div>
                <div><input type='number' name='metros'></div>
                <div><input type='submit' name='findmetros'></div>
            </form>
            
            <?php

        }

        if(isset($_REQUEST["find_zona"])){

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce la zona de búsqueda</div>
                <div><input type='text' name='zona'></div>
                <div><input type='submit' name='findzona'></div>
            </form>
            
            <?php

        }

        if(isset($_REQUEST["find_precio"])){

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce el precio de búsqueda</div>
                <div><input type='number' name='precio'></div>
                <div><input type='submit' name='findprecio'></div>
            </form>
            
            <?php

        }

        if(isset($_REQUEST["find_prop"])){

            ?>

            <form class='change' action="find_piso_exe.php">
                <div>Introduce el nombre del propietario</div>
                <div><input type='text' name='prop'></div>
                <div><input type='submit' name='findprop'></div>
            </form>
            
            <?php

        }

    ?>

</body>
</html>
