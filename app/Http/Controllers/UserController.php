<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        if (!Auth::check()){
            throw new AuthenticationException();
        }
        $users = User::all();

        return response()->json(['data'=>$users]);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        $validador = Validator::make($data, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
            // return view('book.store')->with('mensagem', $validador->messages());
        }
        
        $data ['password'] = bcrypt($data['password']);
        User::create($data);
        // return view('book.index');
        return response()->json(['message'=> 'Usuario  '. $request->nome.' adicionado com sucesso']);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
