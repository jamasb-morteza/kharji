<?php

namespace App\Http\Controllers\Auth;

use App\Http\Actions\MapGoogleUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function oAuthGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function oAuthGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $exception) {
            return redirect('login');
        }
        // only allow people with @company.com to login
        /*if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $new_user = User::create(MapGoogleUserData::handle($user));
            auth()->login($new_user, true);
        }
        return redirect()->to('/dashboard');

    }
}
