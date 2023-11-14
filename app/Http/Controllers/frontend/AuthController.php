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


    $credential = $request->only(['email', 'password']);
    if (Auth::attempt($credential)) {
        if (auth()->user()->role == 'customer') {
            return redirect()->route('home')->withSuccess('Login Success', 'Success');
        } else {

            return redirect()->back()->withError('Something went wrong');
        }
    } else {

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

    $userUpdate= User::find($id);


    //dd($imageName);
    $userUpdate->update([
        "email"   =>  $request->email,
        "phone"   =>  $request->phone,
        "name"    =>  $request->name,
        "last_name"    =>  $request->last_name,
        "role"    =>  'customer',
    ]);



        return redirect()->back()->withSuccess('Profile Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
