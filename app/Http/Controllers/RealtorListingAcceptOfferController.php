<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        // Reject other offers
        $listing->offers()->except($offer)
            ->update(['declined_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted, other offers are declined.");
    }
}
