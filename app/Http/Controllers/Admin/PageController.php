<?php

namespace App\Http\Controllers\Admin;

use App\Models\Posts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function index()
    {
        $user = Auth::guard('admin')->user();
        $data['user'] = $user;
        $data['posts'] = Posts::get()->toArray();
        return view('admin.dashboard', $data);
    }
}
