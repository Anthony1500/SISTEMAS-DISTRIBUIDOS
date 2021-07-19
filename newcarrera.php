<div id="p" class="easyui-panel" title="Ingreso de Propietario" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           

<div style="margin-bottom:5px">
                <input name="codcarrera" labelPosition="top" class="easyui-textbox" required="true" label="Codigo Carrera (*)" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="nombrecarrera" labelPosition="top" class="easyui-textbox" required="true" label="Nombre Carrera (*)" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="campoamplio" labelPosition="top" class="easyui-textbox" required="true" label="Campo Amplio (*)" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="campodetallado" labelPosition="top" class="easyui-textbox" required="true" label="Campo Detallado (*)" style="width:50%" >
            </div>
            
                      
            <div style="margin-bottom:5px">
                <input name="campoespecifico" labelPosition="top" class="easyui-textbox" required="true" label="Campo Especifico (*)" style="width:50%" >
            </div>
            
           <div  style="margin-bottom:5px">
            <select id="codfacultad"  name ="codfacultad"  labelPosition="top"required="true" class="easyui-combobox" 
            style="width:30%;"  data-options="
                    url:'controlador/carrera.php?op=selectcombo',
                    method:'get',
                    valueField:'codfacultad',
                    textField:'codfacultad',
                    panelHeight:'auto',
                    label: 'Codigo Facultad (*)',
                    labelWidth:'160px'
                    ">               
            </select>
        </div>
          
            
            

      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=newcarrera" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>

        <p></p>
        <?php
require ('controlador/coneccion.php'); 

$query="sp_lc";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        
        echo "<table border=2 align=center>";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Carrera".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nombre Carrera".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Campo Amplio".'</h6></font></th>';
        echo'<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Campo Detallado".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Campo Especifico".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Facultad".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['codcarrera'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['nombrecarrera'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['campoamplio'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['campodetallado'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['campoespecifico'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['codfacultad'].'</h6></font></td>';
            echo '</tr>';           
        }
        


?>


    </div>   
    </div>
    
 
    <script type="text/javascript">
        $('#cc').combobox({
           
           
           panelHeight:'150',
           
           onSelect: function(rec)
           {
            
           }
       });
      
        function saveUser(){    
                  
           $('#frmequipo').form('submit',{
                url: 'controlador/carrera.php?op=insert',
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
                        window.location.href= 'main.php?pag=newcarrera';
                }
            }); 
        }
        
    </script>    
    
 