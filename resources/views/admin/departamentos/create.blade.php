@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar departamento
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
    @if(session()->get('error'))
    <div class="alert alert-warning">
      {{ session()->get('error') }}  
    </div><br />
  @endif
      <form method="post" id="departamento-form" name="departamento-form" action="{{ route('departamentos.store') }}">
        @csrf
        <div class="row ">
            <div class="form-group col-md-4">
               
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre"  value="{{ old('nombre') }}" required/>
            </div>
            <div class="form-group col-md-4">
              <label for="abreviatura">Abreviatura :</label>
              <input type="text" class="form-control"   name="abreviatura" value="{{ old('abreviatura') }}" required/>
          </div>
        </div>
      <div class='row'>
        
          <div class="form-group col-md-4">
            <label for="encargado">Encargado :</label>
            <!--input type="text" class="form-control" name="email"/-->
            <select class="custom-select" name="encargado" id="inputGroupSelect01">
              @foreach ($users as $user)
                  
                      <option value="{{$user->id}}">{{$user->name}}</option> 
                                    
              @endforeach
            </select>
        </div>
      </div>
        </div>
        
          
            <div class=" p-2">
              <a href="{{ route('departamentos.index')}}" class="btn btn-warning mr-2" role="button">Cancelar</a>
          
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
$("#departamento-form").submit(function(){
  return $(this).validate();
});
})
</script>
@endsection