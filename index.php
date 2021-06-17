<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<title>Login</title>
	
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
	<script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/locale/easyui-lang-es.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="imagenes/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body >


     <div class="limiter">
		<div class="container-login100" style="background-image: url('imagenes/paisaje.jpg');" >
			<div class="wrap-login100">
				<form class="login100-form validate-form"id="ff" method="post"
          onsubmit="return submitForm();">
					<span class="login100-form-logo">
						<i ><img src="imagenes/descarga.png"   height="60px"  > </img></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
                    Ingreso al Sistema
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese el usuario">
						<input class="input100" required="true" type="text" name="txtusuario" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese la contraseña">
						<input class="input100"required="true" type="password" name="txtpassword" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recuerda mis datos
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" form="ff" color=purple value="Continue" style="width:80px" >
							Acceder
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
    <?php 
     session_start();
     unset(  $_SESSION['usuario'] );
     $mensaje=" ";

       if( isset($_POST["txtusuario"]) &&  isset($_POST["txtpassword"])   )
        {
            $txtusuario =   $_POST['txtusuario'];
            $txtpassword =   $_POST['txtpassword']; 
            $sql = "SELECT * FROM  login where
             usuario='$txtusuario' and contraseña='$txtpassword' ";
$usuario_correcto = "123";
$palabra_secreta_correcta = "123";
if ($txtusuario === $usuario_correcto && $txtpassword=== $palabra_secreta_correcta) {
   
    session_start();
    
    $_SESSION["usuario"] = $usuario;
    
    header("Location: coneccion.php");
} else {
    
    //echo '<script language="javascript">alert("Usuario y Clave Incorrecto");</script>';
                //$mensaje ="Las credenciales ingresadas no coinciden con los datos ya existentes";
}
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
        }
	
    ?>
    <div> <?php  echo  $mensaje;?>   </div>
  
    <script>
        function submitForm(){            
            var isvalid = $( "#ff" ).form('validate'); 
            return isvalid;
        }
     
    </script>
	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>

</html>