<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class AuthController extends Controller
{
    public function create(): Response|ResponseFactory
    {
        return inertia('Auth/Login');
    }

    public function store()
    {

    }

    public function destroy()
    {

    }
}
