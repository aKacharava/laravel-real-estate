<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $offer->update(['accepted_at' => now()]);

        // Reject other offers
        $offer->listing->offers()->except($offer)
            ->update(['declined_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted, other offers are declined.");
    }
}
