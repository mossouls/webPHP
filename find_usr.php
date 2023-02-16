<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuario</title>
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

    <form class="mng_form" action="find_usr.php">
        <div align='center'><button class="mod_btn" name='fid'>Buscar por ID</button></div>
        <div align='center'><button class="mod_btn" name='fname'>Buscar por nombre</button></div>
        <div align='center'><button class="mod_btn" name='fmail'>Buscar por email</button></div>
    </form>
    <?php
    if (isset($_REQUEST["fid"])) {
    ?>
    <div class='change'>
        <form action="find_usr_exe.php">
            <div>Introduce el ID del usuario</div>
            <div><input type="number" name="cod" id="cod"></div>
            <div><input type="submit" value="Buscar" name='id_exe'></div>
        </form>
    </div>
    <?php
    }
    if (isset($_REQUEST["fname"])) {
    ?>
    <div class='change'>
        <form action="find_usr_exe.php">
            <div>Introduce el nombre del usuario</div>
            <div><input type="text" name="name" id="name"></div>
            <div><input type="submit" value="Buscar" name='name_exe'></div>
        </form>
    </div>
    <?php
    }
    if (isset($_REQUEST["fmail"])) {
    ?>
    <div class='change'>
        <form action="find_usr_exe.php">
            <div>Introduce el email del usuario</div>
            <div><input type="text" name="mail" id="mail"></div>
            <div><input type="submit" value="Buscar" name='mail_exe'></div>
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>