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
        $request->validate([
            // DUAS FORMAS DE VALIDAR
            'name'=>'required|string',
            'email'=>['required','unique:users','email'],
            'password'=>'required|string|min:8|max:16'
        ]);

        $data = $request->only(['name', 'email','password']);

        User::create($data);

        return redirect()->route('user.index');
    }

    // MÉTODO BÁSICO PARA FAZER UM GET COM ID

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

    // SEMELHANTE AO MÉTODO ACIMA PORÉM COM IMPLICIT BINDING E INJEÇÃO DE DEPENDÊNCIA
    // INJETAR A CLASSE NOS PARAMETROS E A VARIÁVEL DEVE TER O MESMO NOME QUE O PARAM DA ROTA
    // DESTA FORMA O LARAVEL ENTENDE QUE ESTAMOS BUSCANDO UM USUÁRIO E AUTOMATIZA O PROCESSO PELO ID

    //    public function show(User $user)
    //    {
    //        return view('user.show', [
    //            'user' => $user
    //        ]);
    //    }


    // MAIS UMA FORMA DE FAZER O GET, PORÉM COM EXPLICIT BINDING
    // TIRA-SE A CLASSE DO PARÂMETRO E INSERE EM
    // APP/PROVIDERS/ROUTESERVICEPROVIDER, DENTRO DE BOOT A SEGUINTE LINHA
    // Route::model('user', User::class);
    // O LARAVEL COMPREENDE QUE QUANDO PASSAR UM OBJ USER ELE INSTANCIARÁ SUA MODEL

    public function show($user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }


    //    public function edit($id)
    //    {
    //        $user = User::find($id);
    //        return view('user.edit', ['user'=> $user]);
    //    }

    //     MÉTODO COM EXPLICIT BINDING INJETANDO USER
    //     ALTERAR O PARÂMETRO NA ROTA DE ID PARA USER
        public function edit($user)
        {
            return view('user.edit', ['user'=> $user]);
        }

    public function update(Request $request, $user)
    {
        $data = $request->only(['name', 'email', 'password']);
        //$user = User::find($id);
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($user)
    {
        //$user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
