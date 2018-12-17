@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(session()->get('error'))
    <div class="alert alert-warning">
      {{ session()->get('error') }}  
    </div><br />
  @endif
  <h1>Departamentos</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form class="form-inline my-2 my-lg-0">
    {!! Form::open(['route'=>'departamentos.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
      {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del departamento']) !!}
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> 
      @can('create departamento') 
      <a href="{{ route('departamentos.create')}}" class="btn btn-success">Crear Departamento</a>
      @else
      <a href="{{ route('departamentos.create')}}" class="btn btn-success disabled" aria-disabled="true" >Crear Departamento</a>
      @endcan
    </div>
  
  </nav>
  
  <table class="table table-striped table-sm">
    <thead class="bg-dark text-white">
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Abreviatura</td>
          <td>Encargado</td>
          <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($departamentos as $departamento)
        <tr>
            <td>{{$departamento->id}}</td>
            <td>{{$departamento->nombre}}</td>
            <td>{{$departamento->abreviatura}}</td>
            <td>{{$departamento->encargado}}</td>
            
         
              <td class="row">
                <div class="btn-group" role="group">              
              @can('edit departamento') 
                  <a href="{{ route('departamentos.edit',$departamento->id)}}" class="btn btn-primary btn-sm  mr-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @else 
                  <a href="{{ route('departamentos.edit',$departamento->id)}}" class="btn btn-primary  btn-sm disabled mr-2" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @endcan
                </div>
               <form action="{{ route('departamentos.destroy', $departamento->id)}}" method="post">
                @can('delete departamento')
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Seguro quieres eliminar a {{$departamento->nombre}}?')"><i class="fa fa-trash-o fa-lg ml-1 "></i></button>
                
                @else 
                  <button class="btn btn-danger btn-sm" type="submit" disabled><i class="fa fa-trash-o fa-lg ml-1"></i></button>
                @endcan
              </form>

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      
    </nav>

@endsection