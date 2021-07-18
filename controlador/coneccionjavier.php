<?php 
 $serverName = "JOHN";
 $db="Proyectos";
 
 $connectionInfo = array( "Database"=>$db);

$conn = sqlsrv_connect($serverName,$connectionInfo);  


 if ($conn == false ) {
    echo "Conexión fallida con  la base de datos";
    exit;
  }

?>