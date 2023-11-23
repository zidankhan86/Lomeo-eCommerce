<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.components.auth.login');
    }



    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $credential = $request->only(['email', 'password']);

        if (Auth::attempt($credential)) {
            if (auth()->user()->role == 'customer') {
                return redirect()->route('home');
            } elseif (auth()->user()->role == 'admin') {
                return redirect()->route('app')->withSuccess('Login Success');
            }
        } else {
            return redirect()->back()->with(['error' => 'Invalid credentials. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logoutUser()
    {
        Auth::logout();
        //  session()->flush();
        return redirect('/')->with('success','logout');
    }

    public function list()
    {
        $user = User::all();
        return view('backend.pages.userList',compact('user'));
    }
}
