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
  <h1>usuarios</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form class="form-inline my-2 my-lg-0">
    {!! Form::open(['route'=>'usuarios.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario']) !!}
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
    <div class="collapse navbar-collapse justify-content-center">
      {!! $usuarios->render() !!}
    </div>
  
  </nav>
  
  <table class="table table-striped table-sm">
    <thead class="bg-dark text-white">
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>email</td>
          <td>Rol</td>
          <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->getRoleNames()}}</td>
            
         
              <td class="row">
                <div class="btn-group" role="group">
              
              
              @can('edit client') 
                  <a href="{{ route('usuarios.edit',$usuario->id)}}" class="btn btn-primary btn-sm  mr-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @else 
                  <a href="{{ route('usuarios.edit',$usuario->id)}}" class="btn btn-primary  btn-sm disabled mr-2" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @endcan
                </div>
               <form action="{{ route('usuarios.destroy', $usuario->id)}}" method="post">
                @can('delete client')
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Seguro quieres eliminar a {{$usuario->name}}?')"><i class="fa fa-trash-o fa-lg ml-1 "></i></button>
                
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
        {!! $usuarios->render() !!}
      </div>
    </nav>

@endsection