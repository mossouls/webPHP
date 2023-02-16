<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="scripts/val_form.js"></script>
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
            <form action="mod_usr.php" class='mng_form'>
                <?php
                print "<h1>Modificar perfil de " . $_SESSION["usuario"] . "</h1>";
                if(isset($_SESSION["admin"])){
                    print "<div align='center'><button class='mod_btn' name='mod_id'>Modificar ID de usuario</button></div>";
                    print "<div align='center'><button class='mod_btn' name='mod_tipo'>Modificar tipo de usuario</button></div>";
                }
                ?>
                <div align='center'><button class='mod_btn' name='mod_name'>Modificar nombre de usuario</button></div>
                <div align='center'><button class='mod_btn' name='mod_mail'>Modificar correo electrónico</button></div>
                <div align='center'><button class='mod_btn' name='mod_pw'>Modificar contraseña</button></div>
                <div align='center'><button class='mod_btn' name='mod_img'>Modificar foto de perfil</button></div>
            </form>
            <?php
                if(isset($_REQUEST["mod_id"])){
            ?>
                <form class='change' action='mod_usr_exe.php' name='modid'>
                    <div>Introduce el ID del usuario a modificar</div>
                    <div><input type="number" name="oldcod"></div>
                    <div>Introduce el nuevo ID de usuario</div>
                    <div><input type='number' name='newcod'></div>
                    <div><input type="submit" value="Modificar" name='modif_id' onclick="return(val_modif_id())"></div>
                </form>
            <?php

                }
            if (isset($_REQUEST["mod_tipo"])) {

                ?>
                <form class='change' action='mod_usr_exe.php'>
                    <div>Introduce el ID de usuarios que quieres modificar</div>
                    <div><input type="number" name="oldcod"></div>
                    <div>Introduce el nuevo tipo de usuario</div>
                    <div>
                    <input type="radio" name="newtipo" value="comprador">Comprador<br>
                    <input type="radio" name="newtipo" value="vendedor">Vendedor <br>
                    <input type="radio" name="newtipo" value="admin">Administrador
                    </div>
                    <div><input type="submit" value="Modificar" name='modif_tipo'></div>
                </form>
            <?php
            }

            if (isset($_REQUEST["mod_name"])) {
                
                ?>
                <form class='change' action='mod_usr_exe.php'>
                    <?php
                        if($_SESSION["admin"]){
                            echo "<div>Introduce el ID de usuarios que quieres modificar</div>";
                            echo "<div><input type='number' name='oldcod'></div>";
                        }
                    ?>
                    <div>Introduce el nuevo nombre de usuario</div>
                    <div><input type='text' name='newname'></div>
                    <div><input type="submit" value="Modificar" name='modif_name'></div>
                </form>

                <?php
            }
            if (isset($_REQUEST["mod_mail"])) {

                ?>
                <form class='change' action='mod_usr_exe.php'>
                    <?php
                        if($_SESSION["admin"]){
                            echo "<div>Introduce el ID de usuarios cuyo email quieres modificar</div>";
                            echo "<div><input type='number' name='oldcod'></div>";
                        }
                    ?>                    
                    <div>Introduce el nuevo correo electrónico</div>
                    <div><input type='text' name='newmail'></div>
                    <div><input type="submit" value="Modificar" name='modif_mail'></div>
                </form>
                <?php
            }
            if (isset($_REQUEST["mod_pw"])) {
                ?>
                <form class='change' action='mod_usr_exe.php'>
                    <?php
                        if($_SESSION["admin"]){
                            echo "<div>Introduce el ID de usuario para cambiar su contraseña</div>";
                            echo "<div><input type='number' name='oldcod'></div>";
                        }
                    ?> 
                    <div>Introduce la nueva contraseña</div>
                    <div><input type='text' name='newpw'></div>
                    <div><input type="submit" value="Modificar" name='modif_pw'></div>
                </form>
                <?php
            }
            if (isset($_REQUEST["mod_img"])) {
                ?>
                <form class='change' method="POST" action='mod_usr_exe.php' enctype="multipart/form-data">
                    <?php
                        if($_SESSION["admin"]){
                            echo "<div>Introduce el ID de usuario para cambiar su imagen</div>";
                            echo "<div><input type='number' name='oldcod'></div>";
                        }
                    ?> 
                    <div>Introduce la nueva foto de perfil</div>
                    <div><input type='file' name='newimg'></div>
                    <div><input type="submit" value="Modificar" name='modif_img'></div>
                </form>
                <?php
            }
                ?>
        </section>
</body>
</html>