<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ListingController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all(),
            ]
        );
    }

    public function create(): Response|ResponseFactory
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Listing::create([
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
