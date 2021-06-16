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

        $condicion=$condicion."where prop_nombre like '%".$filtro."%' OR prop_apellido like '%".$filtro."%'OR co_fecha like '%".$filtro."%'OR co_valortotal like '%".$filtro."%'OR estado like '%".$filtro."%'OR sumacobro like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"select * from propietario p INNER JOIN cobro c ON p.prop_id=c.prop_id".$condicion );
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
                $prop_id = $_POST['prop_id'];   
                $co_fecha = $_POST['co_fecha']; 
                $co_valortotal= $_POST['co_valortotal'];   
                $estado = $_POST['estado']; 
            
                
                $sql = "INSERT INTO cobro (prop_id,co_fecha,co_valortotal,estado) 
                VALUES ('$prop_id','$co_fecha','$co_valortotal','$estado')"; 
               
               

                echo $sql;
                $insert = mysqli_query($con,$sql); 
             
            if($insert){ 
                $response['status'] = 1; 
                $response['msg'] = '¡El cobro se han agregado con éxito!'; 
            } 
}


catch (Exception $e){ //usar logs
    $response = array( 
        'status' => 0, 
        'msg' =>  'La cobro ya existe'  
    );           
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

 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if(!empty($_POST['co_id'])&&!empty($_POST['prop_id'])&&!empty($_POST['co_fecha'])&&!empty($_POST['co_valortotal'])&&!empty($_POST['estado'])&&!empty($_POST['sumacobro'])){ 
                $co_id = $_POST['co_id'];
                $prop_id = $_POST['prop_id'];   
                $co_fecha = $_POST['co_fecha']; 
                $co_valortotal= $_POST['co_valortotal'];   
                $estado = $_POST['estado']; 
                $sumacobro = $_POST['sumacobro']; 
           
        
                $sql = "UPDATE cobro SET  prop_id='$prop_id',co_fecha='$co_fecha',co_valortotal='$co_valortotal',estado='$estado',sumacobro='$sumacobro' WHERE co_id ='$co_id'";
               $update = mysqli_query($con,$sql);

     

                if($update){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del cobro se han actualizado con éxito!'; 
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
            if(!empty($_POST['co_id'])  ){ 
                $co_id = $_POST['co_id']; 
                $sql = " delete from cobro where co_id ='$co_id'"; 
                $delete = mysqli_query($con,$sql); 
                 
                if($delete){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del cobro se han eliminado con éxito!'; 
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