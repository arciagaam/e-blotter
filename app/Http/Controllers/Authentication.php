<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    protected $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if($this->authenticationService->checkUserRole()) {
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $route = str_contains(url()->previous(), 'admin') ? '/admin' : '/';
                return redirect($route)->with('error', 'Invalid credentials.');
            }
            
            if (auth()->user()->roles[0]->id === 1) {
                return redirect()->intended('/admin/dashboard');
            } 

            session()->put('login_role', $request->login_role_id);
            // addToLoginTrail($request->login_role_id);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->onlyInput('username');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        $route = str_contains(url()->previous(), 'admin') ? '/admin' : '/';

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($route);
    }
}

class AuthenticationService {
    public function checkUserRole()
    {
        return ((!str_contains(url()->previous(), 'admin') && auth()->user()->roles[0]->id == 1) || (str_contains(url()->previous(), 'admin') && auth()->user()->roles[0]->id != 1));
    }
}
