<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
       return view('frontend.pages.login');
    }

    public function register()
    {
        return view('frontend.pages.registration');
    }
    public function profile()
    {
        return view('frontend.pages.profile');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function loginProcess( Request $request)
    {
         // Validate the request
    $request->validate([
        'email'     => 'required|email',
        'password'  => 'required',
    ]);

    // Get credentials from the request
    $credential = $request->only(['email', 'password']);

    // Attempt to authenticate the user
    if (Auth::attempt($credential)) {
        // Check the user's role
        if (auth()->user()->role == 'customer') {
            // Display success message using Toastr
            toastr()->success('Login Success', 'Success');
            return redirect()->route('home');
        } else {
            // Handle the case where the user is not a customer (e.g., redirect to admin dashboard)
            toastr()->success('Login Success', 'Success');
            return redirect()->route('admin.dashboard');
        }
    } else {
        // Authentication attempt failed
        toastr()->error('Invalid credentials. Please try again.', 'Error');
        return redirect()->back();
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'email'                  => 'required|email|unique:users',
            'name'                   => 'required',
            'password'               => 'required|min:5|confirmed',
            'password_confirmation'  => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('Ymdhsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        User::create([
            "email"         =>$request->email,
            "name"          => $request->name,
            "last_name"     => $request->last_name,
            "password"      => bcrypt($request->password),
            "role"          => 'customer',
            "image"         => $imageName,
        ]);

        return redirect()->route('login.page')->withSuccess('Registration Success');


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
    public function destroy(string $id)
    {
        //
    }
}
