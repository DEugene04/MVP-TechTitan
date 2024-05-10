<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(){
        return view ('register');
    }

    public function registerSave(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthdate'=> 'required'
        ])->validate();
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'level' => 'Admin'
        ]);

        return redirect()->route('login');
    }

    public function login(){
        return view ('login');
    }

    public function loginAction(Request $request){
        Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))){
            throw ValidationException::withMessages([
                'username' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        return redirect('/');
    }
}
