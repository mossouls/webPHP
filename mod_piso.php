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
            
            <form style='margin:auto;padding:auto; margin-top:1em; margin-bottom: 1em; width:fit-content;' class='mng_form' action='mod_piso_exe.php' enctype="multipart/form-data" method="post">
                <h1>Modificar piso</h1>
                <div>ID</div>
                <div><input type="number" name="cod" id="cod"></div>
                <div>Nueva calle</div>
                <div><input type="text" name="calle" id="calle"></div>
                <div>Nuevo número</div>
                <div><input type="number" name="num" id="num"></div>
                <div>Nueva zona</div>
                <div><input type="text" name="zona" id="zona"></div>
                <div>Nuevo CP</div>
                <div><input type="number" maxlength="5" minlength="5" name="cp" id="cp"></div>
                <div>Nueva imagen</div>
                <div><input type="file" name="imagen" id="img"></div>
                <div>Nuevo Propietario</div>
                <div><input type="text" name="prop" id="prop"></div>
                <div><input type="submit" value="Modificar" name='mod'></div>

            </form>    

        </section>

</body>
</html>