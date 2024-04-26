<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\CustomerUser;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/customer/dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials!']);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|min:6',
        ]);

        $user = new CustomerUser();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::guard('customer')->login($user);
        return redirect('/customer/dashboard');
    }
}
