<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Max-Age: 178000'); 
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
      //  $condicion=' ';
      //  if (isset($_POST['filtro'] )){
      //  $filtro=$_POST['filtro'] ;

            // $condicion=$condicion."where nombre like '%".$filtro."%' OR apellido like '%".$filtro."%' ";
        
       // }

       $sql = "execute sp_selectfacultad";
            $stmt =sqlsrv_query($conn,$sql);
                        
            if (!$stmt) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
           }

         $result = array();
            $items = array();  
         
            while($row =sqlsrv_fetch_array($stmt)) {
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
               
                $codfacultad = $_POST['codfacultad'];   
                $nombrefacultad = $_POST['nombrefacultad']; 
                $decano = $_POST['decano'];  
                $lugar = $_POST['lugar']; 
                $sql = "execute sp_insertarfacultad '$codfacultad','$nombrefacultad','$decano','$lugar' "; 
               
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

 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if(!empty($_POST['codfacultad'])&&!empty($_POST['nombrefacultad']) && !empty($_POST['decano'])&& !empty($_POST['lugar'])){ 
                $codfacultad = $_POST['codfacultad']; 
                $nombrefacultad = $_POST['nombrefacultad'];   
                $decano = $_POST['decano']; 
                $lugar= $_POST['lugar'];   
                
                $sql = "execute sp_actualizarfacultad '$codfacultad','$nombrefacultad','$decano','$lugar'"; 
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
 case 'selectcombo1':
    $sql="sp_listafacultad";
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
 case 'selectcombo':
    $resultqry = pg_query($dbconn, 'SELECT * FROM usuario ' );
    if (!$resultqry) {
   
    exit;
    }
    
    $items=array();
 
    while($row = pg_fetch_object($resultqry)) {
       array_push($items, $row);
    }
  
    echo json_encode($items);
    break;
 case 'delete':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['cod_log'] )  ){ 
                $login = $_POST['cod_log']; 
           
              
                $sql = " delete from login where cod_log ='$login'"; 
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