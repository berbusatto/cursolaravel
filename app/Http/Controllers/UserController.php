<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


//ALGUNS MÉTODOS RETORNAM VIEWS E OUTROS MODELS

class UserController extends Controller
{
    // RETORNA A BLADE DO INDEX
    public function index()
    {
        $users = User::get();
        return view('user.index', ['users' => $users]);
    }

    // RETORNA A BLADE DO NOVO CONTATO
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'email']);
        $data['password'] = bcrypt(rand(12345678, 87654321));
        User::create($data);

        return redirect()->route('user.index');
    }

//    public function show($id)
//    {
//        // RETORNA OBJETO
//        $user = User::find($id);
//
//        // RETORNA ARRAY
//        //$user = User::where('id', $id)->get();
//
//        return view('user.show', ['user'=> $user]);
//    }

    // SEMELHANTE AO MÉTODO ACIMA PORÉM COM BIND IMPLICIT E INJEÇÃO DE DEPENDÊNCIA
    // INJETAR A CLASSE NOS PARAMETROS E A VARIÁVEL DEVE TER O MESMO NOME QUE O PARAM DA ROTA
    // DESTA FORMA O LARAVEL ENTENDE QUE ESTAMOS BUSCANDO UM USUÁRIO E AUTOMATIZA O PROCESSO PELO ID
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
