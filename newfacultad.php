

<div id="p" class="easyui-panel" title="Ingreso de Facultades" style="width:100%;height:100%; ">
<form id="usuario" method="post"     style="margin:0;padding:20px 50px">
       
       
           

            <div style="margin-bottom:5px">
                <input name="codfacultad" labelPosition="top" class="easyui-textbox" required="true" label="Codigo de la Facultad (*)" style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="nombrefacultad" labelPosition="top" class="easyui-textbox" required="true" label="Nombre de la Facultad (*)" style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="decano" labelPosition="top" class="easyui-textbox" required="true" label="Decano (*)" style="width:25%" >
            </div>              
            <div style="margin-bottom:5px">
                <input  name="lugar" labelPosition="top" class="easyui-textbox" required="true" label="Lugar (*)" style="width:25%" >
            </div> 
        
        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=newfacultad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>

        <p></p>
        <?php
require ('controlador/coneccion.php'); 

$query="sp_listafacultad";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        
        echo "<table border=2 align=center>";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Codigo Facultad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nombre".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Decano".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Lugar".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['codfacultad'].'</h6></font></th>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['nombrefacultad'].'</h6></font></th>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['decano'].'</h6></font></th>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['lugar'].'</h6></font></th>';
            echo '</tr>';           
        }
        


?>

    </div>   
    </div>
    
 
    <script type="text/javascript">
       
      
        function saveUser(){              
           $('#usuario').form('submit',{
                url: 'controlador/facultad.php?op=insert',
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
                        window.location.href= 'main.php?pag=newfacultad';
                }
            }); 
        }
    </script>    
    
 
