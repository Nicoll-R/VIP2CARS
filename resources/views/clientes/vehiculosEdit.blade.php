<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Vehículo</title>
</head>
<body>
    <h1>Actualizar Vehículo</h1>

    <!-- Formulario para actualizar vehículo -->
    <form action="{{ route('clientes.vehiculosUpdate', ['id' => $vehiculo->CLIENTE_ID, 'vehiculoId' => $vehiculo->ID_VEHICULO]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método PUT para actualización -->

        <div>
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" value="{{ $vehiculo->PLACA }}" required>
        </div>

        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="{{ $vehiculo->MARCA }}" required>
        </div>

        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="{{ $vehiculo->MODELO }}" required>
        </div>

        <div>
            <label for="fec_fab">Año de Fabricación:</label>
            <input type="number" id="fec_fab" name="fec_fab" value="{{ $vehiculo->FEC_FAB }}" required>
        </div>

        <div>
            <button type="submit">Actualizar Vehículo</button>
        </div>
    </form>

    <a href="{{ route('clientes.vehiculos', $vehiculo->CLIENTE_ID) }}">Volver a la lista de vehículos</a>
</body>
</html>
