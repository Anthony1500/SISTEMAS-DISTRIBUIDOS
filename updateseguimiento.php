
<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM propietario where prop_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Datos Propietario" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           
<div style="margin-bottom:5px">
                <input name="fecha" labelPosition="top" class="easyui-datebox" type=»text» value="<?php echo $row ['fecha']?>" data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha (*)" style="width:15%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="detalle" labelPosition="top" class="easyui-textbox"value="<?php echo $row ['detalle']?>" required="true" label=" Detalle (*) " style="width:25%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="porcentaje" labelPosition="top" class="easyui-numberbox" required="true" label=" Porcentaje (*)"  style="width:15%" >
            </div>
        
        <div style="margin-bottom:5px">
                <input name="estado" labelPosition="top" class="easyui-textbox" required="true" label=" Estado (*) " style="width:25%" >
            </div> 
                      
        
            
            <div  style="margin-bottom:5px">
            <select id="codproyecto"  name ="codproyecto"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/seguimiento.php?op=selectcombo',
                    method:'get',
                    valueField:'codproyecto',
                    textField:'codproyecto',
                    panelHeight:'auto',
                    label: 'Codigo Proyecto (*)',
                    labelWidth:'160px'
                    ">               
            </select>
            
        
         
       

            
           
            

        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
       $('#cc').combobox({
           
           
           panelHeight:'166',
           
           onSelect: function(rec)
           {
            
           }
       });
      
        function saveUser(){              
           $('#frmequipo').form('submit',{
                url: 'controlador/usuario.php?op=update',
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
                            msg: result
                        });
                    window.location.href= 'main.php?pag=listapropietario';
                }
            }); 
        }
        
    </script>    
    
 