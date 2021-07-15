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
                   
                $usuario = $_POST['usuario']; 
                $contraseña = $_POST['contraseña']; 
                $RoleName = $_POST['RoleName'];                            
                $sql = " sp_addlogin '$usuario','$contraseña','Proyectos'"; 
                echo $sql;
                $insert = sqlsrv_query($conn,$sql); 
                $sql1 = " sp_adduser '$usuario','$usuario','$RoleName'"; 
                echo $sql1;
                $insert = sqlsrv_query($conn,$sql1); 

                
             
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
   

 break;
 case 'selectcombo':
    $sql="sp_helprole";
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