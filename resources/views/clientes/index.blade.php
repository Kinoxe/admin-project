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
  <h1>Clientes</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form class="form-inline my-2 my-lg-0">
    {!! Form::open(['route'=>'clientes.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Cliente']) !!}
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
    <div class="collapse navbar-collapse justify-content-center">
      {!! $clientes->render() !!}
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> 
      @can('create client') 
      <a href="{{ route('clientes.create')}}" class="btn btn-success">Crear Cliente</a>
      @else
      <a href="{{ route('clientes.create')}}" class="btn btn-success disabled" aria-disabled="true" >Crear Cliente</a>
      @endcan
    </div>
  </nav>
  
  <table class="table table-striped table-sm">
    <thead class="bg-dark text-white">
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Cuit</td>
          <td>Telefono</td>
          <td>email</td>
          <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->cuit}}</td>
            <td>{{$cliente->contacto['telefono']}}</td>
            <td>{{$cliente->contacto['email']}}</td>
            
         
              <td class="row">
                <div class="btn-group" role="group">
                @can('show client') 
                  <a href="{{ route('clientes.show',$cliente->id)}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                @else 
                  <a href="{{ route('clientes.show',$cliente->id)}}" class="btn btn-primary btn-sm disabled mr-1" aria-disabled="true"></a>
                
                @endcan
              
              @can('edit client') 
                  <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary btn-sm  mr-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @else 
                  <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary  btn-sm disabled mr-2" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @endcan
                </div>
               <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                @can('delete client')
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Seguro quieres eliminar a {{$cliente->nombre}}?')"><i class="fa fa-trash-o fa-lg ml-1 "></i></button>
                
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
      <div class=" navbar-collapse my-2 my-lg-0 justify-content-center">
        {!! $clientes->render() !!}
      </div>
    </nav>

@endsection