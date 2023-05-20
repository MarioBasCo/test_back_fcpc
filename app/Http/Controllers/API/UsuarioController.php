<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\{Auth,Validator};


class UsuarioController extends Controller
{

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'El campo correo es requerido',
            'email.email' => 'El correo no tiene un formato válido',
            'password.required' => 'El campo clave es requerido'
        ];

        $validator = Validator::make( $credentials, $rules, $messages ); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        if (Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            return response()->json( ['message' => 'Acceso correcto', 'user'=> $user], 200 );
        }
        
        return response()->json( ['message' => 'El correo electrónico o la contraseña no coinciden con nuestros registros'], 401 );
    }
}