<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <img src="img/fotopiso_logo.png" width="200px" height="77.97">
            </div>
        </section>
    <?php
        if (isset($_SESSION["admin"])) {
            ?>

        <section>
            <div>
                <h1>Bienvenido, <?php print $_SESSION['usuario'] ?></h1>
            </div>
        </section>

        <section>
            <div id="menu">
                <div class="menu_elem">Pisos
                    <div class="menu_desp">
                        <div><a href="list_piso.php">Listar</a></div>
                        <div><a href="alta_piso.php">Dar de alta</a></div>
                        <div><a href="del_piso.php">Eliminar</a></div>
                        <div><a href="find_piso.php">Buscar</a></div>
                        <div><a href="mod_piso.php">Modificar</a></div>
                    </div>
                </div>

                <div class="menu_elem">Usuarios
                    <div class="menu_desp">
                        <div><a href="list_usr.php">Listar</a></div>
                        <div><a href="registro.php">Dar de alta</a></div>
                        <div><a href="del_usr.php">Eliminar</a></div>
                        <div><a href="find_usr.php">Buscar</a></div>
                        <div><a href="mod_usr.php">Modificar</a></div>
                    </div>
                </div>
                <div class="menu_elem">Perfil
                    <div class="menu_desp">
                        <div><a href="prof.php">Ver perfil</a></div>
                    </div>
                </div>
            </div>
            
        </section>
            <?php

        }
        
        if (isset($_SESSION["comprador"])) {

           ?>

        <section>

            <div>
                <h1>Bienvenido, <?php print $_SESSION['usuario'] ?></h1>
            </div>

        </section>

         <section>

            <div id="menu">
                <div class="menu_elem">Pisos
                    <div class="menu_desp">
                        <div><a href="list_piso.php">Listar</a></div>
                        <div><a href="find_piso.php">Buscar</a></div>
                    </div>
                </div>

                <div class="menu_elem">Perfil
                    <div class="menu_desp">
                        <div><a href="prof.php">Ver perfil</a></div>
                    </div>
                </div>
            </div>

        </section>
           <?php 
        }

        if (isset($_SESSION["vendedor"])) {
            ?>

        <section>

            <div>
                <h1>Bienvenido, <?php print $_SESSION['usuario'] ?></h1>
            </div>

        </section>

        <section>

            <div id="menu">
                <div class="menu_elem">Pisos
                    <div class="menu_desp">
                        <div><a href="list_piso.php">Listar</a></div>
                        <div><a href="alta_piso.php">Dar de alta</a></div>
                        <div><a href="del_piso.php">Eliminar</a></div>
                        <div><a href="mod_piso.php">Modificar</a></div>
                    </div>
                </div>

                <div class="menu_elem">Perfil
                    <div class="menu_desp">
                        <div><a href="prof.php">Ver perfil</a></div>
                    </div>
                </div>
            </div>
        </section>
            
            <?php
        }
        
    ?>
</body>
</html>