<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_CLIENTE';
    protected $table = 'CLIENTES';
    public $timestamps = false;    
    protected $guarded = [];
}
