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
        return inertia(
            'Listing/Index',
            [
                'filters' => $request->only([
                    'priceFrom',
                    'priceTo',
                    'beds',
                    'baths',
                    'areaFrom',
                    'areaTo',
                ]),
                'listings' => Listing::orderByDesc('created_at')->paginate(10),
            ]
        );
    }

    public function create(): Response|ResponseFactory
    {
//        Gate::authorize('create', Listing::class);
        return inertia('Listing/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->user()->listings()->create([
            ...$request->all(),
            ...$request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'zip_code' => 'required',
                'street_name' => 'required',
                'street_number' => 'required|min:0|max:1000',
                'price' => 'required|integer|min:1|max:4000000',
            ])
        ]);

        return redirect()->route('listing.Index')
            ->with('success', 'Listing created successfully.');
    }

    public function show(Listing $listing): Response|ResponseFactory
    {
//        Gate::authorize('view', $listing);

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
            ]
        );
    }

    public function edit(Listing $listing): Response|ResponseFactory
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing): RedirectResponse
    {
        $listing->update([
            ...$request->all(),
            ...$request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'zip_code' => 'required',
                'street_name' => 'required',
                'street_number' => 'required|min:0|max:1000',
                'price' => 'required|integer|min:1|max:4000000',
            ])
        ]);

        return redirect()->route('listing.Index')
            ->with('success', 'Listing edited successfully.');
    }

    public function destroy(Listing $listing): RedirectResponse
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing deleted successfully.');
    }
}
