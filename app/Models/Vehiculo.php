<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_VEHICULO';
    protected $table = 'Vehiculos';
    public $timestamps = false;    
    protected $guarded = [];
}

