@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Vehículo</h1>
    
    <form method="POST" action="{{ route('clientes.vehiculos.store', $cliente->ID_CLIENTE) }}">
        @csrf
        
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control @error('placa') is-invalid @enderror" 
                   id="placa" name="placa" value="{{ old('placa') }}" required>
            @error('placa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control @error('marca') is-invalid @enderror" 
                   id="marca" name="marca" value="{{ old('marca') }}" required>
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control @error('modelo') is-invalid @enderror" 
                   id="modelo" name="modelo" value="{{ old('modelo') }}" required>
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="fec_fab">Año de Fabricación</label>
            <input type="number" class="form-control @error('fec_fab') is-invalid @enderror" 
                   id="fec_fab" name="fec_fab" value="{{ old('fec_fab') }}" 
                   min="1900" max="{{ date('Y') + 1 }}" required>
            @error('fec_fab')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
        <a href="{{ route('clientes.vehiculos.index', $cliente->ID_CLIENTE) }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
</div>
@endsection