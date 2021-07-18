<?php
require ('controlador/coneccion.php'); 
 ?>   
         
<div id="p" class="easyui-panel" title="Ingreso de Seguimiento" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
      


              
<div  style="margin-bottom:5px">
            <select  id="cmvdb" name ="codseguimiento"labelPosition="top"required="true"type=»text» class="easyui-combobox" 
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
                    <div style="margin-bottom:5px">
                <input name="fecha" id="fecha" labelPosition="top" class="easyui-datebox" type=»text»  data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha (*)" style="width:15%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="detalle" id="detalle" labelPosition="top" class="easyui-textbox" required="true" label=" Detalle (*) " style="width:25%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="porcentajeavance" id="porcentajeavance" labelPosition="top" class="easyui-numberbox" required="true" label=" Porcentaje (*)"  style="width:15%" >
            </div>
        
        <div style="margin-bottom:5px">
                <input name="estado" id="estado"labelPosition="top" class="easyui-textbox" required="true" label=" Estado (*) " style="width:25%" >
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
            </form>
            <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)"  class="easyui-linkbutton c6" iconCls="icon-ok" onclick="buscar()"  style="width:90px">Buscar</a>
        

    </div>   
   
    <script type="text/javascript">
    
    $('#cmvdb').combobox({
      	onChange: function(param){
              var id=$('#cmvdb').combobox('getValue');
   $.ajax({
    url: "controlador/seguimiento.php?op=selectcombo2", 
    method: "post", 
    
    data: { "id":id},
    
   });
}     
});
     $('#cmvdb').combobox({
      	onChange: function(param){           
      var id=$('#cmvdb').combobox('getValue');   
       $.ajax ( {        
       url: "controlador/seguimiento.php?op=selectcombo2",
       type: 'post',
       data: { "id":id},
       dataType: 'JSON',
       success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){                
                var fecha1 = response[i].fecha;
                var detalle1 = response[i].detalle;
                var porcentajeavance1 = response[i].porcentajeavance;
                var estado1 = response[i].estado;
                var codproyecto1 = response[i].codproyecto;          
                

                 
                 $("#fecha").val(fecha1);
                 $("#detalle").val(detalle1);
                 $("#porcentajeavance").val(porcentajeavance1);
                 $("#estado").val(estado1);
                 $("#codproyecto").val(codproyecto1);
                 
              
                console.log(id);
                location.reload();
                
                
            }
 
}
});

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
        function buscar(){              
          
                        window.location.href= 'main.php?pag=1';
                }
           
        
        
    </script>