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
    <title>Eliminar cuenta</title>
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
        <?php
            if(isset($_SESSION["admin"])){
        ?>
                <form action="del_usr_exe.php">
                    <h1>Eliminar usuario</h1>
                    <div>Introduce el ID de usuario que deseas eliminar</div>
                    <div><input type="number" name="id"></div>
                    <div><input type="submit" value="Eliminar" name="del_usr"></div>
                </form>
        <?php
            } else {
        ?>
                <form action="del_usr_exe.php">
                    <h1>¿Borrar cuenta en FotoPiso?</h1>
                    <div>Debes tener en cuenta que los pisos que tengas en propiedad también se eliminarán de la web.</div>
                    <input type="submit" value="Borrar cuenta" name="del_prof">
                </form>
        <?php
            }
        ?>
    </section>
</body>
</html>