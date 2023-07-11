<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|',
        ]);

        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        return back()->withErrors([
            'error' => 'Por favor verifique sus credenciales!!',
        ]);
    }
    public function register( Request $request)
    {
        try {
      
            if ($comercios == null) {
                DB::beginTransaction();
                Comercio::nuevoComercio($request);
                DB::commit();

                if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    $comercios = Comercio::where('email', $request->email)->first();
                    return redirect()->route('comercio.dashboard.index')->with('mensaje', "Comercio registrado correctamente");
                }
            } else {
                $mensaje = "El correo ya ha sido ocupado";
                return back()->with('mensaje', $mensaje);
            }
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('home');
    }
    public function showLogin()
    {
        if (!Auth::guard('comercio')->check()) {
            return view('backend.auth.comercio.login');
        } else {
            return redirect('comercio/dashboard');
        }
    }
    public function showRegister()
    {
        $paises = json_decode(file_get_contents(public_path() . "/paises.json"), true);
        $paises = $paises["paises"];
        if (!Auth::guard('comercio')->check()) {
            return view('backend.auth.comercio.register', compact('paises'));
        } else {
            return redirect('comercio/dashboard');
        }
    }
}
