<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = Cliente::where('email', $request->email)->first();
        $password = Cliente::where('nro_doc', $request->password)->first();
        
    $vehiculo = Vehiculo::where('cliente_id', $user->ID_CLIENTE)->get();
        if ($user && $password) {
            return view('clientes.index', ['cliente' => $user, 'vehiculos' => $vehiculo]);
        }
        return 'Contraseña o usuario incorrecto';
    }
    
}
