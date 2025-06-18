<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {

        $users = User::paginate(20);
        
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()
        ->route('users.index')
        ->with('message', "Usuário criado com sucesso");
    }
    
    public function edit(string $id){
        //$user = User::where('id', '=', $id)->first();
        // $user = User::where('id', '=', $id)->first();
       $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
}

    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)){
            return back()->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');

        if($request->password){
            $data['passoword'] = bcrypt($request->passoword);
        }

        $user->update($data);

        $user->update($request->only([
            'name',
            'email',
        ]));

        return redirect()
        ->route('users.index')
        ->with('message', 'Usuário editado com sucesso');
    }

    public function show(string $id)
    {
        if (!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id)
    {


        if (!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }
        if(auth()->user()->id === $user->id){
             return back()->with('users.index')->with('message', 'Você não pode excluir o próprio usuário');
        }

        $user->delete();

          return redirect()
        ->route('users.index')
        ->with('message', 'Usuário deletado com sucesso');
    }

}