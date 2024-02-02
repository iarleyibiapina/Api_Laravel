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
    public function logar(Request $request)
    {
        $dadosRequest = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!$usuario = User::where('email', $dadosRequest['email'])->get()->first()) {
            return response()->json([
                'message' => 'Usuario não encontrado, email ou senha inválidos'
            ], 400);
        }

        if (!$token = auth()->attempt($dadosRequest)) return response()->json(['message' => 'Login não sucedido']);

        return response()->json([
            'success' => true,
            'message' => 'Usuario logado',
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ]
        ]);
    }
}
