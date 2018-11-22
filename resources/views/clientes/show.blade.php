@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Cliente: <b>{{ $cliente->nombre }}</b></h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    <div class="row">
    <div class="col-sm-9">
        <ul>
            <li >Cuit :     <b> {{ $cliente->cuit }} </b></li> 
            <li >Direccion :<b> {{ $cliente->direccion }} </b></li>     
            <li >Localidad :<b> {{ $cliente->localidad }}</b></li>
            <li >Provincia :<b> {{ $cliente->provincia }}</b></li>
        </ul>
    </div>
        <div class="col-sm-3">
            
            @can('edit client') 
                <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary btn-lg btn-block" ><i class="fa fa-pencil" aria-hidden="true"> </i> Editar</a>
            @else 
                <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary btn-lg btn-block  disabled" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"> </i> Editar</a>
            @endcan
            
            <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                @can('delete client')
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-lg btn-block mt-2" type="submit" onclick="return confirm('¿Seguro quieres eliminar a {{$cliente->nombre}}?')"><i class="fa fa-trash-o fa-lg"> </i> Eliminar</button>
          
             @else 
                <button class="btn btn-danger btn-lg btn-block mt-2" type="submit" disabled><i class="fa fa-trash-o fa-lg"> </i> Eliminar</button>
            @endcan
           
            
            </form> </div>
           
          
      </div>
    </div>
        <table class="table border">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Nombre</td>
                    <th scope="col">Telefono</td>
                    <th scope="col">Email</td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $contactos as $contacto)
                <tr>
                    <td>{{$contacto->nombre}}</td>
                    <td>{{$contacto->telefono}}</td>
                    <td>{{$contacto->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('clientes.index')}}" class="btn btn-warning btn-lg btn-block" ><i class="fa fa-arrow-left" aria-hidden="true"></i> </i> Volver</a>
</div>
@endsection