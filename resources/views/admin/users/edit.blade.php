@extends('adminlte::page')

@section('title','Promociones Ilusion')



@section('content_header')
    <h1>Usuarios</h1>
    <a href={{route('admin.users.index')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>
    @stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{ $user->name }}</p>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!} 
                        {{ $role->name }}  
                    </label>
                </div>
                
            @endforeach

            {!! Form::submit('Asignar rol', ['class' => 'btn btn-warning text-white']) !!}

            {!! Form::close() !!}
        </div>
    </div>

 
  {{-- {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
    <div class="container col col-md-6 p-3">
        <div class="form-group ">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre']) !!}

            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo']) !!}
            @error('email')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la contraseña']) !!}

            @error('password')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        {!! Form::submit('Editar usuario', ['class' => 'btn btn-warning text-white']) !!}
    </div>
    {!! Form::close() !!} --}}
  
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

