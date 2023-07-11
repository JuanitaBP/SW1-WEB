<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        /* if($request->name = '' || $request->password == '')
            return response()->json(['message' => 'These credentials do not match our records.'], 404); */

        if(!DB::table('users')->where('email', $request->email)->exists()){
            return response()->json(['message' => 'Correo Electronico Inexistente'], 404);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        //hash para ver si son iguales

            if(Hash::check($request->password, $user->password)){
                return $user;
            }else{
                return response()->json(['message' => 'Contraseña Incorrecta'], 404);
            }

    }
    public function Register(Request $request){

        try {
            $user = new User();
            $user->name = $request->name;
            $user->name2 = $request->name2;
            $user->apellido =  $request->apellido;
            $user->ci = $request->ci;
            $user->numero1 = $request->numero1;
            $user->numero2 =  $request->numero2;
            $user->ciudadci =  $request->ciudadci;
            $user->verificacion =  $request->verificacion;
            $user->email =  $request->email;
            $user->email_verified_at =  $request->email_verified_at;
            $user->current_team_id =  $request->current_team_id;
            $user->profile_photo_path =  $request->profile_photo_path;
            $user->estado =  $request->estado;
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response()->json(['message' => 'usuario creado correctamente', 'user' => $user], 200);
        } catch (\Exception $e) {

            return response()->json([ 'Mensaje' => $e->getMessage()]);
        }
    }
}
