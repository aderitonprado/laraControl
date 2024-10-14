<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserControllerApi extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function index()
    {
        return response()->json($this->loggedUser);
    }

    public function update(Request $request)
    {
        $array = ['error' => ''];

        $rules = [
            'name'              => 'min:4',
            'email'             => 'email',
            'password'          => 'same:password_confirm',
            'password_confirm'  => 'same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }

        $name       = $request->input('name');
        $email      = $request->input('email');
        $password   = $request->input('password');

        $user = User::find($this->loggedUser->id);

        if ($name) {
            $user->name = $name;
        }

        if ($email) {
            $user->email = $email;
        }

        if ($password) {
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }

        $array['data'] = $user->update();

        return $array;
    }
}
