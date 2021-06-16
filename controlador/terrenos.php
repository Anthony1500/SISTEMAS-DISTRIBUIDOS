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
        $condicion=' ';
        if (isset($_POST['filtro'] )){
        $filtro=$_POST['filtro'] ;

        $condicion=$condicion."where propi_id like '%".$filtro."%' OR prop_nombre like '%".$filtro."%'OR prop_apellido like '%".$filtro."%'OR prop_cedula like '%".$filtro."%'OR propi_comunidad like '%".$filtro."%'OR propi_metros like '%".$filtro."%'OR propi_latitud like '%".$filtro."%'OR propi_longitud like '%".$filtro."%'OR propi_ciudad like '%".$filtro."%'OR propi_parroquia like '%".$filtro."%'OR tipodeasignacion like '%".$filtro."%'OR fechadeasignacion like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * FROM terrenosvista".$condicion );
            if (!$resultqry) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
            }
            $result = array();
            $items = array();  
         
            while($row = mysqli_fetch_object($resultqry)) {
               array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
            break;
 case 'insert':
    $archivoguardado=0;
    $mensaje = "";
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{
                //$propi_id = $_POST['propi_id'];   
                $propi_metros = $_POST['propi_metros']; 
                $propi_longitud = $_POST['propi_longitud'];   
                $propi_latitud = $_POST['propi_latitud']; 
                $propi_sector = $_POST['propi_sector'];  
                $propi_calleprincipal = $_POST['propi_calleprincipal']; 
                $propi_callesecundaria = $_POST['propi_callesecundaria'];   
                $propi_ciudad = $_POST['propi_ciudad']; 
                $propi_parroquia = $_POST['propi_parroquia']; 
                
                $sql = "INSERT INTO propiedad (propi_metros, propi_longitud, propi_latitud, propi_sector, propi_calleprincipal, propi_callesecundaria, propi_ciudad, propi_parroquia) 
                VALUES ('$propi_metros','$propi_longitud','$propi_latitud','$propi_sector','$propi_calleprincipal','$propi_callesecundaria','$propi_ciudad','$propi_parroquia')"; 
               
               

                echo $sql;
                $insert = mysqli_query($con,$sql); 
             
            if($insert){ 
                $response['status'] = 1; 
                $response['msg'] = '¡Las propiedades se han agregado con éxito!'; 
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
    if(!empty($_POST['tipodeasignacion'])){ 
        $propro_codigo = $_POST['propro_codigo'];  
        $prop_nombre = $_POST['prop_nombre'];   
        $prop_apellido = $_POST['prop_apellido'];
        $prop_cedula = $_POST['prop_cedula'];
        $prop_id = $_POST['prop_id']; 
        $propi_metros = $_POST['propi_metros']; 
        $propi_latitud = $_POST['propi_latitud']; 
        $propi_longitud = $_POST['propi_longitud']; 
        $propi_ciudad = $_POST['propi_ciudad']; 
        $propi_parroquia = $_POST['propi_parroquia'];
        $tipodeasignacion = $_POST['tipodeasignacion']; 
        $fechadeasignacion = $_POST['fechadeasignacion'];   
           
        
                $sql = "UPDATE propietario_propiedad SET  tipodeasignacion='$tipodeasignacion' WHERE propro_codigo ='$propro_codigo'";
               $update = mysqli_query($con,$sql);

     

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
    $resultqry = mysqli_query($con, 'SELECT * FROM propietario ' );
    if (!$resultqry) {
    
    exit;
    }
    
    $items=array();
 
    while($row = mysqli_fetch_object($resultqry)) {
       array_push($items, $row);
    }
  
    echo json_encode($items);
    break; 
  
 case 'delete':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['propro_codigo'])  ){ 
                $propro_codigo = $_POST['propro_codigo']; 
                $sql = " delete from propietario_propiedad where propro_codigo ='$propro_codigo'  "; 
                $delete = mysqli_query($con,$sql); 
                 
                if($delete){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han eliminado con éxito!'; 
                } 
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            }             
            echo json_encode($response); 
 break; 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>