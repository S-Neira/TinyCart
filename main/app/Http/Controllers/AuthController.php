<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->intended(route('products.index'));
        }

        return back()->witherrors([
            'email' => 'Las credenciales no son validas.'
        ])->onlyInput('email');

    }
        
    public function logout(Request $request)
    {
        // Cierra la sesión del usuario autenticado
        Auth::logout();
    
        // Invalida la sesión actual
        $request->session()->invalidate();
    
        // Regenera la sesión para evitar posibles ataques de sesión
        $request->session()->regenerateToken();
    
        // Redirige al usuario a la página principal con un mensaje
        return redirect()->route('index')->with('logout', 'Cerraste sesión exitosamente.');
    }
}
