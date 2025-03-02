<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            $request->validate([
                'images.*' => 'mimes:jpeg,jpg,png,webp|max:5000'
            ], [
                'images.*.mimes' => 'The filetype should be in one of the formats: jpeg, jpg, png or webp.',
            ]);

            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy($listing, ListingImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
