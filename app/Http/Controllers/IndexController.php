<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\ResponseFactory;

class IndexController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia(
            'Index/Index',
            [
                'message' => "Hello world!"
            ]
        );
    }

    public function show(): Response|ResponseFactory
    {
        return inertia('Index/Show');
    }
}
