<?php
    session_start();

    require("php_extra/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
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

<?php

    print_r($_REQUEST);

    if(isset($_REQUEST["modif_id"])){

        $newcod=$_REQUEST["newcod"];

        $oldcod=$_REQUEST["oldcod"];

        $exists_id = mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$newcod"));
        
        $usr_not_exist=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));
                //si el usuario con el código anterior no eixste
                if($usr_not_exist==0){

                    echo "<div class='msg'>No existe ningún usuario con el ID introducido.</div>";

                }else{
                //si el usuario con el nuevo código existe
                    if($exists_id==1){

                        echo "<div class='msg'>Ya hay un usuario registrado con ese código.</div>";
                    
                    }else{

                        $consulta=mysqli_query($conexion, "update usuarios set usuario_id=$newcod where usuario_id=$oldcod");
                            
                            if($consulta){

                                echo "<div class='msg'>ID de usuario actualizado</div>";

                            }
                    }
                }
            }

    if(isset($_REQUEST["modif_tipo"])){

        $oldcod = $_REQUEST["oldcod"];

        $newtipo = $_REQUEST["newtipo"];

        $exists_usr=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));

            if($exists_usr==0){

                echo "<div class='msg'>No existe ningún usuario con el ID introducido.</div>";

            }else{
                $consulta=mysqli_query($conexion, "update usuarios set tipo_usuario = '$newtipo' where usuario_id=$oldcod");

                    if($consulta){

                        echo "<div class='msg'>Tipo de usuario actualizado</div>";

                    }
            }
    }

    if(isset($_REQUEST["modif_name"])){

        $oldcod = $_REQUEST["oldcod"];

        $newname = trim(strip_tags(stripslashes($_REQUEST["newname"])));

            if(isset($oldcod)){

                $exists_usr=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));  

                    if($exists_usr==0){

                        echo "<div class='msg'>No existe ningún usuario con el ID introducido.</div>";

                    }else{

                        $consulta=mysqli_query($conexion, "update usuarios set nombre = '$newname' where usuario_id=$oldcod");

                            if($consulta){

                                echo "<div class='msg'>Nombre de usuario actualizado correctamente.</div>";

                                header( "refresh:3; url=principal.php" );

                            }
                    }
            }else{
                $consulta=mysqli_query($conexion, "update usuarios set nombre = '$newname' where usuario_id=".$_SESSION["codigo_usuario"]);

                    if($consulta){

                        echo "<div class='msg'>Nombre de usuario actualizado correctamente</div>";

                        header( "refresh:3; url=principal.php" );

                    }
            }
    }

    if(isset($_REQUEST["modif_mail"])){

        $oldcod = $_REQUEST["oldcod"];

        $newmail = trim(strip_tags(stripslashes($_REQUEST["newmail"])));

        $exists_usr=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));

        $exists_mail=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where correo like '$newmail'"));

            if(isset($oldcod)){

                if($exists_usr==0){

                    echo "<div class='msg'>No existe ningún usuario con el ID introducido</div>";

                }else{

                    if($exists_mail==1){

                        echo "<div class='msg'>Ya existe un usuario asociado a ese correo</div>";

                    }else{
                        $consulta = mysqli_query($conexion, "update usuarios set correo = '$newmail' where usuario_id = $oldcod");

                            if($consulta){

                                echo "<div class='msg'>Correo actualizado correctamente</div>";

                                header( "refresh:3; url=principal.php" );

                            }
                    }
                }
            }else{
                if($exists_mail==1){

                    echo "<div class='msg'>Ya existe un usuario asociado a ese correo</div>";

                }else{

                    $consulta = mysqli_query($conexion, "update usuarios set correo = '$newmail' where usuario_id = ".$_SESSION["codigo_usuario"]);

                        if($consulta){

                            echo "<div class='msg'>Correo actualizado correctamente</div>";

                            header( "refresh:3; url=principal.php" );

                        }
                }
            }
    }

    if(isset($_REQUEST["modif_pw"])){

        $oldcod = $_REQUEST["oldcod"];

        $newpw = trim(strip_tags(stripslashes($_REQUEST["newpw"])));

        $hash = password_hash($newpw, PASSWORD_DEFAULT);

            if(isset($oldcod)){

                $exists_usr=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));

                    if($exists_usr==0){

                        echo "<div class='msg'>No existe ningún usuario con el ID introducido</div>";

                    }else{

                        $consulta = mysqli_query($conexion, "update usuarios set pw = '$hash' where usuario_id = $oldcod");
                        
                            if($consulta){

                                echo "<div class='msg'>Contraseña actualizada correctamente</div>";

                                header( "refresh:3; url=principal.php" );

                            }
                    }
            }else{

                $consulta = mysqli_query($conexion, "update usuarios set pw = '$hash' where usuario_id = " . $_SESSION["codigo_usuario"]);

                    if($consulta){

                        echo "<div class='msg'>Contraseña actualizada correctamente</div>";

                        header( "refresh:3; url=principal.php" );

                    }
            }
    }

    if(isset($_REQUEST["modif_img"])){

        $oldcod = $_REQUEST["oldcod"];

        $newimg = $_FILES["newimg"]["name"];

        $upl = false;


            if(is_uploaded_file($_FILES["newimg"]["tmp_name"])){

                $filename = $newimg;

                $fileruta = "C:/AppServ/www/inmo/uploaded/prof/";

                $upl = true;

                $fullname = $fileruta . $filename;

                    if(is_file($fullname)){

                        $only = time();

                        $filename = $only . "-" . $filename;

                    }
            }
            if($upl){

                $upl_conf=move_uploaded_file($_FILES["newimg"]["tmp_name"], $fileruta . $filename);

                    if(!$upl_conf){

                        echo "<div class='msg'>Error en la subida de la imagen</div>";

                    }

                if(isset($oldcod)){

                    $exists_usr=mysqli_num_rows(mysqli_query($conexion, "select * from usuarios where usuario_id=$oldcod"));

                    if($exists_usr==0){

                        echo "<div class='msg'>No existe ningún usuario con el ID introducido</div>";

                    } else {

                        $consulta = mysqli_query($conexion, "update usuarios set imagen = '$filename' where usuario_id = $oldcod");

                        if($consulta){

                            echo "<div class='msg'>Foto de perfil actualizada correctamente</div>";

                        }
                    }
                }else{

                    $consulta = mysqli_query($conexion, "update usuarios set imagen = '$filename' where usuario_id = ".$_SESSION["codigo_usuario"]);

                    if($consulta){

                        echo "<div class='msg'>Foto de perfil actualizada correctamente</div>";

                        header( "refresh:3; url=principal.php" );

                    }
                }
            }
    }
?>
</body>
</html>