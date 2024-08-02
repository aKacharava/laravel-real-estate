<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing): Response|ResponseFactory
    {
        $listing->load(['images']);

        return inertia(
            "Realtor/ListingImage/Create",
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }
}
