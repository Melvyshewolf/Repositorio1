<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un usuario">
        </div>

        @if ($users->count())
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
    
        <div class="card-footer">
           {{$users->links()}} 
        </div>
        @else

            <div class="card-body">
                <strong>
                    No hay registros
                </strong>
            </div>
        @endif
    </div>
</div>