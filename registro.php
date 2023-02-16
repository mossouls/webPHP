<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotopiso - Registro</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="scripts/val_form.js"></script>

</head>

<body>

        <section>
            <div class="logo">
            <a href="index.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
            </div>
        </section>

        <section>
            <form class="login" action="registro.php" name="registro" enctype="multipart/form-data" method="post">
                <div>Nombre de usuario</div>
                <div><input type="text" name="nombre" id="nombre"></div>
                <div>Correo eléctronico</div>
                <div><input type="text" name="email" id="email"></div>
                <div>Contraseña</div>
                <div><input type="password" name="pw" id="pw"></div>
                <div>Repite la contraseña</div>
                <div><input type="password" name="pw2" id="pw2"></div>    
                <div>¿Vas a comprar, o vender inmuebles?</div>
                <div><select name="tipo_usuario" id="tipo_usuario">
                    <option value="comprador">Comprar</option>
                    <option value="vendedor">Vender</option>
                </select></div>
                <div>Foto de perfil</div>
                <div><input type="file" name="imagen" id="imagen"></div>
                <div><input type="submit" value="Registrarse" name="yes" onclick="return(val_sign())"></div>
            </form>

        </section>

        <?php
            if(isset($_REQUEST["yes"])){

                $usnom=strip_tags(trim(stripslashes($_REQUEST["nombre"])));

                $usmail=strip_tags(trim(stripslashes($_REQUEST["email"])));

                $uspw=strip_tags(trim(stripslashes($_REQUEST["pw"])));

                $hash=password_hash($uspw, PASSWORD_DEFAULT);

                $tipus=$_REQUEST["tipo_usuario"];

                $upl=false;                                                                                                                                                                                                                                                                

                require "php_extra/connect.php";

                if(is_uploaded_file($_FILES["imagen"]["tmp_name"])){

                    $filepath="C:/AppServ/www/inmo/uploaded/prof/";

                    $filename=$_FILES["imagen"]["name"];

                    $upl=true;

                    $fullname=$filepath.$filename;

                    if(is_file($fullname)){

                        $one_id=time();

                        $filename=$one_id."-".$filename;

                    }

                }

                if($upl){

                    move_uploaded_file($_FILES["imagen"]["tmp_name"],$filepath.$filename);

                }

                $query_user="select * from usuarios where correo like '$usmail'";

                $consult_user=mysqli_query($conexion,$query_user);

                $lin_user=mysqli_num_rows($consult_user);

                if($lin_user==1){

                    print "<div class='registrar'>Ya existe una cuenta asociada a ese correo electrónico</div>";
                
                }else{

                    if(empty($_FILES["imagen"]["name"])){

                        $query="insert into usuarios (nombre,correo,pw,tipo_usuario) values ('$usnom','$usmail','$hash','$tipus')";
                        
                        $consulta=mysqli_query($conexion,$query);

                    }else{
                        
                        $query="insert into usuarios (nombre,correo,pw,tipo_usuario,imagen) values ('$usnom','$usmail','$hash','$tipus','$filename')";
                        
                        $consulta=mysqli_query($conexion,$query);
                    }
                        
                        if($consulta){

                            print "<div class='registrar'>Te has registrado en Fotopiso. Ahora puedes <a href='login.php'>iniciar sesión</a></div>";
                        
                        }else{
                            
                            print "<div class='registrar'>Lo sentimos, algo ha fallado. Prueba de nuevo.</div>";
                        
                        }
                }
                
                mysqli_close($conexion);

            }

        ?>
</body>
</html>