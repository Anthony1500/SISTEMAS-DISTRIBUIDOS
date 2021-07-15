<?php
require ('controlador/coneccion.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso de Seguimiento" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
            <div style="margin-bottom:5px">
                <input name="codseguimiento" labelPosition="top" class="easyui-textbox" required="true" label="Codigo seguimiento: " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="fecha" labelPosition="top" class="easyui-datebox" type=»text»  data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha:" style="width:15%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="detalle" labelPosition="top" class="easyui-textbox" required="true" label=" Detalle " style="width:25%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="porcentaje" labelPosition="top" class="easyui-numberbox" required="true" label=" Porcentaje:"  style="width:15%" >
            </div>
        
        <div style="margin-bottom:5px">
                <input name="estado" labelPosition="top" class="easyui-textbox" required="true" label=" Estado: " style="width:25%" >
            </div> 
                      
        
            
            <div  style="margin-bottom:5px">
            <select id="codproyecto"  name ="codproyecto"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/seguimiento.php?op=selectcombo',
                    method:'get',
                    valueField:'codproyecto',
                    textField:'codproyecto',
                    panelHeight:'auto',
                    label: 'Codigo Proyecto:',
                    labelWidth:'160px'
                    ">               
            </select>
      </form>
   

      


        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        

    </div>   
    </div>
    <?php
    //<a  href='main.php?pag=newseguimiento' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
   require ('controlador/coneccion.php'); 
 
    //$prop_id = $_POST['prop_id'];   
    
 
    $sql = "select * from seguimiento ORDER BY codseguimiento "; 
    $result= sqlsrv_query($conn,$sql); 
    
    $totalFilas=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
    if($totalFilas == 0){   
        ?>
     <script language="javascript">alert("El usuario no tiene datos");
        
        </script>
        
        <?php
        }else{
    ?>
<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">Datos del Seguimiento.</h6></font></th>
    <table style="margin: 0 auto;width: 50%;height: 100px;" border="2"  >
    <tr><th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">N#</h6></font></th><th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">Codigo Seguimiento</h6></font></th><th ><font color="Black"face="Comic Sans MS,arial"><h6 align="center">Fecha</h6></font></th>
<th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Detalle </h6></font></th><th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Porcentaje</h6></font></th><th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Estado</h6></font></th><th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Codigo Proyecto</h6></font></th></tr>
    
    <?php
    
    $index = 1;
    
    while($impresion=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        
        ?>
    
   

<tr><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $index; ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['codseguimiento'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['fecha']->format('Y-m-d'); ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['detalle'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['porcentaje'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['estado'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['codproyecto'] ?></h6></font></td></tr>
<?php
$index ++;
}}
sqlsrv_free_stmt($result);
?>
</table>



<table style="margin: 0 auto;" >


<thead> 
 
 

 </thead>
     <?php
      
         ?>
     
   
</tr>
</thead>


 

 <?php



?>
 </table>
 


 
 
         <?php
   



?>












 
    <script type="text/javascript">
       
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
                url: 'controlador/seguimiento.php?op=insert',
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
                        window.location.href= 'main.php?pag=newseguimiento';
                }
            }); 
        }
        
    </script>