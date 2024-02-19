<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{



    public function editProfile()
    {

         // Retrieve the logged-in user along with their store settings
         $user = auth()->user();

         // Pass the user object to the Blade view
         return view('apps.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Retrieve the logged-in user
        $user = auth()->user();

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'username' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'about_me' => 'nullable|string',
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable',
        ]);


        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::where('email', $user->email)->first();

        // Update user profile with form data
        $user->update([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'about_me' => $request->input('about_me'),
            'phone_number' => $request->input('phone_number'),
        ]);

         // Update password if provided
        if (!empty($request->input('password'))) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }


        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function saveProfile(Request $request)
    {
        // Retrieve the logged-in user
        $user = auth()->user();

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'bio' => 'nullable|string|max:255',
            'phone_number' => 'nullable',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id),
                'max:255',
            ],
            'website' => 'nullable|string|max:255',
        ]);


        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::where('email', $user->email)->first();

        // Update user profile with form data
        $user->update([
            'bio' => $request->input('bio'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'phone_number' => $request->input('phone_number'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


}
