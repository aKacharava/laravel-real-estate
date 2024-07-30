<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\ResponseFactory;
use Throwable;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(): Response|ResponseFactory
    {
        return inertia(
            'Realtor/Index',
            ['listings' => Auth::user()->listings]);
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
