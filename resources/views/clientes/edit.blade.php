@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Editar: <b>{{$cliente->nombre}}</b></h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" name="cliente-edit-form" action="{{ route('clientes.update', $cliente->id) }}">
        @method('PATCH')
        @csrf
        <div class="row ">
          <div class="form-group col-md-4">
             
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"  value='{{ $cliente->nombre }}' required/>
          </div>
          <div class="form-group col-md-4">
            <label for="cuit">CUIT :</label>
            <input type="text" class="form-control"  value='{{ $cliente->cuit }}' name="cuit"/>
        </div>
      </div>
      <div class='row'>
          <div class="form-group col-md-4">
              <label for="direccion">Direccion :</label>
              <input type="text" class="form-control"  value='{{ $cliente->direccion }}' name="direccion"/>
          </div>
          <div class="form-group col-md-4">
              <label for="localidad">Localidad :</label>
              <input type="text" class="form-control" name="localidad" value='{{ $cliente->localidad }}'' placeholder="Ingrese localidad" />
          </div>
          <div class="form-group col-md-4">
              <label for="provincia">Provincia :</label>
              <!--input type="text" class="form-control" name="email"/-->
              <select class="custom-select" name="provincia" id="inputGroupSelect01">
                <option value='{{ $cliente->provincia }}' selected="selected">{{ $cliente->provincia }}</option>
                <option value="Buenos Aires">Bs. As.</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Rios">Entre Rios</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa" >La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquen">Neuquen</option>
                <option value="Rio Negro">Rio Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Sgo. del Estero">Sgo. del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucuman">Tucuman</option>
              </select>
          </div>
        </div>
        
          <!-- Incluimos la plantilla de los contactos-->
          <div style="{margin-top: 4px; margin-bottom: 2px;}">
            <label for="contactos">Contactos:</label>
            @include('shared.contactosEdit')
          </div>
          
            <div class=" p-2">
              <a href="{{ route('clientes.index')}}" class="btn btn-warning mr-2" role="button">Cancelar</a>
          
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
      </form>
  </div>
</div>

@endsection
@section('script')  

<script>
   $(document).ready(function(){
$("#cliente-edit-form").submit(function(){
  return $(this).validate();
});
})
</script>
@endsection