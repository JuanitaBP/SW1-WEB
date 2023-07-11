<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $fillable=[
       'idlocalidad',
       'idciudad',
       'idfirma',
       'iduser',
        'mensaje',
        'hora',
        'fecha',
        'tipo',
        'ubicacion',
        'estado'];
}
