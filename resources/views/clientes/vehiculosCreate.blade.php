<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vehículo</title>
</head>
<body>
    <h1>Crear Vehículo para {{ $cliente->NOMBRE }} {{ $cliente->AP_PATEERNO }}</h1>

    <!-- Formulario para crear vehículo -->
    <form action="{{ route('clientes.vehiculosStore', $cliente->ID_CLIENTE) }}" method="POST">
        @csrf

        <div>
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" required>
        </div>

        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
        </div>

        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
        </div>

        <div>
            <label for="fec_fab">Año de Fabricación:</label>
            <input type="number" id="fec_fab" name="fec_fab" required>
        </div>

        <div>
            <button type="submit">Guardar Vehículo</button>
        </div>
    </form>

    <a href="{{ route('clientes.index', $cliente->ID_CLIENTE) }}">Volver a la lista de vehículos</a>
</body>
</html>
