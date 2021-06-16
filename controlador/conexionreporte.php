<?php 
function getConnexion()
{
  $mysqli = new Mysqli('localhost:3306', 'root', '', 'catastros');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  
  return $mysqli;
}
?>