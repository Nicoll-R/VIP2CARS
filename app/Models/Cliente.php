<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Authenticatable
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID_CLIENTE';
    
    protected $fillable = [
        'NOMBRE',
        'AP_PATERNO',
        'AP_MATERNO',
        'email',
        'nro_doc', // DNI que funciona como contraseña
    ];
    
    public function getAuthPassword()
    {
        return $this->nro_doc;
    }
    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class, 'CLIENTE_ID', 'ID_CLIENTE');
    }
}