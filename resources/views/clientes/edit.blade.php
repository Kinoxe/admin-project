@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Cliente
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
      <form method="post" action="{{ route('clientes.update', $cliente->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="nombre" value={{ $cliente->nombre }} />
        </div>
        <div class="form-group">
          <label for="price">Direccion:</label>
          <input type="text" class="form-control" name="direccion" value={{ $cliente->direccion }} />
        </div>
        <div class="form-group">
          <label for="quantity">Telefono:</label>
          <input type="text" class="form-control" name="telefono" value={{ $cliente->telefono }} />
        </div>
        <div class="form-group">
            <label for="quantity">Email:</label>
            <input type="text" class="form-control" name="email" value={{ $cliente->email }} />
          </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection