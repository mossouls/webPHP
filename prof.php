<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil en FotoPiso</title>
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
        <section class="prof">
            <?php
            print "<h1>Perfil de " . $_SESSION["usuario"] . "</h1>";
            require "php_extra/connect.php";
            $query = "select * from usuarios where usuario_id=" . $_SESSION["codigo_usuario"];
            $consulta = mysqli_query($conexion, $query);
            $lineas = mysqli_num_rows($consulta);
                for ($i=0; $i < $lineas; $i++) {
                $array_usuario = mysqli_fetch_array($consulta);
                print "<div><img src='uploaded/prof/".$array_usuario["imagen"]."'/></div>";
                print "<div><b>Usuario </b>".$array_usuario["nombre"]."</div>";
                print "<div><b>Email </b>".$array_usuario["correo"]."</div>";
                if($array_usuario["tipo_usuario"]=="admin"){
                    print "<div><b>Tipo de usuario </b> Administrador</div>";
                }else{
                    print "<div><b>Tipo de usuario </b>".ucfirst($array_usuario["tipo_usuario"])."</div>";
                }
                }
            ?>
            <div>
            <a href="mod_usr.php"><button>Modificar Perfil</button></a>
            <a href="del_usr.php"><button>Borrar Cuenta</button></a>
            </div>
            
        </section>
</body>
</html>