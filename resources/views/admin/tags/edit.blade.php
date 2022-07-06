@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Etiquetas</h1>
    <a href={{route('admin.tags.index')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>
    @stop

@section('content')
    {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
    <div class="container col col-md-6 p-3">
        <div class="form-group ">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la Etiqueta']) !!}

            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
       
        {!! Form::submit('Editar etiqueta', ['class' => 'btn btn-warning text-white']) !!}
    </div>
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop

