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
  <h1>Clientes</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="buscar nombre" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <div class="collapse navbar-collapse justify-content-center">
      {!!$clientes->render()!!}
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> 
          
      <a href="{{ route('clientes.create')}}" class="btn btn-success">Crear Cliente</a>
    </div>
  </nav>
  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Direccion</td>
          <td>Telefono</td>
          <td>email</td>
          <td colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->email}}</td>
            <td>@can('edit client') 
                <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Edit</a>
                @else 
                no puede editar
                @endcan
              </td>
            <td>@can('delete client')
                <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @else 
                no puede eliminar
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class=" navbar-collapse my-2 my-lg-0 justify-content-center">
        {!!$clientes->render()!!}
      </div>
    </nav>

@endsection