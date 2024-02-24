<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect('/')->withSuccess('Logout Success');
    }

    public function form()
    {
        return view('backend.pages.test');
    }
}
