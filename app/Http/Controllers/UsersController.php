<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
