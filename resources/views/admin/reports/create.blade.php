@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Informes</h1>
    <a href={{ route('admin.reports.index')}}  class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a>          
    @stop

@section('content')
{{--  
<div class="card">
    <div class="card-body">
    <button  onclick="findMe()"  class="btn btn-warning text-white">Mostrar mi ubicación</button>
    <div id="map"> </div>
    </div>--}}
</div> 
    {!! Form::open(['route' => 'admin.reports.store','files'=>true]) !!}
    {!! Form::hidden('user_id', auth()->user()->id) !!}
   
    <div class="container col col-md-6 p-3">
        <div class="form-group block mb-2 text-lg font-serif"">
            {!! Form::label('title', 'Título') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el Titulo']) !!}

            @error('title')
                <span class="text-red">{{ $message }}</span>
            @enderror
    </div>

    <div class="row">
        <div class="col">
            <div class="image-wrapper">
            <img id="picture" src="https://cdn.pixabay.com/photo/2021/10/02/09/57/woman-6674780__480.jpg">
        </div></div>
        <div class="col">
            <div class="form-group">
              {!! Form::label('file', 'Imagen que se mostrara en el informe') !!}
              {!! Form::file('file',['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            </div>

            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p>lorem ipsum d lorem ipsum dolor sit amet, consectetuer adip</p>
        </div>
    </div>

    <div class="form-group block mb-2 text-lg font-serif">
            {!! Form::label('body', 'Descripción del Informe') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Escribir aqui..']) !!}
            <br>
            @error('body')
            <br>
                <span class="text-red">{{ $message }}</span>
            @enderror
    </div>

    {{-- <div class="form-group block mb-2 text-lg font-serif">
            {!! Form::label('Ubicación') !!}<br/>
            
    </div>

    <div class="form-group block mb-2 text-lg font-serif col-md-4">
                {!! Form::label('latitude', 'Latitud') !!}
                {!! Form::number('latitude', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la Latitud']) !!}
    
                @error('latitude')
                <br>
                    <span class="text-red">{{ $message }}</span>
                @enderror
            
    </div>

    <div class="form-group block mb-2 text-lg font-serif col-md-4">
        {!! Form::label('longitude', 'Longitud') !!}
        {!! Form::number('longitude', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la Longitud']) !!}

        @error('longitude')
        <br>
            <span class="text-red">{{ $message }}</span>
        @enderror
    
</div>--}}
        
    <div class="form-group block mb-2 text-lg font-serif">
            <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                   {{ $tag->name }}
                </label> 
                @endforeach
                @error('tags')
                <br>
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
        
    <div class="form-group block mb-2 text-lg font-serif col-md-2">
            {!! Form::label('event_id', 'ID del Evento') !!}
            {!! Form::select('event_id', $events, null, ['class' => 'form-control']) !!}

            @error('event_id')
                <span class="text-red">{{ $message }}</span>
            @enderror
    </div>
        
        {!! Form::submit('Agregar Informe', ['class' => 'btn btn-warning text-white']) !!}
    </div>
        {!! Form::close() !!}         

    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            with: 100%;
            height: 100%;
        }
        </style>
   
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script>
    function findMe() {
        var output = document.getElementById("map");
        
        (navigator.geolocation) 
        ? output.innerHTML = '<p>Tu navegador soporta</p>' 
        : output.innerHTML = '<p>Tu navegador no soporta</p>';  
        
        const location = (location) => {
            var latitude = location.coords.latitude;
            var longitude = location.coords.longitude;
            
            output.innerHTML = 'Latitud: ${latitude}, <br> Longitud: ${longitude}';
            
        }

        const error = () => {
            output.innerHTML = '<p>NO se pudo obtener tu ubicacion</p>' ;
        }

        navigator.geolocation.getCurrentPosition(location, error);
    }
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
        //Cambiar Imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
    
@stop