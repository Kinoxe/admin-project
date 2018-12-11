@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Editar: <b>{{$usuario->name}}</b></h1>
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
      <form method="post" name="usuario-edit-form" onSubmit="return confirm('¿Confirma edicion de {{$usuario->name}}?')" action="{{ route('usuarios.update', $usuario->id) }}">
        @method('PATCH')
        @csrf
        <div class="row ">
          <div class="form-group col-md-4">
             
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="name"  value='{{ $usuario->name }}' required/>
          </div>
          <div class="form-group col-md-4">
             
            <label for="email">email:</label>
            <input type="text" class="form-control" name="email"  value='{{ $usuario->email }}' required/>
        </div>
       
          
      </div>
      <div class='row'>
          
          <div class="form-group col-md-4">
              <label for="roles">Rol Asignado:</label>
              <!--input type="text" class="form-control" name="email"/-->
              <select class="custom-select" name="rol" id="inputGroupSelect01">
                <option value='{{$usuario->getRoleNames()[0]}}' selected="selected">{{$usuario->getRoleNames()[0]}}</option>
               @foreach ($roles as $rol)
                 <option value="{{$rol->name}}">{{$rol->name}}</option>
               @endforeach
              </select>
          </div>

          <div class="form-group col-md-4">
            <input type="checkbox" id="cambiar_contraseña">
            <label for="password" >{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} pass" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
           
        </div>

        <div class="form-group col-md-4">
            <label for="password-confirm" >{{ __('Confirm Password') }}</label>           
                <input id="password-confirm" type="password" class="form-control pass" name="password_confirmation" required>
                <span id="error"></span>
        </div>
        </div>
        
        
          
            <div class=" p-2">
              <a href="{{ route('usuarios.index')}}" class="btn btn-warning mr-2" role="button">Cancelar</a>
          
              <button type="submit" class="btn btn-success" >Guardar</button>
            </div>
          </div>
      </form>
  </div>
</div>

@endsection

@section('script')
<script>
$(function() {
    enable_cb();
    $("#cambiar_contraseña").click(enable_cb);
  });
  
  function enable_cb() {
    if (this.checked) {
      
      $("input.pass").removeAttr("disabled");
    } else {
      $("input.pass").attr("disabled", true);
    }
  }

  $('#password, #password-confirm').on('keyup', function () {
  if ($('#password').val() == $('#password-confirm').val()) {
    $('#error').html('Coinciden').css('color', 'green');
    document.getElementById("password").style.borderColor = "green";
    document.getElementById("password-confirm").style.borderColor = "green";
  } else {
  $('#error').html('No Coinciden').css('color', 'red');
    document.getElementById("password").style.borderColor = "red";
    document.getElementById("password-confirm").style.borderColor = "red";
  }
  });
</script>

<script>
        $(document).ready(function(){
     $("#usuario-form").submit(function(){
       return $(this).validate();
     });
     })
     </script>
@endsection