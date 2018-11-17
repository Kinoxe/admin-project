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
          <div class="form-group">
              @csrf
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
            <label for="direccion">Direccion :</label>
            <input type="text" class="form-control" name="direccion"/>
        </div>
          <div class="form-group">
              <label for="telefono">CUIT :</label>
              <input type="text" class="form-control" name="CUIT"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <!-- Incluimos la plantilla de los contactos-->
          <div>
            <label for="contactos">Contactos:</label>
            @include('shared.contactos')
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
  </div>
</div>

@endsection