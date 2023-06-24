<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        try{
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }catch(\Exception $e){
            Log::info($e);
            return response()->json(['message' => 'Error Could not create a user please notify the developer immediately']);
        }

    }
}
