<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialsController extends Controller
{
    public function socialLinks()
    {
        $socials = Social::all();
        return view('social.socials', compact('socials'));
    }

    public function create()
    {
        return view('social.socialscreate');
    }

    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'social_platform_name' => 'required|string|max:255',
            'social_url' => 'required|url|max:255',
            'description' => 'nullable|string',
            'social_icon' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('social_icon')) {
            $image = $request->file('social_icon');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('social_icons', $imageName); // Store the image in storage
        } else {
            $imageName = ''; // If no image is uploaded, set it to empty string
        }

        // $socialIcon = '';
        // switch ($request->input('social_platform_name')) {
        //     case 'Facebook':
        //         $socialIcon = 'fa fa-facebook';
        //         break;
        //     case 'Snapchat':
        //         $socialIcon = 'fa fa-snapchat';
        //         break;
        //     case 'Instagram':
        //         $socialIcon = 'fa fa-instagram';
        //         break;
        //      case 'Youtube':
        //             $socialIcon = 'fa fa-youtube';
        //             break;
        //     // Add cases for other social platforms if needed
        //     default:
        //         $socialIcon = ''; // Set a default value if no match found
        // }

        // Create a new social
        Social::create([
            'social_platform_name' => $request->input('social_platform_name'),
            'social_url' => $request->input('social_url'),
            'description' => $request->input('description'),
            'social_icon' => $imageName,
            'user_id' => auth()->user()->id,
            'status' => 'active',
        ]);


        return redirect()->route('sociallinks')->with('success', 'Social created successfully.');
    }

    public function updateStatus(Request $request)
    {
        $social = Social::findOrFail($request->id);
        $social->status = $request->status;
        $social->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return view('social.socialsedit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'social_platform_name' => 'required|string|max:255',
            'description' => 'required|string',
            'social_url' => 'required|url',
            'social_icon' => 'nullable|image|mimes:jpeg,png|max:2048',

        ]);

        $social = Social::findOrFail($id);

            // Handle file upload
        if ($request->hasFile('social_icon')) {
            $image = $request->file('social_icon');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('social_icons', $imageName); // Store the image in storage

            // Update the social icon
            $social->update([
                'social_icon' => $imageName,
            ]);
        }

        // $socialIcon = '';
        // switch ($request->input('social_platform_name')) {
        //     case 'Facebook':
        //         $socialIcon = 'fa fa-facebook';
        //         break;
        //     case 'Snapchat':
        //         $socialIcon = 'fa fa-snapchat';
        //         break;
        //     case 'Instagram':
        //         $socialIcon = 'fa fa-instagram';
        //         break;
        //      case 'Youtube':
        //             $socialIcon = 'fa fa-youtube';
        //             break;
        //     // Add cases for other social platforms if needed
        //     default:
        //         $socialIcon = ''; // Set a default value if no match found
        // }

        $social = Social::findOrFail($id);
        $social->update([
            'social_platform_name' => $request->input('social_platform_name'),
            'description' => $request->input('description'),
            'social_url' => $request->input('social_url'),
        ]);


        return redirect()->route('sociallinks')->with('success', 'Social updated successfully.');
    }

    public function destroy($id)
    {
        $social = Social::findOrFail($id);
        $social->delete();

        return redirect()->route('sociallinks')->with('success', 'Social deleted successfully.');
    }


}
