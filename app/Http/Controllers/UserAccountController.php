<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class UserAccountController extends Controller
{
    public function create(): Response|ResponseFactory
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::make(
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8'
            ])
        );

        $user->password = bcrypt($request->password);
        $user->save();

        auth()->login($user);

        return redirect()->route('listing.Index')
            ->with('success', 'User created successfully.');
    }
}
