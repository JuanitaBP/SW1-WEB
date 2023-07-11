<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function show()
    {
        $data = [
            [
                'lat' => -17.782458341269383,
                'lng' => -63.1783962838879,
                'value' => 1
            ]
        ];

        return view('usuario.mapacalor', compact('data'));
    }
}
