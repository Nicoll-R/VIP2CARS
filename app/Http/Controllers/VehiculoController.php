<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VehiculoController extends Controller
{
    public function index(Cliente $cliente)
    {
        $vehiculos = $cliente->vehiculos;
        return view('vehiculos.index', compact('cliente', 'vehiculos'));
    }

    public function create(Cliente $cliente)
    {
        return view('vehiculos.create', compact('cliente'));
    }

    public function store(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculos,PLACA',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'fec_fab' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $cliente->vehiculos()->create([
            'PLACA' => $validated['placa'],
            'MARCA' => $validated['marca'],
            'MODELO' => $validated['modelo'],
            'FEC_FAB' => $validated['fec_fab'],
        ]);

        return redirect()->route('clientes.vehiculos.index', $cliente->id)
            ->with('success', 'Vehículo creado exitosamente');
    }

    public function show(Cliente $cliente, Vehiculo $vehiculo)
    {
        $this->authorize('view', $vehiculo);
        return view('vehiculos.show', compact('vehiculo', 'cliente'));
    }

    public function edit(Cliente $cliente, Vehiculo $vehiculo)
    {
        $this->authorize('update', $vehiculo);
        return view('vehiculos.edit', compact('vehiculo', 'cliente'));
    }

    public function update(Request $request, Cliente $cliente, Vehiculo $vehiculo)
    {
        $this->authorize('update', $vehiculo);
        
        $validated = $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculos,PLACA,' . $vehiculo->id . ',ID_VEHICULO',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'fec_fab' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $vehiculo->update($validated);

        return redirect()->route('clientes.vehiculos.index', $cliente->id)
            ->with('success', 'Vehículo actualizado exitosamente');
    }

    public function destroy(Cliente $cliente, Vehiculo $vehiculo)
    {
        $this->authorize('delete', $vehiculo);
        $vehiculo->delete();
        
        return redirect()->route('clientes.vehiculos.index', $cliente->id)
            ->with('success', 'Vehículo eliminado exitosamente');
    }
}