<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);
        
        if( !Auth::attempt($validated)){
            return response()->json([
                'message' => 'Login information is incorrect'
            ],401);
        }
        $user = User::where (['email' => $validated['email']])->first();
        return response()->json([
            'data' => $user,
            'acces_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
    public function register(Request $request){
        try {
            //code...

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255|email|unique:users,email',
                'password' => 'required|max:255|confirmed|min:6',
                'apelido' => 'required|max:255',
                'idTipoUser' => 'required|max:255',
                'idZona' => 'required|max:255',
                'idEstado' => 'required|max:255'
            ]);       
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            return response()->json([
                'data' => $user,
                'acces_token' => $user->createToken('api_token')->plainTextToken,
                'token_type' => 'Bearer',
            ],201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => $th->getMessage(),
            ],500);
        }
       
    }
    
}
