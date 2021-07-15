<!doctype html>
<html lang="en">
  <head>
  	<<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="imagenes/icons/favicon.ico"/>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
	<form class="login100-form validate-form"id="ff" method="post" onsubmit="return submitForm();">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">UTI</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Ingreso al Sistema</h3>
		      	<form action="#" class="signin-form" id="ff" method="post" onsubmit="return submitForm();">
		      		<div class="form-group">
		      			<input type="text" class="form-control"name="txtusuario" placeholder="Usuario" required>
		      		</div>
	           
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Acceder</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Recuerda mis datos
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								
	            </div>
	          </form>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>
	
<?php 

$serverName = "ANTHONY\ANTHONY";
$db="Proyectos";

$connectionInfo = array( "Database"=>$db);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br/>";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>


	
	<?php 
	session_start();
	unset(  $_SESSION['usuario'] );
	$mensaje=" ";

	if( isset($_POST["txtusuario"]) )
	{
		$txtusuario =   $_POST['txtusuario'];
	   
	   
		  $sql = "execute sp_helplogins @LoginNamePattern= '$txtusuario'";

		  $stmt = sqlsrv_query( $conn, $sql); 
		  $row = sqlsrv_fetch_array($stmt) ;

		  if( $row) {
			 echo "Conexión establecida.<br/>";
			 header("location: main.php") ;
		}else{
		 echo '<script language="javascript">alert("El Usuario o Contraseña no Existe");</script>'; 
			 die( print_r( sqlsrv_errors(), true));
		}

	 }

		   
			/* $stmt = sqlsrv_query( $conn, $sql); 
			 $row = sqlsrv_fetch_array($stmt) ;

			 if( isset($row['name']) == false){  
				$message = "Usuario Incorrecto";
echo "<script type='text/javascript'>alert('$message');</script>";


     die( print_r( sqlsrv_errors(), true));  

           /* Retrieve and display the results of the query. */ 
          
        



   /*    session_start();
	   unset(  $_SESSION['usuario'] );
	   $mensaje=" ";
  
		 if( isset($_POST["txtusuario"]) &&  isset($_POST["txtpassword"])   )
		  {
			  $txtusuario =   $_POST['txtusuario'];
			  $txtpassword =   $_POST['txtpassword']; 
			 
			  $contraseña = $txtpassword ;
			  $usuario = $txtusuario;
			  
			  # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
			  $rutaServidor = "JOHN";
			  try {
				  $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;", $usuario, $contraseña);
				  $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  header("location: main.php") ;
				  
			  } catch (Exception $e) {
				echo '<script language="javascript">alert("El Usuario o Contraseña no Existe");</script>';
				  
			  }
			  
			  
				  
				  
			  
  
		  }*/ 
    
    //echo '<script language="javascript">alert("Usuario y Clave Incorrecto");</script>';
                //$mensaje ="Las credenciales ingresadas no coinciden con los datos ya existentes";

          /*  $result = mysqli_query($con, $sql);
            if ($result == false) {
                echo  "Ocurrió un error en la consulta" ;

               exit;
            }  
            $row = mysqli_fetch_assoc($result) ;
            if( isset($row['usuario']) == null and isset($row['contraseña']) == null ){
				//echo '<script language="javascript">alert("Usuario y Clave Incorrecto");</script>';
                //$mensaje ="Las credenciales ingresadas no coinciden con los datos ya existentes";
				
            } 
            else{                 
               
				  $_SESSION['usuario'] = $row['nombre'] ;
				  $_SESSION['usuario1'] = $row['apellido'] ; 
				               
                  header("location: main.php") ;
				   //Libera la memoria del resultado.
    mysqli_free_result($result);

    
                }
           	*/        
        
	
    ?>
    <div> <?php  echo  $mensaje;?>   </div>
  
    <script>
        function submitForm(){            
            var isvalid = $( "#ff" ).form('validate'); 
            return isvalid;
        }
		
     
    </script>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
