
<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = " sp_buscarrera '$id' ";
    $resultado = sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($resultado);
  
}
?>
<div id="p" class="easyui-panel" title="Buscar Carrera" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           

<div  style="margin-bottom:5px">
            <select id="yourid"  name ="nombrecarrera"  labelPosition="top"required="true" class="easyui-combobox" 
            style="width:30%;"  data-options="
                    url:'controlador/editcare.php?op=selectcombo',
                    method:'get',
                    valueField:'nombrecarrera',
                    
                    textField:'nombrecarrera',
                    panelHeight:'auto',
                    label: 'Nombre de la carrera(*)',
                    labelWidth:'160px'
                    ">               
            </select>
        </div>
        



  
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="editUser()" style="width:90px">BUSCAR</a>
        
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
                window.location.href ='main.php?pag=editcarrera1&id='+row;  
               
            }
        }
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/editconsultor.php?op=select',
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
                            msg: '??se ha agregado con exito a la base!'
                        });
                      //  window.location.href= 'main.php?pag=newlist';
                }
            }); 
        }
        
    </script>    