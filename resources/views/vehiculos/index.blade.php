@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vehículos de {{ $cliente->NOMBRE }} {{ $cliente->AP_PATERNO }}</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('clientes.vehiculos.create', $cliente->ID_CLIENTE) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Vehículo
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->PLACA }}</td>
                    <td>{{ $vehiculo->MARCA }}</td>
                    <td>{{ $vehiculo->MODELO }}</td>
                    <td>{{ $vehiculo->FEC_FAB }}</td>
                    <td>
                        <a href="{{ route('clientes.vehiculos.show', [$cliente->ID_CLIENTE, $vehiculo->ID_VEHICULO]) }}" 
                           class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('clientes.vehiculos.edit', [$cliente->ID_CLIENTE, $vehiculo->ID_VEHICULO]) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('clientes.vehiculos.destroy', [$cliente->ID_CLIENTE, $vehiculo->ID_VEHICULO]) }}" 
                              method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('¿Estás seguro de eliminar este vehículo?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay vehículos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection