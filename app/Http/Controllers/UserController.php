<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Registrar um usuario, espera receber:
     * 
     * @param Request name
     * @param Request email
     * @param Request password
     */
    public function registrar(Request $request)
    {
        if (empty($request->email) || empty($request->password)) {
            return response()->json(['message' => 'Campos vazios']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'action' => 'usuario registrado',
            'message' => true
        ]);
    }
}
