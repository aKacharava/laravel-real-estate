<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use Throwable;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request): Response|ResponseFactory
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    ->paginate(5)
                    ->withQueryString()
            ]
        );
    }

    public function create(): Response|ResponseFactory
    {
        return inertia('Realtor/Create');
    }

    public function edit(Listing $listing): Response|ResponseFactory
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing,
            ]
        );
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
     * @throws Throwable
     */
    public function destroy(Listing $listing): RedirectResponse
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing deleted successfully.');
    }
}
