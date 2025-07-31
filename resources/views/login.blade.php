<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="login-title">Acceso al Sistema</h2>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" required autofocus>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">DNI (Contraseña)</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <small class="text-muted">Ingrese su número de documento (DNI)</small>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>