<p align="center"> 
  <h1 align="center">VIP2CARS</h1> 
  <p align="center">Sistema de Gestión de Vehículos para Clientes</p>
</p>

---

# 📋 Requisitos del Sistema

- **XAMPP** instalado (con Apache y PHP)
- **SQL Server** (puede ser **SQL Server Express**)
- **PHP 8.2** o superior
- **Composer** instalado
- **Laravel 12** o superior

---

# ⚙️ Configuración Inicial

1. **Configurar archivo `.env`**
   
   Edita el archivo `.env` con estas configuraciones para **SQL Server**:

   ```env
   DB_CONNECTION=sqlsrv
   DB_HOST=127.0.0.1
   DB_PORT=1433
   DB_DATABASE=VIP2CARS
   DB_USERNAME=tu_usuario_sql
   DB_PASSWORD=tu_contraseña_sql
Nota: Asegúrate de que el servicio SQL Server esté corriendo y acepte conexiones.

# 🗃️ Configuración de la Base de Datos
Crear la base de datos

Ejecuta el siguiente script en SQL Server Management Studio o tu cliente SQL preferido:


    -- Crear la base de datos
    CREATE DATABASE VIP2CARS;
    GO
    
    -- Usar la base de datos
    USE VIP2CARS;
    GO
    
    -- Tabla: CLIENTES
    CREATE TABLE CLIENTES (
        ID_CLIENTE INT IDENTITY(1,1) PRIMARY KEY,
        NOMBRE NVARCHAR(100) NOT NULL,
        AP_PATERNO NVARCHAR(100) NOT NULL,
        NRO_DOC NVARCHAR(20) NOT NULL,
        EMAIL NVARCHAR(100),
        TELF NVARCHAR(20)
    );
    
    -- Tabla: VEHICULOS
    CREATE TABLE VEHICULOS (
        ID_VEHICULO INT IDENTITY(1,1) PRIMARY KEY,
        PLACA NVARCHAR(20) NOT NULL UNIQUE,
        MARCA NVARCHAR(50) NOT NULL,
        MODELO NVARCHAR(50) NOT NULL,
        FEC_FAB INT NOT NULL,
        CLIENTE_ID INT NOT NULL,
        FOREIGN KEY (CLIENTE_ID) REFERENCES CLIENTES(ID_CLIENTE)
    );

# Datos iniciales

Inserta estos datos de prueba:

 ```env
-- Insertar clientes
INSERT INTO CLIENTES VALUES
('Nico', 'Rondoy', '75392001', 'nicolu077@gmail.com', '950742651'),
('User', 'Ape_ejemplo', '11111111', 'correo@gmail.com', '999999999');

-- Insertar vehículos
INSERT INTO VEHICULOS VALUES
('A1B-234', 'TOYOTA', 'AGYA', 2014, 1);
```
# ⚡ Iniciar laravel 
Correr en terminal *php artisan serve* 

# 🔑 Credenciales de Acceso
Se ha creado un usuario administrador con las siguientes credenciales:

Email: nicolu077@gmail.com

Contraseña: 75392001

<p align="center"> VIP2CARS - Sistema de Gestión de Vehículos © 2025 </p> 
