<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreSetting;

class StoreSettingController extends Controller
{



    public function storeSettings()
    {

         // Retrieve the logged-in user along with their store settings
         $user = auth()->user();

         // Pass the user object to the Blade view
         return view('store.store_settings', compact('user'));
    }

    public function saveSettings(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'store_name' => 'required|string',
            'status' => 'required|in:Active,InActive',
            'default_language' => 'required|string|in:EN,FR',
            'default_currency' => 'required|string|in:USD,EUR,PKR',
            'description' => 'nullable|string',
            'timezone' => 'required|string',
        ]);

       // Find the store settings record for the current user
        $user_id = auth()->user()->id;
        $storeSettings = StoreSetting::where('user_id', $user_id)->first();

        // If the record exists, update it; otherwise, create a new record
        if ($storeSettings) {
            $storeSettings->update($validatedData);
        } else {
            $validatedData['user_id'] = $user_id;
            $storeSettings = StoreSetting::create($validatedData);
        }

        // Redirect back with a success message or do something else
        return redirect()->back()->with('success', 'Store settings saved successfully!');
    }
}
