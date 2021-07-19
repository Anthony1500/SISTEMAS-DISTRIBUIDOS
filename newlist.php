
<?php
require ('controlador/coneccion.php'); 


?>
<table id="dg" title="Lista de Puestos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/proyecto.php?op=selectcombo3"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="nombrefacultad" width="100">codcarrea</th>
                <th field="nombrecarrera" width="100">nombrecarrea</th>
                <th field="nivel" width="100">nivel</th>
                <th field="campodetallado" width="100">campodetallado</th>
                <th field="campoespecifico" width="100">campoespecifico</th>
                <th field="codfacultad" width="100">codfacultad</th>
                
                
                
               
            </tr>
        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:refrescar" style="width:250px">

        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
    </div>
    
  
    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href ='main.php?pag=new&id='+row.nombres;  
            }
        }
       
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     
            if (row){
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(h){
                                 
                    if (h){
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });
                        $.post('controlador/pues.php?op=delete',{codigop:row.codigop},function(result){
                            $.messager.progress('close');     
                            
                            if (result.success){
                                $('#dg').datagrid('reload');    
                            } else {
                                 
                                $('#dg').datagrid('reload');
                            }
                        },'json');
                    }
                });
            }
        }

        function refrescar(){
            $('#dg').datagrid('reload');   
        }
        function refrescar(value){
            $('#dg').datagrid('reload',{filtro:value});   
        }
    </script>
    <?php
require ('controlador/coneccion.php'); 


?>

  