
<div id="p" class="easyui-panel" title="Reporte Seguimento por Proyecto" style="width:100%;height:100%; ">
<form id="frm" method="post"     style="margin:0;padding:20px 50px">
           


        <div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Inicial(<span style="color:red;">*</span>)</label> 
  <input type="date"   class="form-control date required"  id="inicial" required="true"title="Fecha Inicial"style="width:15%"onblur="myFunction()" >
  
</div>
<div style="margin-bottom:5px" > 
  <label for="title" id="title">Fecha Final(<span style="color:red;">*</span>)</label> 
  <input type="date" class="form-control date required"  id="final" required="true"title="Fecha Final"style="width:15%"onblur="myFunction()" >
  
</div>


  
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok"  onclick="buscar()" style="width:90px">BUSCAR</a>
        
    </div>   
    </div>
    <p></p>




          
   

        
        
    
   
 
    <script type="text/javascript">
    
   

function limpiar(){
        document.getElementById("frmpro").reset();
       }
      
        function buscar(){ 
    var row = $('#inicial').val();
     var row1 = $('#final').val();
              
                window.location.href ='main.php?pag=fechasseguimiento&f1='+row+'&f2='+row1; 
    
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
                            msg: '¡se ha agregado con exito a la base!'
                        });
                      //  window.location.href= 'main.php?pag=newlist';
                }
            }); 
        }
        
    </script>    