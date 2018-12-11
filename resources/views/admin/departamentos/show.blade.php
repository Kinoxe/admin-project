@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>departamento: <b>{{ $departamento->nombre }}</b></h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    <div class="row">
    <div class="col-sm-9">
        <ul>
            <li >id :     <b> {{ $departamento->id }} </b></li> 
            <li >Nombre :<b> {{ $departamento->nombre }} </b></li>     
            <li >Abreviatura :<b> {{ $departamento->abreviatura }}</b></li>
            <li >Encargado :<b> {{ $departamento->encargado }}</b></li>
        </ul>
    </div>
        <div class="col-sm-3">
            
            @can('edit departamento') 
                <a href="{{ route('departamentos.edit',$departamento->id)}}" class="btn btn-primary btn-lg btn-block" ><i class="fa fa-pencil" aria-hidden="true"> </i> Editar</a>
            @else 
                <a href="{{ route('departamentos.edit',$departamento->id)}}" class="btn btn-primary btn-lg btn-block  disabled" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"> </i> Editar</a>
            @endcan
            
            <form action="{{ route('departamentos.destroy', $departamento->id)}}" method="post">
                @can('delete departamento')
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-lg btn-block mt-2" type="submit" onclick="return confirm('¿Seguro quieres eliminar a {{$departamento->nombre}}?')"><i class="fa fa-trash-o fa-lg"> </i> Eliminar</button>
          
             @else 
                <button class="btn btn-danger btn-lg btn-block mt-2" type="submit" disabled><i class="fa fa-trash-o fa-lg"> </i> Eliminar</button>
            @endcan
           
            
            </form> </div>
           
          
      </div>
    </div>
       
        <a href="{{ route('departamentos.index')}}" class="btn btn-warning btn-lg btn-block" ><i class="fa fa-arrow-left" aria-hidden="true"></i> </i> Volver</a>
</div>
@endsection