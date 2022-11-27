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
            'username' => 'required | unique:users',
            'email' => 'required | unique:users',
            'password' => 'required | min:8'
        ]);

        $request->password = Hash::make($request->password);
        User::create($request->all());
        return redirect('/login');
    }
}
