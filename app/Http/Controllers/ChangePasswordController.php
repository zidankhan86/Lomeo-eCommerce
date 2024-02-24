<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordCheckRule;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.changePassword');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $rules = [
            'old_password' => ['required', new PasswordCheckRule], // Check password
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ];

        // Define custom error messages
        $messages = [
            'old_password.required' => 'Old password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 6 characters.',
            'confirm_password.required' => 'Confirm password is required.',
            'confirm_password.same' => 'The new password and confirm password must match.',
        ];

        // Perform the validation
        $validatedData = $request->validate($rules, $messages);

        $userUpdate = User::find($id);

        $userUpdate->update([

            'password' => bcrypt($request->password),

        ]);

        // Update password if a new one is provided
        if ($request->filled('new_password')) {
            $userUpdate->update([
                'password' => bcrypt($validatedData['new_password']),
            ]);
        }

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
