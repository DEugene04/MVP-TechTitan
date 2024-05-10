<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterControllerController extends Controller
{
    public function register(){
        return view ('auth/register');
    }

    public function registerSave(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'birthdate'=> 'required'
        ])->validate();
        
        RegisterController::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        return redirect()->route('login');
    }
}
