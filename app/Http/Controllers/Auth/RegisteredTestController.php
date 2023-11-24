<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


// CONTROLLER TESTE PARA CRIAR USUÁRIO NA TELA DE LOGIN QUANDO RESETAR O BANCO.

class RegisteredTestController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'nivel' => 'required|in:0,1',
            'unidade' => 'required|string|max:100',
            'status' => 'required|in:Ativo,Inativo',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nivel' => $request->nivel,
            'unidade' => $request->unidade,
            'status' => $request->status,
        ]);
        
        event(new Registered($user));

        //Função para logar com o usuário criado no dashboard automaticamente
        //Auth::login($user);

        return view('auth.login');
    }
}