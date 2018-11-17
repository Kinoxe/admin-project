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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Direccion</td>
          <td>Telefono</td>
          <td>email</td>
          <td colspan="2">Action</td>
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
<div>
@endsection