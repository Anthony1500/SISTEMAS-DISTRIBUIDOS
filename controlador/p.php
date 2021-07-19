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
   
 case 'upsdate':
    $archivoguardado=0;
    $mensaje = "";
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{
                   
                $nombres = $_POST['nombres']; 
                $direccion = $_POST['direccion']; 
                $correo = $_POST['correo']; 
                $edad = $_POST['edad']; 
                $telefono = $_POST['telefono']; 
                $celular = $_POST['celular']; 
                $titulosegundonivel = $_POST['titulosegundonivel']; 
                $titulotercernivel = $_POST['titulotercernivel']; 
            
                
                $sql = "execute sp_actualizarcon '$apellidos','$direccion','$correo','$edad','$telefono','$celular','$titulosegundonivel','$titulotercernivel' WHERE nombres='$nombres' "; 
               
               

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
 case 'select':
    $nombres = $_POST['nombres']; 
    $sql="sp_buscarcon 'john' ";
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




    case 'update':
        $response = array( 
            'status' => 0, 
            'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
        );          
        if(!empty($_POST['codproyecto'])&&!empty($_POST['descripcionp']) && !empty($_POST['modalidaproyecto'])&& !empty($_POST['fechaingresoproyecto'])&&!empty($_POST['nivel'])&&!empty($_POST['numerodelaresolucion_CES'])&&!empty($_POST['fecharesolucion'])&&!empty($_POST['year'])&&!empty($_POST['valor'])&&!empty($_POST['codcarrera'])){ 
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
                    $sql = "execute sp_editproyecto '$codproyecto','$descripcionp','$modalidaproyecto','$fechaingresoproyecto','$nivel','$numerodelaresolucion_CES','$fecharesolucion',$year,'$valor','$codcarrera'";
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
   
    $sql="  sp_listaproyecto";
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
    case 'select':
       
       
       
            $resultqry = sqlsrv_query($con,"sp_buscarcon  'john'" );
            if (!$resultqry) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
            }
            $result = array();
            $items = array();  
         
            while($row = sqlsrv_fetch_object($resultqry)) {
               array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
            break;
  
 case 'delete':
       
 break; 
 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>