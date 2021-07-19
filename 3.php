<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = " sp_buscarcon '$id' ";
    $resultado = sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($resultado);
  
}
?>
<div id="p" class="easyui-panel" title="Ingreso de Consultor" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

            <div  style="margin-bottom:5px">
            <select id="yourid"   name ="nombres"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:15%;"  data-options="
                    url:'controlador/editconsultor.php?op=selectcombo',
                    method:'get',
                    valueField:'nombres',
                    textField:'nombres',
                    panelHeight:'auto',
                    label: 'Nombre consultor (*)',
                    labelWidth:'160px'
                    ">               
            </select>
            
        



  
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
    </div>   
    </div>
    <p></p>

 <div id="p" class="easyui-panel" title="Editar  Consultor" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
<div style="margin-bottom:5px">
                <input name="dni" readonly=»readonly»  Value="<?php echo $row['dni'] ?>" labelPosition="top" class="easyui-textbox" required="true" label="Dni  (solo lectura)" style="width:15%" >
            </div> 

<div style="margin-bottom:5px">
                <input name="nombres"   Value="<?php echo $row['nombres'] ?>" labelPosition="top" class="easyui-textbox" required="true" label="nombres " style="width:15%" >
            </div> 

            <div style="margin-bottom:5px">
                <input name="apellidos" labelPosition="top"  Value="<?php echo $row['apellidos'] ?>" class="easyui-textbox" required="true" label=" Apellidos (*) " style="width:25%" >
            </div> 
        
        <div style="margin-bottom:5px">
                <input name="direccion" Value="<?php echo $row['direccion'] ?>" labelPosition="top" class="easyui-textbox" required="true" label=" Direccion (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="correo" Value="<?php echo $row['correo'] ?>" labelPosition="top" class="easyui-textbox" required="true" label=" Correo (*) " style="width:25%" >
            </div> 
            
            <div style="margin-bottom:5px">
                <input name="edad" Value="<?php echo $row['edad'] ?>"  labelPosition="top" class="easyui-numberbox" required="true" label=" Edad (*)"  style="width:15%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="telefono" Value="<?php echo $row['telefono'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label=" Telefono (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="celular" Value="<?php echo $row['celular'] ?>" labelPosition="top" class="easyui-textbox" required="true" label=" Celular (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulosegundonivel" Value="<?php echo $row['titulosegundonivel'] ?>" labelPosition="top" class="easyui-textbox" required="true" label=" Titulo segundo nivel (*) " style="width:25%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="titulotercernivel" Value="<?php echo $row['titulotercernivel'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label=" Titulo tercer nivel (*) " style="width:25%" >
            </div> 

            <div  style="margin-bottom:5px">
           
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="saveUser()" style="width:90px">Guardar</a>
        
    </div>   
    </div>
    <p></p>
    
    <script type="text/javascript">

function limpiar(){
        document.getElementById("frmpro").reset();
       }
      
        function editUser(){ 
            var row =  $('#yourid').combobox('getValue',{
	onChange: function(param){

	}
});    
            if (row){
                window.location.href ='main.php?pag=3&id='+row; 
                
               
            }
        }
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/editconsultor.php?op=update',
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