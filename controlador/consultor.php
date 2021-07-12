<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccionjohn.php'); 
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
                   
                $dni = $_POST['dni']; 
                $nombres = $_POST['nombres']; 
                $apellidos = $_POST['apellidos']; 
                $direccion = $_POST['direccion']; 
                $correo = $_POST['correo']; 
                $edad = $_POST['edad']; 
                $telefono = $_POST['telefono']; 
                $celular = $_POST['celular']; 
                $titulosegundonivel = $_POST['titulosegundonivel']; 
                $titulotercernivel = $_POST['titulotercernivel']; 
            
                
                $sql = "execute sp_insertarconsultor '$dni','$nombres','$apellidos','$direccion','$correo','$edad','$telefono','$celular','$titulosegundonivel','$titulotercernivel'"; 
               
               

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

  
 case 'delete':
       
 break; 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>