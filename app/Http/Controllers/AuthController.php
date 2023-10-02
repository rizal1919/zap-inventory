<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function guest(){
        return Auth::check() ? redirect()->route('dashboard') : view('livewire.auth.sign-in-component');
    }

    public function signup(){
        return Auth::check() ? redirect()->route('dashboard') : view('livewire.auth.sign-up-component');
    }

    public function storeUser(Request $request){
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $isUserAvailable = User::where('username', '=', $request->username)->first();
        
        if($isUserAvailable){
            return response()->json(['message' => 'User already exists'], 409);
        }
        
        DB::beginTransaction();
        
        try{
            
            // dd($credentials['username']);
            // dd($request['username']);
            // dd($credentials['username']);

            User::create([
                'username' => $request->username,
                'password' => Hash::make($credentials['password'])
            ]);

            DB::commit();

            return response()->json(['message' => 'User created'], 200);

        }catch(\Throwable $th){

            DB::rollBack();
            return response()->json(['message'  => $th->getMessage()], 422);
        }

        
    }   

    public function loginStart(Request $request){
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json(['message' => 'Login successful', 'user' => $user], 200);
        }

        return response()->json(['message' => 'Login failed'], 401);

 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
