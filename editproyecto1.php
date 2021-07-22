
<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = " sp_buscarproyecto '$id' ";
    $resultado = sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($resultado);
  
}
?>


<div id="p" class="easyui-panel" title="Buscar Proyecto" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

<div  style="margin-bottom:5px">
            <select id="yourid"  name ="codproyecto"  labelPosition="top"required="true" class="easyui-combobox" 
            style="width:30%;"  data-options="
                    url:'controlador/p.php?op=selectcombo',
                    method:'get',
                    valueField:'codproyecto',
                    textField:'codproyecto',
                    panelHeight:'auto',
                    label: 'Codigo del Proyecto(*)',
                    labelWidth:'160px'
                    ">               
            </select>
        </div>
        



  
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
    </div>   
   

    <div id="p" class="easyui-panel" title="Editar Proyecto" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


              
<div style="margin-bottom:5px">
                <input name="codproyecto" readonly=»readonly»  Value="<?php echo $row['codproyecto'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label="Codigo Proyecto (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="descripcionp" Value="<?php echo $row['descripcionp'] ?>" labelPosition="top" class="easyui-textbox" required="true" label="Descripcion (*) " style="width:35%" >
            </div>             
            <div style="margin-bottom:5px">
                <select id="cc"  label="Modalidad Proyecto (*)" labelPosition="top" style="width:15%" required="true" class="easyui-combobox"required="true" name="modalidaproyecto">
                <option   value="<?php echo $row['modalidaproyecto']?>" ><?php echo $row['modalidaproyecto']?></option>
                <option>PRESENCIAL</option>
                <option>SEMIPRESENCIAL</option>
                <option>DISTANCIA</option>
                <option>EN LINEA</option>
               
                
            </select>
            </div> 
            
    
           
<div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Ingreso(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required" name="fechaingresoproyecto"  Value="<?php echo $row['fechaingresoproyecto']->format('Y-m-d'); ?>" id="fechaingresoproyecto" required="true"title="Fecha Ingreso"style="width:15%"onblur="myFunction() >
  
</div>


        
        <div style="margin-bottom:5px">
                <input name="nivel" Value="<?php echo $row['nivel'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label=" Nivel (*) " style="width:15%" >
            </div> 

                      
            <div style="margin-bottom:5px">
                <input name="numerodelaresolucion_CES" Value="<?php echo $row['numerodelaresolucion_CES'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label=" Numero Resolucion (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Resolucion(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required" name="fecharesolucion" Value="<?php echo $row['fecharesolucion']->format('Y-m-d'); ?>"  id="fecharesolucion" required="true"title="Fecha Resolucion"style="width:15%" onblur="myFunction()">
  
</div>
            <div style="margin-bottom:5px">
                <input name="year" labelPosition="top" Value="<?php echo $row['year'] ?>" class="easyui-textbox" required="true" label=" Año (*) " style="width:15%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="valor" labelPosition="top" Value="<?php echo $row['valor'] ?>" class="easyui-textbox" required="true" label=" Valor (*) " style="width:15%" >
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
                    <option   value="" ><?php echo $row['codcarrera']?></option>            
            </select>
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
      
       
    </div>   
    </div>
    
  
 

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
   function editUser(){ 
            var row =  $('#yourid').combobox('getValue',{
	onChange: function(param){

	}
});    
            if (row){
                window.location.href ='main.php?pag=editproyecto1&id='+row;  
               
            }
        }

       
       
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
                url: 'controlador/p.php?op=update',
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
