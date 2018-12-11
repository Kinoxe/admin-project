@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 20px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Editar: <b>{{$departamento->nombre}}</b></h1>
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
      <form method="post" name="departamento-edit-form" action="{{ route('departamentos.update', $departamento->id) }}">
        @method('PATCH')
        @csrf
        <div class="row ">
          <div class="form-group col-md-4">
             
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"  value='{{ $departamento->nombre }}' required/>
          </div>
          <div class="form-group col-md-4">
            <label for="abreviatura">Abreviatura :</label>
            <input type="text" class="form-control"  value='{{ $departamento->abreviatura }}' name="abreviatura" required/>
        </div>
      </div>
      <div class='row'>
          <div class="form-group col-md-4">
              <label for="encargado">Encargado :</label>
              <!--input type="text" class="form-control" name="email"/-->
              <select class="custom-select" name="encargado" id="inputGroupSelect01">
                @foreach ($users as $user)
                    @if ($user->id == $departamento->encargado)
                        <option value='{{ $departamento->encargado }}' selected="selected">{{ $user->name }}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option> 
                    @endif                    
                @endforeach
              </select>
          </div>
        </div>
        
          
          
            <div class=" p-2">
              <a href="{{ route('departamentos.index')}}" class="btn btn-warning mr-2" role="button">Cancelar</a>
          
              <button type="submit" class="btn btn-success" onclick="return confirm('¿Confirma edicion de {{$departamento->nombre}}?')">Guardar</button>
            </div>
          </div>
      </form>
  </div>
</div>

@endsection
@section('script')  

<script>
   $(document).ready(function(){
$("#departamento-edit-form").submit(function(){
  return $(this).validate();
});
})
</script>
@endsection