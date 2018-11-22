<div class="row p-2 bg-dark text-white">
    <div class="col-md-3">  Nombre Contacto</div>
    <div class="col-md-3">  Telefono</div>
    <div class="col-md-3">  E-mail</div>
    <div class="col-md-2">  
        <div class="well btn-block">
            <button id="btn-contacto-agregar" class="btn btn-primary " type="button">Agregar Contacto</button>                
        </div>
   
    </div>  
</div>   
<div id="contactos"  class="p-2  border">
    <!--se copiara lo  siguiente presionando el boton agregar-->
        
    <div id="lo-que-vamos-a-copiar">
        <div class=" row ">            
                <div class="form-group col-md-3">
                    <input type="text" name="contacto-nombre[]" class="form-control" placeholder="Ingrese nombre"  required/>
                </div>
    
                <div class="form-group col-md-3">
                    <input type="text" name="contacto-telefono[]" class="form-control" value="" placeholder="Ingrese telefono" />
                </div>
    
                <div class="form-group col-md-3">
                    <input type="text" name="contacto-email[]" class="form-control" value="" placeholder="Ingrese correo electrónico"  />
                </div>
               <div class="well well-sm col-md-2"></div>
         
        </div>            
    </div>
</div>
   
        
    

@section('script')  
<script>
    $(document).ready(function(){
            
        // El formulario que queremos replicar
        var formulario_contacto = $("#lo-que-vamos-a-copiar").html();
            
        // El encargado de agregar más formularios
        $("#btn-contacto-agregar").click(function(){
        // Agregamos el formulario
        $("#contactos").prepend(formulario_contacto);
    
        // Agregamos un boton para retirar el formulario
        $("#contactos .row:first .well ").append('<button class="btn-danger btn btn-block btn-retirar-contacto" type="button">Retirar</button>');
    
        // Hacemos focus en el primer input del formulario
        $("#contactos .row:first  input:first").focus();
        });
            
        // Cuando hacemos click en el boton de retirar
        $("#contactos").on('click', '.btn-retirar-contacto', function(){
            $(this).closest('.row').remove();
        })
                
        })
    </script>
@endSection