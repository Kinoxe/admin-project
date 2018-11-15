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
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
            <label for="price">Direccion :</label>
            <input type="text" class="form-control" name="direccion"/>
        </div>
          <div class="form-group">
              <label for="price">Telefono :</label>
              <input type="text" class="form-control" name="telefono"/>
          </div>
          <div class="form-group">
              <label for="quantity">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
  </div>
</div>
@endsection