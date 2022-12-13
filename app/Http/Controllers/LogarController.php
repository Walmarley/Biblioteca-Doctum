<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogarController extends Controller
{

    public function Authenticate(Request $request)
    {
        $login = $request->only('email', 'password');
        Auth::attempt($login);

        // Auth::attempt(['email' => $request->email, 'password' => $request->password]); // testando formas diferentes

        $user = Auth::user($login);

        return response()->json(['Messege' => 'Usuario ' .$user->name. ' logado com sucesso']);
    }
}
