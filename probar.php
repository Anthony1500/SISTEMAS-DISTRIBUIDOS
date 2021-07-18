<table id="dg" title="Lista seguimiento" class="easyui-datagrid" style="width:auto;height:auto; margin:10px;"
            url="controlador/seguimiento.php?op=selectcombo1"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th hidden="true"field="codseguimiento" width="25%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID Riego </th>               
                
                <th align="center"field="fecha" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Fecha</th>
                <th align="center"field="detalle" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID propiedad</th>
                <th align="center"field="porcentaje" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Dias </th>
                <th align="center"field="estado" width="12%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Horas</th>
               
                <th align="center"field="codproyecto" width="59%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Observaciones</th>
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" data-toggle="tooltip"title="Selecciona una fila para editar." onclick="editriego()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" data-toggle="tooltip"title="Selecciona una fila para borrar." onclick="destroyUser()">Eliminar</a>
        
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editterreno(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editterreno&id='+row.propro_codigo;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.propi_id;
            }
        }
        function editriego(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editriegos&id='+row.riego_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/riego.php?op=delete',{riego_id:row.riego_id},function(result){
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
        function buscar(value){
            $('#dg').datagrid('reload',{filtro:value});   
        }
    </script>

    