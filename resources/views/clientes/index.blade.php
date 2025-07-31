<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos</title>
    <style>
        .vehiculo-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .actions {
            margin-top: 10px;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Vehículos de {{ $cliente->NOMBRE }} {{ $cliente->AP_PATERNO }}</h1>

    @if(session('success'))
        <div style="color: green; margin: 10px 0;">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($vehiculos as $vehiculo)
        <div class="vehiculo-card">
            <p><strong>Placa:</strong> {{ $vehiculo->PLACA }}</p>
            <p><strong>Marca:</strong> {{ $vehiculo->MARCA }}</p>
            <p><strong>Modelo:</strong> {{ $vehiculo->MODELO }}</p>
            <p><strong>Año de fabricación:</strong> {{ $vehiculo->FEC_FAB }}</p>

            <div class="actions">
                <a href="{{ route('clientes.vehiculosShow', ['id' => $cliente->ID_CLIENTE, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}" 
                   class="btn btn-primary">Ver</a>
                <a href="{{ route('clientes.vehiculosEdit', ['id' => $cliente->ID_CLIENTE, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}" 
                   class="btn btn-primary">Editar</a>
                <form action="{{ route('clientes.vehiculosDestroy', ['id' => $cliente->ID_CLIENTE, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}" 
                      method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay vehículos registrados.</p>
    @endforelse

    <div style="margin-top: 20px;">
        <a href="{{ route('clientes.vehiculosCreate', ['id' => $cliente->ID_CLIENTE]) }}" 
           class="btn btn-primary">Crear Vehículo</a>
    </div>
</body>
</html>