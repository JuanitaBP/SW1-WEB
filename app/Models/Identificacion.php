<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificacion extends Model
{
    use HasFactory;
    protected $fillable=[
        'iddenuncia',
        'mensaje',
        'receptor',
        'emisor',
        'hora',
        'fecha',
        'tipo',
        'estado'];
}
