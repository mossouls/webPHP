<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="scripts/val_form.js"></script>
</head>
<body>
    <?php
        #si había variables de sesión, las elimina
        session_unset();
        #si había alguna sesión abierta, la cierra
        session_destroy();
    ?>
    <form action="login.php" name="login" class="login">
        <h1 class="t1" align="center">Iniciar Sesión en Fotopiso</h1>
        <div>Email: </div>
        <div><input type="text" name="mail" id="mail"></div>
        <br>
        <div>Password: </div>
        <div><input type="password" name="pw" id="pw"></div>
        <br>
        <div><input type="submit" name="in" value="Entrar" onclick="return(val_f())"></div>
        <br>
    </form>
    <div class="registrar">
        ¿Aún no eres miembro? <a href="registro.php">Regístrate en Fotopiso</a>
    </div>
    <?php
        if (isset($_REQUEST["in"])) {

            //incluimos el archivo donde 
            //se establece la conexion a la BD
            include "php_extra/connect.php";
            //registramos los valores
            $usumail=trim(strip_tags(stripslashes($_REQUEST["mail"])));
            $usupwd=$_REQUEST["pw"];
            //comprobamos que el usuario 
            //existe con el email introducido
            $query="select * from usuarios where correo like '$usumail'";
            $consulta=mysqli_query($conexion,$query);
            $lineas=mysqli_num_rows($consulta);
        
                if ($lineas == 0) {

                    print "Usuario o contraseña no correctos.";

                } else {

                    //si hay una coincidencia en el correo
                    //recogemos los datos de la consulta
                    $datos_usuario = mysqli_fetch_array($consulta);
                    $nombre = $datos_usuario["nombre"];
                    $tipo = $datos_usuario["tipo_usuario"];
                    $codigo = $datos_usuario["usuario_id"];

                        //verificamos la contraseña 
                        //comparandolo con el hash en la BD
                        if (password_verify($usupwd, $datos_usuario["pw"])) {

                            session_start();

                            $_SESSION["codigo_usuario"] = $codigo;
                            $_SESSION["usuario"] = $nombre;
                            //si se verifica la contraseña, 
                            //creamos la sesion según el tipo de usuario
                            if ($tipo == "admin") {

                                $_SESSION["admin"] = $tipo;
                                header("Location:principal.php");

                            }

                            if ($tipo == "comprador") {

                                $_SESSION["comprador"] = $tipo;
                                header("Location:principal.php");
                            }

                            if ($tipo == "vendedor") {

                                $_SESSION["vendedor"] = $tipo;
                                header("Location:principal.php");

                            }

                        } else {

                            echo "<div class='msg'>La contraseña introducida no es correcta</div>";

                        }

            }

        mysqli_close($conexion);

        }
        
    ?>
</body>
</html>