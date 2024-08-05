<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NotificationController extends Controller
{
    public function index(Request $request): Response
    {
        return inertia(
            'Notification/Index',
            [
                'notifications' => $request->user()
                    ->notifications()
                    ->paginate(10)
            ]
        );
    }
}
