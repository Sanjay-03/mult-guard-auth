<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Posts;

class PageController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }

    public function index()
    {
        $user = Auth::guard('customer')->user();
        $data['user'] = $user;
        $data['posts'] = Posts::where('email', $user->email)->get()->toArray();
        return view('customer.dashboard', $data);
    }

    public function addPost(Request $request)
    {
        try {
            $user = Auth::guard('customer')->user();
            Posts::create([
                'email' => $user->email,
                'title' => $request->title,
                'description' => $request->post_description,
                'image' => "",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('message', 'Post Added Successfuly!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('message', 'Something went wrong!');
        }
    }
}
