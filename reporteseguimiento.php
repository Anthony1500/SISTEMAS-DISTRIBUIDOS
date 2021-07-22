<table id="dg" title="Reporte Seguimineto " class="easyui-datagrid" style="width:100%;height:auto; margin:10px;">
           



        <?php
        
require ('controlador/coneccion.php'); 

$query="sp_listaseguimiento";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>



        echo "<table border=2 align=center>";
        echo "";
        echo "";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="text-align: center">'.'<h3> LISTA SEGUIMIENTO</h3>'."</span>";
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


<table class="table table-bordered"style="width:30%;margin-left:auto;margin-right:auto;">
<br> <br>
 <thead >
 <tr>
 <th>Nombre</th>
 
 <th >Reporte en Excel</th >
 </tr>
 </thead>
 <tbody>
 <tr >
 <td style = "text-transform:uppercase;"><p class="thick"> Descargar reporte Seguimiento</p></td>
 
 <td style="text-align: center"><a  href="excelseguimiento.php" class="btn btn-success" toggle="tooltip"title="Da clic aquí para descargar el reporte." ><img icon="68" src="./imagenes/excel.png"  /></a></td>
 </tr>
 <tr>
 
 </tbody>
 </table>

 
</div>

</body>
</html>         

</table> 
<style type="text/css">
  p.thick {
    
    font-family: Arial, Helvetica, sans-serif;
}

</style>