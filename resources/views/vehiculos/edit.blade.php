@extends('layouts.app') <!-- Asegúrate de que tu layout exista -->

@section('content')
<div class="container">
    <h1>Editar Vehículo</h1>
    
    <form action="{{ route('clientes.vehiculos.update', ['cliente' => $cliente->ID_CLIENTE, 'vehiculo' => $vehiculo->ID_VEHICULO]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" value="{{ old('placa', $vehiculo->PLACA) }}" required>
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca', $vehiculo->MARCA) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo', $vehiculo->MODELO) }}" required>
        </div>

        <div class="mb-3">
            <label for="fec_fab" class="form-label">Año de Fabricación</label>
            <input type="number" class="form-control" id="fec_fab" name="fec_fab" 
                   min="1900" max="{{ date('Y') + 1 }}" 
                   value="{{ old('fec_fab', $vehiculo->FEC_FAB) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clientes.vehiculos.index', $cliente->ID_CLIENTE) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection