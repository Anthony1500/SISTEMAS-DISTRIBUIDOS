
<div id="p" class="easyui-panel" title="Reporte Seguimiento por Proyecto" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

<div  style="margin-bottom:5px">
            <select id="yourid"  name ="codproyecto"  labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/p.php?op=selectcombo',
                    method:'get',
                    valueField:'codproyecto',
                    textField:'codproyecto',
                    panelHeight:'auto',
                    label: 'Codigo del Proyecto(*)',
                    labelWidth:'160px'
                    ">               
            </select>
        </div>
        



  
      </form>
      <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
    </div>   
   

   

<?php

   require ('controlador/coneccion.php'); 
   
       $id=$_GET["id"];
       $sql = "execute sp_seguixpro '$id'";
       $resultado = sqlsrv_query($conn,$sql);
       
       
           
       
        
               
                //se desplegaran los resultados en la tabla
                //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
        
        
        
                echo "<table border=2 align=center>";
                echo "";
                echo "";
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="text-align: center">'.'<h3> LISTA SEGUIMIENTO POR PROYECTO</h3>'."</span>";
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
         <script type="text/javascript">
   
 
 
       function editUser(){ 
            var row =  $('#yourid').combobox('getValue',{
	onChange: function(param){

	}
});    
            if (row){
               window.location.href ='main.php?pag=seguimientoxproyecto&id='+row;  
               
            }
        }

        </script>