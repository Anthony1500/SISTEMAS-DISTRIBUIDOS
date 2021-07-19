<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<title>Manu</title>
	
	<link rel="icon" type="image/png" href="imagenes/icons/img.png"/>
    <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery-easyui-1.8.8/locale/easyui-lang-es.js"></script>
    <link href="./main.css" rel="stylesheet">
    <link href="./icon.css" rel="stylesheet">
</head>


<body class="easyui-layout">
          
 
        <div data-options="region:'north'" style="height:60px"> 
        <img src="imagenes/uti-logo.jpg"   height="50px"  > </img>      
        <a class="boton_personalizado" href="index.php"> Salir </a>
         <div class="titulousuario">
		 <a style="color:blue";>

         
          </a>
         </div> 

        </div>

        
       
		<div data-options="region:'west',split:true" title="Menu" style="width: 252.583px; height: 737.233px;">
	
               
                                
		
		
		
                        
                                     
                 
        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                             <li  class="app-sidebar__heading">&nbsp;&nbsp;Ingresar</li>
                                <li>
                                <a href="main.php?pag=newlogin">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Login
                                    </a>
                                  <a href="main.php?pag=newcarrera">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Carrera
                                    </a>
                                    <a href="main.php?pag=newconsultor">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Consultor
                                    </a>
                                    <a href="main.php?pag=newfacultad">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Facultad
                                    </a>
                                    <a href="main.php?pag=proyecto">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Proyecto
                                    </a>
                                    <a href="main.php?pag=newseguimiento">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingresar Seguimiento
                                    </a>
                                </li>
                                <li  class="app-sidebar__heading">&nbsp;&nbsp;Editar</li>
                                <li>
                                <a href="main.php?pag=newlist">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Lista
                                    </a>
                                <a href="main.php?pag=editcarrera">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Editar Carrera
                                    </a>
                                    <a href="main.php?pag=editcon">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Editar Consultor
                                    </a>
                                    <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Editar Facultad
                                    </a>
                                    <a href="main.php?pag=1">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Editar Proyecto
                                    </a>
                                    <a href="main.php?pag=updateseguimiento">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Editar Seguimiento
                                    </a>
                                </li>
                                
                               
                                <li class="app-sidebar__heading">&nbsp;&nbsp;Reportes</li>
                                <li>
                                <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Reporte Carrera
                                    </a>
                                    <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Reporte Consultor
                                    </a>
                                    <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Reporte Consultor
                                    </a>
                                    <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Reporte Proyecto
                                    </a>
                                    <a href="main.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Reporte Seguimiento
                                    </a>                            
                                </li>
                                
                            </ul>
                        </div>
        </div>
        <div data-options="region:'center' ">
		<?php
		if(  isset($_GET["pag"])){
			$page = $_GET["pag"];	
			$page = $page.".php";
			include ($page);
		}	
		//iconos en esta web: https://icomoon.io/app/#/select
			?>
	
	
        </div>
 
        <script type="text/javascript" src="./assets/scripts/main.js"></script>
        <style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 10px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
</style>
</body>
</html>