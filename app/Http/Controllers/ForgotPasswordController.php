<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
        {
            return view('frontend.pages.forgetPassword');
        }

        // Process the password reset email form.
        public function sendResetLinkEmail(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $response = $this->broker()->sendResetLink(
                $request->only('email')
            );

            return $response == Password::RESET_LINK_SENT
                ? back()->with('status', trans($response))
                : back()->withErrors(['email' => trans($response)]);
        }

        // Get the broker to be used during password reset.
        public function broker()
        {
            return Password::broker();
        }


        public function showResetForm(Request $request, $token = null)
        {
            return view('frontend.pages.changePassword')->with(
                ['token' => $token, 'email' => $request->email]
            );
        }

        public function resetPassword(Request $request)
        {
            // Validate the input fields
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:5|confirmed',
            ]);

            // Find the user by email
            $user = User::where('email', $request->email)->first();

            // Check if the user exists
            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'User with this email not found.']);
            }

            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('home')->with('success', 'Password updated successfully!');
        }

}
