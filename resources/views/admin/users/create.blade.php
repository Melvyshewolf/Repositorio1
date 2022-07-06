@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Usuarios</h1>
    <a href={{route('admin.users.index')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>
    @stop

@section('content')

    {{-- <div class="card container col col-md-6 p-3">
        <form  action="{{route('admin.users.store')}}" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Ingresa un nombre">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="password" placeholder="Ingrese su contraseña">
            </div> --}}
            {{-- <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                <input type="file">
            </div> --}}
            {{-- <div>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div> --}}
    {!! Form::open(['route' => 'admin.users.store']) !!}
    
        
    <div class="container col col-md-6 p-3">
        <div class="form-group block mb-2 text-lg font-serif ">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre']) !!}

            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group block mb-2 text-lg font-serif ">
            {!! Form::label('email', 'Correo') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo']) !!}
            @error('email')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group block mb-2 text-lg font-serif ">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la contraseña']) !!}

            @error('password')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        {!! Form::submit('Agregar usuario', ['class' => 'btn btn-warning text-white']) !!}
    </div>
    
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop

