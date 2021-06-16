<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccion.php'); 
$op=  $_GET['op'] ;
if( !isset($op) )
{
  echo  json_encode( "No se definió  la variable op");
  exit;
} 
 
switch ($op) { 
    case 'select':
            $resultqry = pg_query($dbconn, 'SELECT * FROM rol');
            if (!$resultqry) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
            }        
            $items = array();           
            while($row = pg_fetch_object($resultqry)) {
               array_push($items, $row);
            }        
            echo json_encode($items);
            break; 
            
            case 'select-cobro':
                $resultqry = pg_query($dbconn, 'SELECT * FROM propiedad');
                if (!$resultqry) {
                echo json_encode("Ocurrió un error en la consulta");
                exit;
                }        
                $items = array();           
                while($row = pg_fetch_object($resultqry)) {
                   array_push($items, $row);
                }        
                echo json_encode($items);
                break; 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);
            }
?>