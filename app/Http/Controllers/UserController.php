<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function index()
    {
        return view('configuracion.user.index');
    }
    public function create()
    {
        $user = new User();
        return view('configuracion.user.create', compact('user'));
    }
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $user= new USER;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->cargo = $request->cargo;
        $user->email = $request->email;
        $user->departamento_id = $request->categoria;
        $user->rol_id = $request->categoria1;
        $user->password = Hash::make($request->password);
        $resul= $user->save(); 
    
        return redirect()->route('user.index')
        ->with('success', 'Usuario creado con éxito.');
    }

    public function edit($id)
    {
        $t = Departamento::find($id);
      
        //$ticketdetalle = TicketDetalle::where('ticket_id', $id)->get();
        
        
        if ($t == NULL)
        {
            return redirect()->route('user.index');
        }


        return view('configuracion.user.edit', compact('t'));
    }
     /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PasswordRequest $request)
    {
            
        auth()->user()->update($request->all());
         return back()->withStatus(__('Contraseña modificada con éxito.'));
    }
    public function show(Request $request)
    {          
         return view('configuracion.user.show');
    }
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password actualizada con éxito.'));
    }
    public function importar(Request $request) 
    {
        $file = $request->file('documento');

        $msg = "";
        Excel::import(new UsersImport, $file);
                $msg = 'Usuarios';
    return redirect()->route('user.importar')->with('success', $msg.' importados exitosamente');

    }
}
