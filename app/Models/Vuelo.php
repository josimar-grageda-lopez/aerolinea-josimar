<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id_vuelo';

    protected $fillable = [
        'id_aerolinea',
        'origen',
        'destino',
        'fecha',
        'precio',
    ];

    public function aerolinea()
    {
        return $this->belongsTo(
            Aerolinea::class,
            'id_aerolinea',
            'id_aerolinea'
        );
    }
}