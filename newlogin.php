<?php
require ('controlador/coneccion.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso de Consultor" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
            <div style="margin-bottom:5px">
                <input name="login" labelPosition="top" class="easyui-textbox" required="true" label="Login: " style="width:15%" >
            </div> 
                    
            
            
            <div style="margin-bottom:5px">
                <input id="password" name="password" labelPosition="top" class="easyui-passwordbox" required="true" label="Password:" style="width:80%" >
            </div> 
            <div style="margin-bottom:5px">
                 <input  id="repassword" name="repassword"  validType="confirmPass['#password']" class="easyui-passwordbox" labelPosition="top"   iconWidth="28" required="true" label="Repetir Password:" style="width:80%" >
            </div> 
            <div  style="margin-bottom:5px">
            <select id="RoleName"  name ="RoleName"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/nuevousuario.php?op=selectcombo',
                    method:'get',
                    valueField:'RoleName',
                    textField:'RoleName',
                    panelHeight:'auto',
                    label: 'Rol:',
                    labelWidth:'160px'
                    ">               
            </select>
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href='main.php?pag=nuevousuario' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
    </div>   
    </div>
    
 
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
                url: 'controlador/user.php?op=insert',
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