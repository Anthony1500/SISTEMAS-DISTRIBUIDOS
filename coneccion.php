<?php 
$contraseña = "sasa";
$usuario = "sa";
$nombreBaseDeDatos = "Proyectos";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "JOHN";
try {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Coneccion correcta con la base de datos: ";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>

<html>
 <head>
  <title>Inicio correcto</title>
 </head>
 <body>
 <p><button onclick="location.href='index.php'">Regresar</button></p>
 </body>
</html>