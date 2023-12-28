<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public $data = '';

    public function guest(){
        return Auth::check() ? redirect()->route('dashboard') : view('auth.sign-in-component');
    }

    public function signup(){
        return Auth::check() ? redirect()->route('dashboard') : view('auth.sign-up-component');
    }

    public function storeUser(Request $request){
        
        // dd($request);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'fullname' => 'required',
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
                'fullname' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($credentials['password'])
                // 'password' => $credentials['password']
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

        // dd(Auth::attempt($credentials));
        
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

    public function success_login(Request $request){


        // dd(Auth::check());
        $time_greeting = 'Hello, Buddy!';
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $time_greeting =  "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $time_greeting =  "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "22") {
            $time_greeting = "Good evening";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "22") {
            $time_greeting =  "Good night";
        }

        $this->data = [
            'time_greetings'    => $time_greeting,
            'total_barang'      => Items::get()->count(),
            'total_pengguna'    => User::get()->count(),
        ];

        return view('main.dashboard.dashboard-component', ['data' => $this->data]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
