<?php 
require 'conexionreporte.php';
function getpropietario ()
{
  $mysqli = getConnexion();
  $query = 'SELECT * FROM  propietario ';
  return $mysqli->query($query);
}
?>