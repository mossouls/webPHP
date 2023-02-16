<?php
    $query="select * from pisos where codigo_piso =".$_SESSION['cod_compra'];
    $consulta=mysqli_query($conexion,$query);
    $lineas=mysqli_num_rows($consulta);
?>