@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Informes</h1>
    <a href="{{route('admin.reports.create')}}" class="btn btn-warning text-white mt-3 mb-3 p-1">Agregar +</a>
    <a href={{route('dashboard')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a> 
                 
    @stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>ID del Usuario</th>
                        <th>ID del Evento</th>
                        <th>Opciones</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->status }}</td>
                        <td>{{ $report->user_id }}</td>
                        <td>{{ $report->event_id }}</td>
                        
                        <td width="15">
                            
                            <a href="{{ route('admin.reports.show', $report) }}" class="btn btn-warning text-white">Ver más...</a> 
                              
                          </td>
                        <td width="15">
                            
                          <a href="{{ route('admin.reports.edit', $report) }}" class="btn btn-warning text-white">Editar</a> 
                            
                        </td>
                        <td width="15">
                            <form action="{{ route('admin.reports.destroy', $report) }}" method="post">
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

