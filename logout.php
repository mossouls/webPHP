<?php

    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
        <section>
            <div class="logo">
            <a href="principal.php"><img src="img/fotopiso_logo.png" width="200px" height="77.97"></a>
            </div>
            <form action="logout.php" class="mng_form">
                <div align='center'>
                    <h1>Estás a punto de cerrar sesión en Fotopiso</h1>
                    <button name="logout">Cerrar Sesión</button>
                </div>

            </form>
        </section>
</body>
</html>
<?php
if (isset($_REQUEST["logout"])) {
    session_unset();
    session_destroy();
    if (empty($_SESSION)) {
        header("Location:index.php");
    }
}

?>