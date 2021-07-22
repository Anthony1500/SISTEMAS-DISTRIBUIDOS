<table id="dg" title="Reporte Facultad " class="easyui-datagrid" style="width:100%;height:auto; margin:10px;">
           



        <?php
        
require ('controlador/coneccion.php'); 

$query="sp_listafacultad";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>



        echo "<table border=2 align=center>";
        echo "";
        echo "";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="text-align: center">'.'<h3> LISTA FACULTAD</h3>'."</span>";
        echo "";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Facultad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nombre Facultad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Decano".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Lugar".'</h6></font></th>';
         echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['codfacultad'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['nombrefacultad'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['decano'].'</h6></font></td>';
            echo '<td><font color="#4472bb"face="Comic Sans MS,arial"><h6 align="center">'.$row['lugar'].'</h6></font></td>';
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
 <td style = "text-transform:uppercase;"><p class="thick"> Descargar reporte Facultad</p></td>
 
 <td style="text-align: center"><a  href="excelfacultad.php" class="btn btn-success" toggle="tooltip"title="Da clic aquí para descargar el reporte." ><img icon="68" src="./imagenes/excel.png"  /></a></td>
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