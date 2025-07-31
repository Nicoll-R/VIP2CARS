@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Vehículo</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Placa: {{ $vehiculo->PLACA }}</h5>
            <p class="card-text">
                <strong>Marca:</strong> {{ $vehiculo->MARCA }}<br>
                <strong>Modelo:</strong> {{ $vehiculo->MODELO }}<br>
                <strong>Año:</strong> {{ $vehiculo->FEC_FAB }}
            </p>
            
            <div class="mt-3">
                <a href="{{ route('clientes.vehiculos.edit', ['cliente' => $cliente->ID_CLIENTE, 'vehiculo' => $vehiculo->ID_VEHICULO]) }}" 
                   class="btn btn-primary">Editar</a>
                   
                <form action="{{ route('clientes.vehiculos.destroy', ['cliente' => $cliente->ID_CLIENTE, 'vehiculo' => $vehiculo->ID_VEHICULO]) }}" 
                      method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                
                <a href="{{ route('clientes.vehiculos.index', $cliente->ID_CLIENTE) }}" 
                   class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection