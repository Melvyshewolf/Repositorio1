@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Informes</h1>
    <a href={{ route('admin.reports.index')}}  class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>          
    @stop

@section('content')
{!! Form::model($report, ['route' => ['admin.reports.update', $report], 'method' => 'put']) !!}

    <div class="container col col-md-6 p-3">
    <div class="form-group block mb-2 text-lg font-serif">
        {!! Form::label('title', 'Título') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}

        @error('title')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div>



    <div class="form-group block mb-2 text-lg font-serif">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        @error('description')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div> 

    <div class="form-group block mb-2 text-lg font-serif">
        <p class="font-weight-bold">Estado</p>
        <label>
            {!! Form::radio('status', 1, true) !!}
            Borrador
        </label>
        <label>
            {!! Form::radio('status', 2) !!}
            Publicado
        </label>
        @error('status')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group block mb-2 text-lg font-serif col-md-3">
        {!! Form::label('event_id', 'ID del Evento') !!}
        {!! Form::number('event_id', null, ['class' => 'form-control']) !!}

        @error('event_id')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div>
    {!! Form::submit('Editar Informe', ['class' => 'btn btn-warning text-white']) !!}
</div>
{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop