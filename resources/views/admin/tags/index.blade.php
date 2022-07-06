@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Etiquetas</h1>
    @stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.tags.create')}}" class="btn btn-warning text-white mt-3 mb-3 p-1">Agregar +</a>
            <a href={{ route('dashboard')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a> 
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td width="15">
                          <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning text-white">Editar</a> 
                        </td>
                        <td width="15">
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
                               @csrf
                               @method('delete')

                              <button type="submit" class="btn btn-warning text-white">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
     
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop

