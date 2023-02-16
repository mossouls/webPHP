<?php

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar piso de alta</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="scripts/val_form.js"></script>
</head>
<body>

    <?php
    require("php_extra/connect.php");
    ?>

        <section>
            <div align="right">
                <a href="logout.php"><button>Logout</button></a>
            </div> 
            <div class="logo">
                <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
            </div>
        </section>
        <section>
            <h1>Da de alta tu inmueble</h1>
            <form class="mng_form" action="alta_piso.php" method="post" enctype="multipart/form-data" name="alta_piso">
                
                <?php
                    if (isset($_SESSION["admin"])) {
                        print "<div>Código de inmueble</div>";
                        print "<div><input type='number' name='cod' id='cod'></div>";
                    }
                ?>

                <div>Calle del inmueble</div>
                <div><input type="text" name="calle" id="calle"></div>
                <div>Número</div>
                <div><input type="number" name="numero" id="numero"></div>
                <div>Planta</div>
                <div><input type="number" name="planta" id="planta"></div>
                <div>Puerta</div>
                <div><input type="text" name="puerta" id="puerta" maxlength="1"></div>
                <div>Código Postal</div>
                <div><input type="number" maxlength="5" id="cp" name="cp"></div>
                <div>Zona</div>
                <div><input type="text" name="zona" id="zona"></div>
                <div>Metros</div>
                <div><input type="number" name="metros" id="metros"></div>
                <div>Precio</div>
                <div><input type="number" name="precio" name="precio" id="precio"></div>
                <div>Imagen</div>
                <div><input type="file" name="imagen" id="imagen"></div>
                <div>Propietario: 

                    <?php
                        if (isset($_SESSION["admin"])) {
                            //ejecutamos la consulta
                            $query="select nombre from usuarios where tipo_usuario like 'comprador' or tipo_usuario like 'vendedor'";
                            $consulta=mysqli_query($conexion,$query);
                            //recorremos los resultados
                            for ($i=0; $i < mysqli_num_rows($consulta); $i++) { 
                                //almacenamos los resultados en un array
                                $datos=mysqli_fetch_array($consulta);
                                //guardamos el elemento "nombre" en un nuevo array
                                $nombres_prop[$i]=$datos["nombre"];
                            }
                            print "<select name='propietario'>";
                                for ($i=0; $i < count($nombres_prop); $i++) { 
                                    //imprimimos cada elemento del array nombres_prp como una opcion del select
                                    print "<option>".$nombres_prop[$i]."</option>";
                                }
                            print "</select>";
                        }
                        else{
                            //si no eres administrador, el propietario será por defecto el vendedor
                        print "<div><b>".$_SESSION["usuario"]."</b></div>";
                            print "<div><input type=hidden name='propietario' id='propietario' value='".$_SESSION["usuario"]."' hidden</div>";
                        }
                    ?>
                    
                </div>
                <div><input type="submit" value="Dar de Alta" name="yes" onclick="return(val_alta_piso())"></div>
            </form>
        </section>
        
        <?php
            //si el formulario es correcto, subimos el piso a la base de datos
            if (isset($_REQUEST["yes"])) {
                $cod=trim(stripslashes(strip_tags($_REQUEST["cod"])));
                $str=trim(stripslashes(strip_tags($_REQUEST["calle"])));
                $nm=trim(stripslashes(strip_tags($_REQUEST["numero"])));
                $flr=trim(stripslashes(strip_tags($_REQUEST["planta"])));
                $dor=trim(stripslashes(strip_tags($_REQUEST["puerta"])));
                $codpot=trim(stripslashes(strip_tags($_REQUEST["cp"])));
                $zn=trim(stripslashes(strip_tags($_REQUEST["zona"])));
                $sz=trim(stripslashes(strip_tags($_REQUEST["metros"])));
                $mon=trim(stripslashes(strip_tags($_REQUEST["precio"])));
                $prp=$_REQUEST["propietario"];
                $isup=false;

                    //vamos a subir el archivo
                    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
                        $filnom=$_FILES["imagen"]["name"];
                        $fildir="C:/AppServ/www/inmo/uploaded/piso/";
                        $isup=true;

                        //comprobamos si ese nombre de archivo ya existe para cambiarlo
                        $fulnamfil=$fildir.$filnom;
                        if (is_file($fulnamfil)) {
                            $id_uni=time();
                            $filnom=$id_uni."-".$filnom;
                        }
                    }
                    //movemos el archivo a nuestro directorio
                    if ($isup) {
                        move_uploaded_file($_FILES["imagen"]["tmp_name"],$fildir.$filnom);
                    }

                //introducimos los datos en la BD
                if ($zn=="") {
                    $zn="null";
                }
                    $query="select usuario_id from usuarios where nombre like '$prp'";
                    $consulta=mysqli_query($conexion,$query);
                    $datos=mysqli_fetch_array($consulta);
                    $prp=$datos["usuario_id"];

                        if (empty($cod)) {
                            $comprobar = "select * from pisos where calle like '$str' and numero like '$nm'";
                            $consulta_comprobar = mysqli_query($conexion, $comprobar);
                            $lineas_comprobar = mysqli_num_rows($consulta_comprobar);
                                if($lineas_comprobar==0){
                                    //consulta de insercion
                                    $insert_query="insert into pisos (calle,numero,planta,puerta,cp,metros,zona,precio,imagen,usuario_id) values ('$str','$nm','$flr','$dor','$codpot','$sz','$zn','$mon','$filnom','$prp')";
                                    $insert_exe=mysqli_query($conexion,$insert_query);
                                }else{
                                    $error="Ya hay registrado un piso con esa dirección.";
                                }
                        }else{
                            $comprobar = "select * from pisos where codigo_piso = $cod";
                            $consulta_comprobar = mysqli_query($conexion, $comprobar);
                            $lineas_comprobar = mysqli_num_rows($consulta_comprobar);
                                if($lineas_comprobar==0){
                                    //consulta de insercion
                                    $insert_query="insert into pisos (codigo_piso,calle,numero,planta,puerta,cp,metros,zona,precio,imagen,usuario_id) values ($cod,'$str','$nm','$flr','$dor','$codpot','$sz','$zn','$mon','$filnom','$prp')";
                                    $insert_exe=mysqli_query($conexion,$insert_query);
                                }else{
                                    $error="Ya existe un piso con ese código.";
                                }
                        }
                        if($insert_exe){
                            print "<div class='msg'>Inmueble dado de alta</div>";
                        }else{
                            $error =$error." Piso no registrado.";
                            print "<div class='msg'>$error</div>";
                        }   

                //cerramos la conexion
                mysqli_close($conexion);
            }
        ?>
</body>
</html>