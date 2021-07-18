

<div id="p" class="easyui-panel" title="Ingreso de Seguimiento" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
<div  style="margin-bottom:5px">
            <select  id="cmvdb"onClick="myNewFunction(event)" name ="codseguimiento"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/seguimiento.php?op=selectcombo1',
                    method:'get',
                    valueField:'codseguimiento',
                    textField:'codseguimiento',
                    panelHeight:'auto',
                    label: 'Codigo Seguimiento (*)',
                    labelWidth:'160px'
                    ">   
                    </select> 
            </form>
 
                    <?php
require ('controlador/coneccion.php'); 
 
 
$sql = "execute sp_buscarseguimiento 's1'";
$result = sqlsrv_query($conn,$sql);
 
$row = sqlsrv_fetch_array($result);


?>           
            
           
          
            
            <div style="margin-bottom:5px">
                <input name="fecha" labelPosition="top" class="easyui-datebox" type=»text»  data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha (*)" style="width:15%" >
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
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        

    </div>   
    
     
    <script type="text/javascript">
    
  


$('#cmvdb').combobox({
	onChange: function(param){
       
  var e = document.getElementById('cmvdb').value;
  var inpCountry = e.options[e.selectedIndex];
  if(inpCountry=='s1'){
alert ("hola");
  }
		 
	}
});
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