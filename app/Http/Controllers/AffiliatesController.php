<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;

class AffiliatesController extends Controller
{
    public function affiliates()
    {
        $affiliates = Affiliate::all();
        return view('affiliate.affiliates', compact('affiliates'));
    }

}
