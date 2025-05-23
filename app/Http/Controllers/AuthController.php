<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    public function index() {
        // $titulo = "Entrar";
        return view('login.login');
    }


    public function logear(Request $request){
        //validar datos de la credencial
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //buscar el email
        $user = User::where('email', $request->email)->first();

        //valudar el usuario y contraseña
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
        }

        //crear la session de usuario

        Auth::login($user);
        $request->session()->regenerate();//crear un numero de session nuevo para mayor seguridad

        return to_route('indexAdmin');

    }

    public function crearAdmin(){
        //crear directamente
        User::create([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'rol' => 'admin'
        ]);

        return "Admin creado con exito";
    }

    public function logout(){
        Auth::logout();
        return to_route('inicio');
    }
}
