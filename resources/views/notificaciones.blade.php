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
  <h1>notificaciones</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form class="form-inline my-2 my-lg-0">
    {!! Form::open(['route'=>'notificaciones.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search']) !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre del notificacion']) !!}
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
    
    
  </nav>
  
  <table class="table table-striped table-sm">
    <thead class="bg-dark text-white">
        <tr>
          
          <td>accion</td>
          <td>Tipo</td>
          <td>Detalle</td>
          <td>usuario</td>
          <td>creado</td>
          <td>visto</td>
        </tr>
    </thead>
    <tbody>
        @foreach(auth()->user()->notifications as $notificacion)
        <tr>
          <td><i class="{{$notificacion['data']['icon']}}" aria-hidden="true"></i></td>
            <td>{{$notificacion['data']['nombre']}}</td>
            <td><a href="{{$notificacion['data']['url']}}">{{$notificacion['data']['mensaje']}}</a></td>
            <td>{{$notificacion['data']['creador']}}</td>
            <td>{{$notificacion->created_at}}</td>
            <td>{{$notificacion->read_at}}</td>
            
         
            

            
        </tr>
        @endforeach
    </tbody>
  </table>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class=" navbar-collapse my-2 my-lg-0 justify-content-center">
        
      </div>
    </nav>

@endsection