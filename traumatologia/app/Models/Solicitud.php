<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    
    protected $table = 'solicitudes';
    
    protected $fillable = [
        'nombre',
        'rut',
        'fecha_nacimiento',
        'altura',
        'peso',
        'rodilla',
        'subir_escaleras',
        'bajar_escaleras',
        'sentarse',
        'comuna',
        'centro_id',
        'estado', // pendiente, aprobada, rechazada, enviada
    ];
}