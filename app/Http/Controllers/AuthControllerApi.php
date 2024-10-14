<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthControllerApi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['create', 'login', 'unauthorized']]);
    }
    public function login(Request $request)
    {
        $credentials = Validator::make($request->only('email', 'password'), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        $token = auth()->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $array['token'] = $token;
        $array['data'] = auth()->user();

        return $array;
    }

    public function unauthorized()
    {
        return response()->json(['error' => 'Nao autorizado!'], 401);
    }

    public function refresh()
    {
        return [
            'token' => auth()->refresh(),
            'data' => auth()->user(),
        ];
    }

    public function logout()
    {
        auth()->logout(true);
        return response()->json([], 204);
    }
}
