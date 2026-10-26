<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    protected $primaryKey = 'id_aerolinea';

    protected $fillable = [
        'nombre',
        'pais_sede',
    ];

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'id_aerolinea', 'id_aerolinea');
    }
}