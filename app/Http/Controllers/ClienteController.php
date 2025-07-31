<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        // Si es administrador, ver todos los clientes
        if (Auth::user()->es_admin) {
            $clientes = Cliente::all();
            return view('clientes.index', compact('clientes'));
        }
        
        // Si es cliente normal, redirigir a su perfil
        return redirect()->route('clientes.vehiculos.index', Auth::user()->id);
    }
}