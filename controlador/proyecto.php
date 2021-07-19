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
                   
                $codproyecto = $_POST['codproyecto']; 
                $descripcionp = $_POST['descripcionp']; 
                $modalidaproyecto = $_POST['modalidaproyecto']; 
                $fechaingresoproyecto = $_POST['fechaingresoproyecto']; 
                $nivel = $_POST['nivel']; 
                $numerodelaresolucion_CES = $_POST['numerodelaresolucion_CES']; 
                $fecharesolucion = $_POST['fecharesolucion']; 
                $year = $_POST['year']; 
                $valor = $_POST['valor']; 
                $codcarrera = $_POST['codcarrera']; 

                
                $sql = "execute sp_insertarproyecto '$codproyecto','$descripcionp','$modalidaproyecto','$fechaingresoproyecto','$nivel','$numerodelaresolucion_CES','$fecharesolucion',$year,'$valor','$codcarrera'"; 
               
               

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
   

 break;

 case 'selectcombo3':
    $sql=" sp_listaproyecto ";
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

 case 'selectcombo':
    $sql="sp_listacarrera";
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