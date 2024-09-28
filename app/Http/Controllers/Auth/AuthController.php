<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // user login
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $newUser = User::create([
                    'name' => explode('@', $request->email)[0],
                    'email'   => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('short-urls.index')->with('message','Login Successfully');
            }else{
                return redirect()->route('login')->with('error','Invalid Creadentials!');
            }
        }
        return view('auth.login');
    }
}
