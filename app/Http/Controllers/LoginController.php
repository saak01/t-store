<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Login Controller
 *
 * @author João Victor Costa <joaovictorcosta@sysout.com.br>
 * @since 15/05/2024
 * @version 1.0.0
 */
class LoginController extends Controller
{
    /**
     * Formulário de login
     *
     * @return void
     */
    function index(){
        return view('layouts.default_login');
    }

    /**
     * Validação de Login
     *
     * @param Request $request
     * @return void
     */
    function login(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $request->session()->put('user', $user);
            return redirect()->intended('/admin/home');
        }else{
            return back()->withErrors(['erro' => 'Credenciais incorretas']);
        }
    }
}
