<?php
    $conexion=mysqli_connect("localhost","root","rootroot") or die ("Imposible conectar al servidor");
    mysqli_select_db($conexion,"inmobiliaria2") or die ("Imposible acceder a la base de datos");
    $query="select * from pisos";
    $consulta=mysqli_query($conexion,$query);
    $lineas_pisos=mysqli_num_rows($consulta);
    for ($i=0; $i < $lineas_pisos; $i++) { 
        $array_pisos=mysqli_fetch_array($consulta);
        $cod[$i]=$array_pisos["codigo_piso"];
        $calle[$i]=$array_pisos["calle"];
        $numero[$i]=$array_pisos["numero"];
        $planta[$i]=$array_pisos["planta"];
        $puerta[$i]=$array_pisos["puerta"];
        $cp[$i]=$array_pisos["cp"];
        $metros[$i]=$array_pisos["metros"];
        $zona[$i]=$array_pisos["zona"];
        $precio[$i]=$array_pisos["precio"];
        $imagen[$i]=$array_pisos["imagen"];
        $estado[$i]=$array_pisos["vendido"];
        $propietario=mysqli_fetch_array(mysqli_query($conexion,"select nombre from usuarios where usuario_id in (select usuario_id from pisos where usuario_id='".$array_pisos['usuario_id']."')"));
        $nom_propietario[$i]=$propietario["nombre"];
    }

?>
