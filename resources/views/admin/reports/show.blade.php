@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Informes</h1>              
    @stop
@section('content')


        <a href={{ route('admin.reports.index')}}  class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>
    <body>
      @csrf

      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h5 class="card-title">Detalles del Informe</h5><br>
        <div class="block mb-2 text-lg font-serif">Título</div>
        <input type="text" name="title" id="idtitle" class="form-control row-md-4" value="{{$report->title}}" disabled>

        <div class="block mb-2 text-lg font-serif">Descripcion</div>
        <input type="text" name="description" id="iddescription" class="form-control row-md-4" value="{{$report->description}}" disabled>
        
       {{-- <div class="block mb-2 text-lg font-serif">Ubicación</div><br>

            <div class="block mb-2 text-lg font-serif">Latitud</div>
        <input type="text" name="" id="idlatitude" class="form-control" value="{{$report->latitude}}" disabled>

        <div class="block mb-2 text-lg font-serif">Longitud</div>
        <input type="text" name="" id="idlongitude" class="form-control" value="{{$report->longitude}}" disabled>
--}}
        <div class="block mb-2 text-lg font-serif">Fotos</div>
        <input type="text" name="" id="idphoto" class="form-control"  disabled>

        <div class="block mb-2 text-lg font-serif">Etiquetas</div>
        <input type="text" name="" id="idtags" class="form-control" value="{{$report->tag}}" disabled>

        <div class="block mb-2 text-lg font-serif">Estado</div>
        <input type="text" name="status" id="idstatus" class="form-control col-md-2" value="{{ $report->status }}" disabled>

        <div class="block mb-2 text-lg font-serif ">ID del Usuario</div>
        <input type="text" name="userid" id="iduserid" class="form-control col-md-2" value="{{ $report->user_id }}" disabled>
        
        <div class="block mb-2 text-lg font-serif col-md-4">ID del Evento</div>
        <input type="text" name="eventid" id="ideventid" class="form-control col-md-2" value="{{ $report->event_id }}" disabled>
        
        </div>
      </div>

    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop