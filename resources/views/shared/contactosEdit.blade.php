<div class="row p-2 bg-dark text-white">
        <div class="col-md-1">  #id</div>
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
            @for( $i = count($contactos)-1; $i >=0; $i--)
            <div class=" row "> 
                    <div class="form-group col-md-1">
                            <input type="text" name="contacto-id[]" value={{$contactos[$i]->id}}  class="form-control" readonly/>
                        </div>           
                    <div class="form-group col-md-3">
                        <input type="text" name="contacto-nombre[]" value={{$contactos[$i]->nombre}} class="form-control" placeholder="Ingrese nombre"  required/>
                    </div>
        
                    <div class="form-group col-md-3">
                        <input type="text" name="contacto-telefono[]" value={{$contactos[$i]->telefono}} class="form-control" value="" placeholder="Ingrese telefono" />
                    </div>
        
                    <div class="form-group col-md-3">
                        <input type="text" name="contacto-email[]" value={{$contactos[$i]->email}} class="form-control" value="" placeholder="Ingrese correo electrónico"  />
                    </div>
                   <div class="well well-sm col-md-2">
                    @if($i != 0)
                        <button class="btn-danger btn btn-block btn-retirar-contacto" type="button">Retirar</button>
                    @endif
                    </div>
             
            </div> 
            @endfor     
                  
        
    </div>
       
            
        
    
    @section('script')  
    <script>
        $(document).ready(function(){
                
            // El formulario que queremos replicar
            var formulario_contacto = $("#lo-que-vamos-a-copiar").html();
                
            // El encargado de agregar más formularios
            $("#btn-contacto-agregar").click(function(){
            // Agregamos el formulario
            $("#contactos").prepend(
                ' <div class="row"><div class="form-group col-md-1"><input type="text" name="contacto-id[]"  class="form-control" value="#" readonly /></div>     <div class="form-group col-md-3"><input type="text" name="contacto-nombre[]" class="form-control" placeholder="Ingrese nombre"  required/></div><div class="form-group col-md-3"><input type="text" name="contacto-telefono[]" class="form-control" placeholder="Ingrese telefono" /></div><div class="form-group col-md-3"><input type="text" name="contacto-email[]" class="form-control" placeholder="Ingrese correo electrónico"  /></div><div class="well well-sm col-md-2"><button class="btn-danger btn btn-block btn-retirar-contacto" type="button">Retirar</button></div></div>   ');
        
            // Agregamos un boton para retirar el formulario
            //$("#contactos .row:first .well ").append('<button class="btn-danger btn btn-block btn-retirar-contacto" type="button">Retirar</button>');
        
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