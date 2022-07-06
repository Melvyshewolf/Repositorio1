@extends('adminlte::page')

@section('title','Promociones Ilusion')

@section('content_header')
    <h1>Usuarios</h1>
    <a href="{{route('admin.users.create')}}" class="btn btn-warning text-white mt-3 mb-3 p-1">Agregar +</a>
    <a href={{route('dashboard')}} class="btn btn-warning text-white mt-3 mb-3 p-1">Regresar</a> 
                 
    @stop

@section('content')

        @livewire('admin.users-index')

{{--  <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Rol</th> 
                        <th>Email</th>
                        <th>Opciones</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$user->getRoleNames()->implode('')}}
                            </td>
                        <td>{{ $user->email }}</td>
                        <td width="15">
                            
                          <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning text-white">Editar</a> 
                            
                        </td>
                        <td width="15">
                            <form action="{{ route('admin.users.destroy', $user) }}" method="post">
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
     --}}
   
     
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop

