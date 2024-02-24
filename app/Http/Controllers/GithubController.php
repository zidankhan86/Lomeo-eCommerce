<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('github')->user();
            // dd($user);

            $gitUser = User::updateOrCreate([
                'github_id' => $user->id,
            ], [
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'github_token' => $user->token,
                'auth_type' => 'github',
                'password' => Hash::make(Str::random(10)),
                'role' => 'admin',
            ]);

            Auth::login($gitUser);

            return redirect()->route('app');
        } catch (Exception $e) {
            //dd($e->getMessage());
        }
    }
}
