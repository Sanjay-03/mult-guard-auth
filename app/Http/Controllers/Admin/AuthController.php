<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials!']);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|min:6',
        ]);

        $user = new AdminUser();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::guard('admin')->login($user);
        return redirect('/admin/dashboard');
    }
}
