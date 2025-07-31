<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Vehículo</title>
</head>
<body>
    <h1>Ver Vehículo</h1>

    <!-- Mostrar los detalles del vehículo -->
    <p><strong>Placa:</strong> {{ $vehiculo->PLACA }}</p>
    <p><strong>Marca:</strong> {{ $vehiculo->MARCA }}</p>
    <p><strong>Modelo:</strong> {{ $vehiculo->MODELO }}</p>
    <p><strong>Año de Fabricación:</strong> {{ $vehiculo->FEC_FAB }}</p>

    <a href="{{ route('clientes.vehiculos', $vehiculo->CLIENTE_ID) }}">Volver a la lista de vehículos</a>
    
    <!-- Crear vehículo -->
    <a href="{{ route('clientes.vehiculosCreate', $vehiculo->CLIENTE_ID) }}">Crear vehículo</a>

    <!-- Editar vehículo -->
    <a href="{{ route('clientes.vehiculosEdit', ['id' => $vehiculo->CLIENTE_ID, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}">Editar vehículo</a>

    <!-- Eliminar vehículo -->
    <form action="{{ route('clientes.vehiculosDestroy', ['id' => $vehiculo->CLIENTE_ID, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar vehículo</button>
    </form>

</body>
</html>
