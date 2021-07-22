<?php
require ('controlador/coneccion.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso Proyecto" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
<div style="margin-bottom:5px">
                <input name="codproyecto" labelPosition="top" class="easyui-textbox" required="true" label="Codigo Proyecto (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="descripcionp" labelPosition="top" class="easyui-textbox" required="true" label="Descripcion (*) " style="width:35%" >
            </div>             
            <div style="margin-bottom:5px">
                <select id="cc" label="Modalidad Proyecto (*)" labelPosition="top" style="width:15%" required="true" class="easyui-combobox"required="true" name="modalidaproyecto">
                <option  selected="selected" ></option>
                <option>PRESENCIAL</option>
                <option>SEMIPRESENCIAL</option>
                <option>DISTANCIA</option>
                <option>EN LINEA</option>
                
                
            </select>
            </div> 

           
<div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Ingreso(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required" name="fechaingresoproyecto" id="fechaingresoproyecto" required="true"title="Fecha Ingreso"style="width:15%"onblur="myFunction() >
  
</div>


        
        <div style="margin-bottom:5px">
                <input name="nivel" labelPosition="top" class="easyui-textbox" required="true" label=" Nivel (*) " style="width:15%" >
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="numerodelaresolucion_CES" labelPosition="top" class="easyui-textbox" required="true" label=" Numero Resolucion (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Resolucion(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required" name="fecharesolucion" id="fecharesolucion" required="true"title="Fecha Resolucion"style="width:15%" onblur="myFunction()">
  
</div>
            <div style="margin-bottom:5px">
                <input name="year" labelPosition="top" class="easyui-textbox" required="true" label=" Año (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="valor" labelPosition="top" class="easyui-textbox" required="true" label=" Valor (*) " style="width:15%" >
            </div> 
        
            
            <div  style="margin-bottom:5px">
            <select id="codcarrera"  name ="codcarrera"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/proyecto.php?op=selectcombo',
                    method:'get',
                    valueField:'codcarrera',
                    textField:'codcarrera',
                    panelHeight:'auto',
                    label: 'Codigo Carrera (*)',
                    labelWidth:'160px'
                    ">               
            </select>
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href='main.php?pag=proyecto' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
    </div>   
    </div>
    
    <?php
require ('controlador/coneccion.php'); 

$query="sp_listaproyecto";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
        echo "<table border=2  align=center>";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Proyecto".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Descripcion".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Modalidad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Fecha Ingreso".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nivel".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Numero Resolucion".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Fecha Resolucion".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Año".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Valor".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Carrera".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            
            echo '<tr>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['codproyecto'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['descripcionp'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['modalidaproyecto'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['fechaingresoproyecto']->format('Y-m-d').'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['nivel'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['numerodelaresolucion_CES'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['fecharesolucion']->format('Y-m-d').'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['year'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['valor'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['codcarrera'].'</h6></font></td>';
            echo '</tr>';           
        }
        


?>
 

 <script type="text/javascript">
   
 
   function myFunction(){
     var date = $('#fechaingresoproyecto').val();
     var date1 = $('#fecharesolucion').val();
     if(Date.parse(date)){
       if(date > date1){
         alert('La Fecha Resolucion  no puede ser menor a la Fecha Ingreso ');
         $('#fecharesolucion').val("");
       }
     }
   }
   
       
       $('#cc').combobox({
           
           
           panelHeight:'150',
           
           onSelect: function(rec)
           {
            
           }
       });
       function limpiar(){
        document.getElementById("frmpro").reset();
       }
    function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/proyecto.php?op=insert',
                onSubmit: function(){
                    var esvalido =  $(this).form('validate');
                    if( esvalido){
                        $.messager.progress({
                       title:'Por favor espere',
                      msg:'Cargando datos...'
                      });
                    }
                    return esvalido;
                },
                success: function(result){                   
                    $.messager.progress('close');
                   // var result = eval('('+result+')');
                   // console.log(result);                  
                   $.messager.show({
                            title: 'exito',
                            msg: '¡se ha agregado con exito a la base!'
                        });
                        window.location.href= 'main.php?pag=proyecto';
                }
            }); 
        }
        
    </script>    