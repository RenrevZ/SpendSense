<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helper;


class SignupController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required | regex:/^[\w-]*$/ | unique:users',
            'email' => 'required | unique:users| email',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'USER_ID' => Helper\modelCounter('users'),
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
