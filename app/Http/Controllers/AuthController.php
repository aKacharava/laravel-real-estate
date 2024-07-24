<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;

class AuthController extends Controller
{
    public function create(): Response|ResponseFactory
    {
        return inertia('Auth/Login');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $authUser = Auth::attempt(
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]),
            true
        );

        if($authUser) {
            throw ValidationException::withMessages([
                'email' => 'Login failed'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function destroy()
    {

    }
}
