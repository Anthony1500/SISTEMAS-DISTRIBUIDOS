<?php
require ('controlador/coneccion.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso de Consultor" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
            <div style="margin-bottom:5px">
                <input name="dni" labelPosition="top" class="easyui-textbox" required="true" label="Dni Consultor seguimiento (*) " style="width:15%" >
            </div> 
                    
            <div style="margin-bottom:5px">
                <input name="nombres" labelPosition="top" class="easyui-textbox" required="true" label=" Nombres (*)" style="width:25%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="apellidos" labelPosition="top" class="easyui-textbox" required="true" label=" Apellidos (*) " style="width:25%" >
            </div> 
        
        <div style="margin-bottom:5px">
                <input name="direccion" labelPosition="top" class="easyui-textbox" required="true" label=" Direccion (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="correo" labelPosition="top" class="easyui-textbox" required="true" label=" Correo (*) " style="width:25%" >
            </div> 
            
            <div style="margin-bottom:5px">
                <input name="edad" labelPosition="top" class="easyui-numberbox" required="true" label=" Edad (*)"  style="width:15%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="telefono" labelPosition="top" class="easyui-textbox" required="true" label=" Telefono (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="celular" labelPosition="top" class="easyui-textbox" required="true" label=" Celular (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulosegundonivel" labelPosition="top" class="easyui-textbox" required="true" label=" Titulo segundo nivel (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulotercernivel" labelPosition="top" class="easyui-textbox" required="true" label=" Titulo tercer nivel (*) " style="width:25%" >
            </div> 
                      
        
            <div  style="margin-bottom:5px">
           
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        
    </div>   
    </div>
    <p></p>
        <?php
require ('controlador/coneccion.php'); 

$query="SELECT * FROM consultor";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
        echo "<table border=2  align=center>";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."DNI".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nombres".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Apellidos".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Direccion".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Correo".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Edad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Telefono".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Celular".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Titulo segundo nivel".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Titulo tercer nivel".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['dni'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['nombres'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['apellidos'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['direccion'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['correo'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['edad'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['telefono'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['celular'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['titulosegundonivel'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['titulotercernivel'].'</h6></font></td>';
            echo '</tr>';           
        }
        


?>
 
    <script type="text/javascript">
       
       function limpiar(){
        document.getElementById("frmpro").reset();
       }
   
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/consultor.php?op=insert',
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
                        window.location.href= 'main.php?pag=newconsultor';
                }
            }); 
        }
        
    </script>    