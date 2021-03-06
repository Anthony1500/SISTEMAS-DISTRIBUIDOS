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

        $condicion=$condicion."where prop_nombre like '%".$filtro."%' OR prop_cedula like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * FROM propietario".$condicion );
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
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{ 
               
                $codcarrera = $_POST['codcarrera'];   
                $nombrecarrera= $_POST['nombrecarrera']; 
                $campoamplio = $_POST['campoamplio'];  
                $campodetallado = $_POST['campodetallado'];
                $campoespecifico= $_POST['campoespecifico'];
                $codfacultad = $_POST['codfacultad']; 
                $sql = "execute sp_insertarcarrera '$codcarrera','$nombrecarrera','$campoamplio',' $campodetallado','$campoespecifico', 
                '$codfacultad'"; 
               
                echo $sql;
                $insert = sqlsrv_query($conn,$sql); 
                 
                if($insert){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
                } 
                else{
                    $response['status'] = 0; 
                    //$response['msg'] =  mysqli_result($insert); 

                }
    }


catch (Exception $e){ //usar logs
    $response = array( 
        'status' => 0, 
        'msg' =>  'El Usuario ya existe'  
    );           
}
            
            echo json_encode($response); 
 break; 


 case 'selectcombo':

    $sql = "SELECT codfacultad FROM facultad";
    $resultqry = sqlsrv_query($conn, $sql);
    if (!$resultqry) {
    echo ("Ocurrió un error en la consulta");
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
    
    if(!empty($_POST['prop_id'])&&!empty($_POST['prop_nombre']) && !empty($_POST['prop_apellido'])&& !empty($_POST['prop_edad'])&&!empty($_POST['prop_direccion'])&& !empty($_POST['prop_ecivil'])&& !empty($_POST['prop_correo'])&& !empty($_POST['prop_cedula'])&&!empty($_POST['prop_telefono'])){ 
        $prop_id = $_POST['prop_id'];   
        $prop_nombre = $_POST['prop_nombre'];   
        $prop_apellido = $_POST['prop_apellido']; 
        $prop_edad = $_POST['prop_edad'];   
        $prop_direccion = $_POST['prop_direccion']; 
        $prop_ecivil = $_POST['prop_ecivil'];  
        $prop_correo = $_POST['prop_correo']; 
        $prop_cedula = $_POST['prop_cedula'];   
        $prop_telefono = $_POST['prop_telefono']; 
       
                $sql = "UPDATE propietario SET  prop_nombre='$prop_nombre',prop_apellido='$prop_apellido',prop_edad='$prop_edad',prop_direccion='$prop_direccion',prop_ecivil='$prop_ecivil',prop_correo='$prop_correo',prop_cedula='$prop_cedula',prop_telefono='$prop_telefono' WHERE prop_id ='$prop_id'";
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
 case 'delete':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['prop_id'])   ){ 
                $prop_id = $_POST['prop_id']; 
              
                $sql = " delete from propietario where prop_id ='$prop_id' "; 
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