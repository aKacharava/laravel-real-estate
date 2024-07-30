<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\ResponseFactory;

class RealtorListingController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia(
            'Realtor/Index',
            ['listings' => Auth::user()->listings]);
    }
}
