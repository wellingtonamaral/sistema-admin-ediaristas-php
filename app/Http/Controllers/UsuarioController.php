<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(15);

        return view('usuarios.index',[
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsuarioRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('usuarios.index')
            ->with('mensagem', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('Show deBola');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {

        return view('usuarios.edit',[
            'usuario' => $usuario
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UsuarioRequest $request
     * @param  User $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, User $usuario)
    {
              $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('usuarios.index')
                ->with('mensagem', 'Usuário atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
               $usuario->delete();
        return redirect()->route('usuarios.index')
                ->with('mensagem', 'Usuário removido do banco de dados com sucesso!');

    }
}
