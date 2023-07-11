<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesDenuncia extends Model
{
    use HasFactory;
    protected $fillable=[
        'iddenuncia',
        'iduser',
        'hora',
        'fecha',
        'urlimagen',
        'tipo',
        'estado'];
}
