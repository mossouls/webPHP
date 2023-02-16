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
        <div class="logo">
            <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
        </div>
    </section>
    <?php
        include("php_extra/connect.php");
        if (isset($_REQUEST["id_exe"])) {
            $uscod=$_REQUEST["cod"];
            $usr=mysqli_query($conexion,"select * from usuarios where usuario_id=$uscod");
            $exists_usr=mysqli_num_rows($usr);
            if ($exists_usr==0) {
                echo "<div class='msg'>No existe ningún usuario con ese ID</div>";
            }else{
                $array_usr=mysqli_fetch_array($usr);
                print "<div class='usr_list'>";
                print "<div><img src='uploaded/prof/".$array_usr["imagen"]."'/></div>";
                print "<div><b>Nombre </b>".$array_usr["nombre"]."</div>";
                print "<div><b>Email </b>".$array_usr["correo"]."</div>";
                if ($array_usr["tipo_usuario"]=="admin") {
                    print "<div><b>Tipo </b>Administrador</div>";
                }else{
                    print "<div><b>Tipo </b>".ucfirst($array_usr["tipo_usuario"]) ."</div>";
                }
                print "</div>";
            }
        }
    ?>
</body>
</html>