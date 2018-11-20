@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar Cliente
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
      <form method="post" action="{{ route('clientes.store') }}">
        <div class="row ">
          <div class="form-group col-md-4">
              @csrf
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group col-md-4">
            <label for="direccion">CUIT :</label>
            <input type="text" class="form-control" name="direccion"/>
        </div>
        <div class="form-group col-md-4">
            <label for="email">DIRECCION :</label>
            <input type="text" class="form-control" name="email"/>
        </div>
      </div>
      <div class='row'>
          <div class="form-group col-md-4">
              <label for="telefono">DIRECCION :</label>
              <input type="text" class="form-control" name="CUIT"/>
          </div>
          <div class="form-group col-md-4">
              <label for="email">LOCALIDAD :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group col-md-4">
              <label for="email">PROVINCIA :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
        </div>
        
          <!-- Incluimos la plantilla de los contactos-->
          <div>
            <label for="contactos">Contactos:</label>
            @include('shared.contactos')
          </div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center row ">
              <a href="{{ route('clientes.index')}}" class="btn btn-warning">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
          </nav>
      </form>
  </div>
</div>

@endsection