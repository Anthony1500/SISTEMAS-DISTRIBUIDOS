<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = " sp_buscarfacultad '$id' ";
    $resultado = sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($resultado);
  
}
?>
<div id="p" class="easyui-panel" title="Buscar Facultad" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

<div  style="margin-bottom:5px">
            <select id="yourid"   name ="codfacultad"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/facultad.php?op=selectcombo1',
                    method:'get',
                    valueField:'codfacultad',
                    textField:'nombrefacultad',
                    panelHeight:'auto',
                    label: 'Codigo Facultad (*)',
                    labelWidth:'160px'
                    ">                
            </select>
            

  
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
    </div>   
    </div>
    <p></p>

 <div id="p" class="easyui-panel" title="Editar  Proyecto" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">

            <div style="margin-bottom:5px">
            <label for="title" id="title">Codigo Facultad(<span style="color: red;">*</span>)</label><p>
                <input name="codfacultad" readonly=»readonly»  Value="<?php echo $row['codfacultad'] ?>" labelPosition="top" class="easyui-textbox" required="true"  style="width:35%" >
            </div> 
            <div style="margin-bottom:5px">
            <label for="title" id="title">Descripcion(<span style="color: red;">*</span>)</label><p>
                <input name="nombrefacultad" Value="<?php echo $row['nombrefacultad'] ?>" labelPosition="top" class="easyui-textbox" required="true" style="width:35%" >
            </div>             

        
        <div style="margin-bottom:5px">
        <label for="title" id="title">Decano(<span style="color: red;">*</span>)</label><p>
                <input name="decano" labelPosition="top" Value="<?php echo $row['decano'] ?>" class="easyui-textbox" required="true"  style="width:35%" >
            </div> 
                      
            <div style="margin-bottom:5px">
            <label for="title" id="title">Lugar (<span style="color: red;">*</span>)</label><p>
                <input name="lugar" Value="<?php echo $row['lugar'] ?>" labelPosition="top" class="easyui-textbox" required="true"  style="width:35%" >
            </div> 

           
           
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        
    </div>   
    </div>
    <p></p>
    
    <script type="text/javascript">

function limpiar(){
        document.getElementById("frm").reset();
       }
      
        function editUser(){ 
            var row =  $('#yourid').combobox('getValue',{
	onChange: function(param){

	}
});    
            if (row){
                window.location.href ='main.php?pag=updatefacultad2&id='+row; 
                window.location.href ='main.php?pag=updatefacultad2&id='+row;  
               
            }
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
                url: 'controlador/facultad.php?op=update',
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