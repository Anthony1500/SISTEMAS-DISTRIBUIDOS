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

        $condicion=$condicion."where riego_fecha like '%".$filtro."%' OR propi_id like '%".$filtro."%'OR riego_dias like '%".$filtro."%'OR riego_horas like '%".$filtro."%'OR riego_observaciones like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * from riego".$condicion );
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
                $propi_id = $_POST['propi_id'];   
                $riego_dias = $_POST['riego_dias']; 
                $riego_horas= $_POST['riego_horas'];   
                $riego_fecha = $_POST['riego_fecha'];
                $prop_nombre = $_POST['prop_nombre']; 
                $prop_apellido = $_POST['prop_apellido'];  
                $riego_observaciones = $_POST['riego_observaciones'];  
                 
                
                $sql = "INSERT INTO riego (propi_id,riego_dias,riego_horas,prop_nombre,prop_apellido,riego_fecha,riego_observaciones) 
                VALUES ('$propi_id','$riego_dias','$riego_horas','$prop_nombre','$prop_apellido','$riego_fecha','$riego_observaciones')"; 
               
               

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
    if(!empty($_POST['riego_dias'])&&!empty($_POST['riego_horas'])&&!empty($_POST['riego_fecha'])&&!empty($_POST['riego_observaciones'])){ 
                $riego_id = $_POST['riego_id'];
                $propi_id = $_POST['propi_id'];   
                $riego_dias = $_POST['riego_dias']; 
                $riego_horas= $_POST['riego_horas'];   
                $riego_fecha = $_POST['riego_fecha']; 
                $prop_nombre = $_POST['prop_nombre']; 
                $prop_apellido = $_POST['prop_apellido']; 
                $riego_observaciones = $_POST['riego_observaciones'];   
           
        
                $sql = "UPDATE riego SET  propi_id='$propi_id',riego_dias='$riego_dias',prop_nombre='$prop_nombre',prop_apellido='$prop_apellido',riego_horas='$riego_horas',riego_fecha='$riego_fecha',riego_observaciones='$riego_observaciones' WHERE riego_id ='$riego_id'";
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
            if(!empty($_POST['riego_id'])  ){ 
                $riego_id = $_POST['riego_id']; 
                $sql = " delete from riego where riego_id ='$riego_id'  "; 
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