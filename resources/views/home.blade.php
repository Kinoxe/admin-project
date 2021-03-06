@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @role('admin')
                        Tiene rol de admin!
                    @else
                        este usuario tiene rol de invitado...
                    @endrole

                    @can('edit user')
                        este puede editar usuarios
                    @endcan
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
