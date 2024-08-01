<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request): Response|ResponseFactory
    {
        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo',
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString(),
            ]
        );
    }

    public function show(Listing $listing): Response|ResponseFactory
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
            ]
        );
    }
}
