<?php
require ('controlador/coneccionjohn.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso de Consultor" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
            <div style="margin-bottom:5px">
                <input name="dni" labelPosition="top" class="easyui-textbox" required="true" label="Dni Consultor seguimiento: " style="width:15%" >
            </div> 
                    
            <div style="margin-bottom:5px">
                <input name="nombres" labelPosition="top" class="easyui-textbox" required="true" label=" Nombres:" style="width:25%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="apellidos" labelPosition="top" class="easyui-textbox" required="true" label=" Apellidos: " style="width:25%" >
            </div> 
        
        <div style="margin-bottom:5px">
                <input name="direccion" labelPosition="top" class="easyui-textbox" required="true" label=" Direccion: " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="correo" labelPosition="top" class="easyui-textbox" required="true" label=" Correo: " style="width:25%" >
            </div> 
            
            <div style="margin-bottom:5px">
                <input name="edad" labelPosition="top" class="easyui-numberbox" required="true" label=" Edad:"  style="width:15%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="telefono" labelPosition="top" class="easyui-textbox" required="true" label=" Telefono: " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="celular" labelPosition="top" class="easyui-textbox" required="true" label=" Celular: " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulosegundonivel" labelPosition="top" class="easyui-textbox" required="true" label=" Titulo segundo nivel: " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulotercernivel" labelPosition="top" class="easyui-textbox" required="true" label=" Titulo tercer nivel: " style="width:25%" >
            </div> 
                      
        
            <div  style="margin-bottom:5px">
           
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
    </div>   
    </div>
    
 
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
                    
                }
            }); 
        }
        
    </script>    