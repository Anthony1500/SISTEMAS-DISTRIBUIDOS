<?php
require ('controlador/coneccion.php'); 
?>
<div id="p" class="easyui-panel" title="Ingreso de Consultor" style="width:100%;height:100%; ">
<form id="frmpro" method="post" class="needs-validation"  style="margin:0;padding:20px 50px">
           


              
            <div style="margin-bottom:6px" >
            <label for="title" id="title">Dni Consultor seguimiento (<span style="color:red;">*</span>)</label> 
              <input type="number" class="form-control form-control-sm  "  name="dni" id="dni" required title="Inreso Maximo de 10 numeros"style="width:25%"onkeypress="return onlyNumberKey(event)"maxlength="10" onblur="myFunction()"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"required>
              
            </div > 
         
            
            <div style="margin-bottom:6px" >
            <label for="title" id="title"> Nombres (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="nombres" id="nombres" required title=" Nombres"style="width:25%">
            </div > 
                  
            <div style="margin-bottom:6px" >
            <label for="title" id="title">Apellidos (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="apellidos" id="apellidos" required title="Apellidos"style="width:25%"required>
            </div > 
        
            <div style="margin-bottom:6px" >
            <label for="title" id="title">  Direccion (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="direccion" id="direccion" required="true" title=" Nombres"style="width:25%"required>
            </div > 

            
             <div style="margin-bottom:6px" >
            <label for="title" id="title">  Correo (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="correo" id="correo" required="true" title=" Correo"style="width:25%"required>
            </div > 
           
            <div style="margin-bottom:6px" >
            <label for="title" id="title">Edad (<span style="color:red;">*</span>)</label> 
              <input type="number" class="form-control form-control-sm  "  name="edad" id="edad" required title="Inreso Maximo de 2 digitos"style="width:15%"onkeypress="return onlyNumberKey(event)"maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"required>
            </div >
           
            <div style="margin-bottom:6px" >
            <label for="title" id="title">Telefono (<span style="color:red;">*</span>)</label> 
              <input type="number" class="form-control form-control-sm  "  name="telefono" id="telefono" required title="Inreso Maximo de 10 digitos"style="width:15%"onkeypress="return onlyNumberKey(event)"maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div >
          
            <div style="margin-bottom:6px" >
            <label for="title" id="title">Celular (<span style="color:red;">*</span>)</label> 
              <input type="number" class="form-control form-control-sm  "  name="celular" id="celular" required title="Inreso Maximo de 10 digitos"style="width:15%"onkeypress="return onlyNumberKey(event)"maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div >
            
            <div style="margin-bottom:6px" >
            <label for="title" id="title"> Titulo segundo nivel (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="titulosegundonivel" id="titulosegundonivel" required title=" Titulo segundo nivel"style="width:25%">
            </div > 
            <div style="margin-bottom:6px" >
            <label for="title" id="title"> Titulo tercer nivel (<span style="color:red;">*</span>)</label> 
              <input type="text" class="form-control form-control-sm  "  name="titulotercernivel" id="titulotercernivel" required title=" Titulo tercer nivel"style="width:25%">
            </div > 
            
                      
        
            <div  style="margin-bottom:5px">
           
      
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" type="submit" onclick="saveUser()" style="width:90px">Guardar</a>
        
    </div>   
    </div>
    <p></p>
        <?php
require ('controlador/coneccion.php'); 

$query="sp_listacon";

        $resultado=sqlsrv_query($conn, $query);
        //se desplegaran los resultados en la tabla
        //<a  href='main.php?pag=newconsultor' class="easyui-linkbutton" onclick="limpiar()" iconCls="icon-remove" style="width:90px">Limpiar</a>
       
        echo "<table border=2  align=center>";
        echo "<tr>";
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."DNI".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Nombres".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Apellidos".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Direccion".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Correo".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Edad".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Telefono".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Celular".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Titulo segundo nivel".'</h6></font></th>';
        echo '<th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">'."Titulo tercer nivel".'</h6></font></th>';
        echo "</tr>";

        while($row=sqlsrv_fetch_array($resultado)){
            echo '<tr>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['dni'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['nombres'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['apellidos'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['direccion'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['correo'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['edad'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['telefono'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['celular'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['titulosegundonivel'].'</h6></font></td>';
            echo '<td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center">'.$row['titulotercernivel'].'</h6></font></td>';
            echo '</tr>';           
        }
        


?>
 
    <script type="text/javascript">
   (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('#frmpro');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
        
     function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
   function myFunction(){
     var dni = $('#dni').val();
     dni.required = true 
       
    
   }
     
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/consultor.php?op=insert',
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