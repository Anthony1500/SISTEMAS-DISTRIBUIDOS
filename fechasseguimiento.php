
<div id="p" class="easyui-panel" title="Reporte Seguimiento por Fechas" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

<div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Inicial(<span style="color:red;">*</span>)</label> 
  <input type="date"   class="form-control date required"  id="inicial" required="true"title="Fecha Inicial"style="width:15%"onblur="myFunction()" >
  
</div>
<div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Final(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required"  id="final" required="true"title="Fecha Final"style="width:15%"onblur="myFunction()" >
  
</div>
        



  
      </form>
      <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
    </div>   
   




<table id="dg" title="Reporte Seguimineto por Proyecto" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;">
           


<script>
    var $f1= "<?php  echo $_GET["f1"] ?>";
    var   $f2="<?php echo $_GET["f2"] ?>";                    
    </script> 
        <?php
        
require ('controlador/coneccion.php'); 


   
       $f1=$_GET["f1"];
       $f2=$_GET["f2"];
       
       $sql = "execute sp_fechasseguimiento '$f1','$f2'";
       $resultado = sqlsrv_query($conn,$sql);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>



        echo "<table border=2 align=center>";
        echo "";
        echo "";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="text-align: center">'.'<h3> LISTA SEGUIMIENTO POR RANGO DE FECHAS</h3>'."</span>";
        echo "";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Seguimiento".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Fecha".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Detalle".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Porcentaje".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Estado".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Proyecto".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['codseguimiento'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['fecha']->format('Y-m-d').'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['detalle'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['porcentajeavance'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['estado'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['codproyecto'].'</h6></font></td>';
            echo '</tr>';           
        }
        


?>
<br> <br>



<script type="text/javascript">
 function editUser(){ 
            
   
     var row = $('#inicial').val();
     var row1 = $('#final').val();
     
       
   
     window.location.href ='main.php?pag=fechasseguimiento&f1='+row+'&f2='+row1;
              
               
            
        }
        
   
            </script>       
<style type="text/css">
  p.thick {
    
    font-family: Arial, Helvetica, sans-serif;
}

</style>