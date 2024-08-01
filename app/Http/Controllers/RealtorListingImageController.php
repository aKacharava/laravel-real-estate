<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing): Response|ResponseFactory
    {
        return inertia(
            "Realtor/ListingImage/Create",
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        dd("SAVING");
    }
}
