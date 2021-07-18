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
   
 case 'insert':
    $archivoguardado=0;
    $mensaje = "";
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{
                   
                $codseguimiento = $_POST['codseguimiento']; 
                $fecha = $_POST['fecha']; 
                $detalle = $_POST['detalle']; 
                $porcentajeavance = $_POST['porcentajeavance']; 
                $estado = $_POST['estado']; 
                $codproyecto = $_POST['codproyecto']; 
            
                
                $sql = "execute sp_insertarseguimiento '$codseguimiento','$fecha','$detalle',$porcentajeavance,'$estado','$codproyecto'"; 
               
               

                echo $sql;
                $insert = sqlsrv_query($conn,$sql); 
             
            if($insert){ 
                $response['status'] = 1; 
                    $response['msg'] = '¡se ha agregado con exito a la base!'; 
            } 
}


catch (Exception $e){ //usar logs
    $response = array( 
        'status' => 0, 
        'msg' =>  'La propiedad ya existe'  
    );           
}
            
            echo json_encode($response); 
 break; 

 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if(!empty($_POST['codseguimiento'])&&!empty($_POST['fecha']) && !empty($_POST['detalle'])&& !empty($_POST['porcentaje'])&&!empty($_POST['estado'])&&!empty($_POST['codproyecto'])){ 
                $codseguimiento = $_POST['codseguimiento']; 
                $fecha = $_POST['fecha'];   
                $detalle = $_POST['detalle']; 
                $porcentajeavance = $_POST['porcentajeavance'];   
                $estado = $_POST['estado']; 
                $codproyecto= $_POST['codproyecto']; 
                $sql = "execute sp_actualizarseguimiento '$codseguimiento','$fecha','$detalle','$porcentajeavance','$estado','$codproyecto'";
               $update = sqlsrv_query($conn,$sql);
                 
                if($update){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han actualizado con éxito!'; 
                } 
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            } 
             
            echo json_encode($response); 

 break;
 case 'selectcombo':
    $sql="SELECT codproyecto FROM proyecto";
    $resultqry = sqlsrv_query($conn,$sql);
    if (!$resultqry) {
    
    exit;
    }
    
    $items=array();
 
    while($row = sqlsrv_fetch_object($resultqry)) {
       array_push($items, $row);
    }
  
    echo json_encode($items);
    break; 
    case 'selectcombo1':
        $sql="sp_listaseguimiento";
        $resultqry = sqlsrv_query($conn,$sql);
        if (!$resultqry) {
        
        exit;
        }
        
        $items=array();
     
        while($row = sqlsrv_fetch_object($resultqry)) {
           array_push($items, $row);
        }
      
        echo json_encode($items);
        break; 
       
            case 'selectcombo2':
                
               $codseguimiento = $_POST['id'];

                $sql="execute sp_buscarseguimiento '$codseguimiento'";
                $resultqry = sqlsrv_query($conn,$sql);
                if (!$resultqry) {
                
                exit;
                }
                
                $items=array();
             
                while($row = sqlsrv_fetch_object($resultqry)) {
                   array_push($items, $row);
                }
              
                echo json_encode($items);
           
                break; 
 case 'delete':
       
 break; 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>