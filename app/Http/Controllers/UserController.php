<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string' // DNI del usuario
        ]);

        // Buscar cliente por email
        $cliente = Cliente::where('email', $request->email)->first();
        // dd($cliente->NRO_DOC, $request->password);
        // Verificar si existe y si el DNI coincide
        if ($cliente && $cliente->NRO_DOC == $request->password) {
            // Autenticar al usuario manualmente
            Auth::login($cliente);
            
            // Obtener vehículos del cliente
            $vehiculos = Vehiculo::where('CLIENTE_ID', $cliente->ID_CLIENTE)->get();
            
            return redirect()->route('clientes.vehiculos.index', $cliente->ID_CLIENTE)
                ->with('success', 'Bienvenido ' . $cliente->NOMBRE);
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ])->onlyInput('email');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('status', 'Has cerrado sesión correctamente');
    }
}