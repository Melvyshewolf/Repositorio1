<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    
    }

    public function store(Request $request)
    {
        //Estas son las reglas de validacion
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        //end 

        //Se crea el usuario => Se asigna valores que vienen de los inputs del form
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');
        //$user->password = $request->input('password');
        //end   
        
        $user->save();
        return redirect()->route('admin.users.index', $user);
    }

  
    public function show(User $user)
    {
        //return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    { 
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

 
    public function update(Request $request, User $user)
    {
        //Estas son las reglas de validacion
        //$request->validate([
            //'name' => 'required',
            //'email' => "required|unique:users,email,$user->id", // excepcion si es el mismo usuario          
        //]);
        //end 
        //$user->update($request->all());
        $user->roles()->sync($request->roles);
        $user->save();
        //intento de guardar datos en la tabla intermedia model_roles

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignó el rol correctamente');
    }

 
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('info', 'Exito');
    }
}
