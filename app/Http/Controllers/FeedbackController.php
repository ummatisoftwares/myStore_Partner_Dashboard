<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // public function feedback()
    // {
    //     $feedbacks = Feedback::all();
    //     return view('feedback.feedbacks', compact('feedbacks'));
    // }


    public function create()
    {
        return view('feedback.feedbackscreate');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
            'content' => 'nullable|string',
        ]);

        // Create and save the feedback
        $feedback = Feedback::create([
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'content' => $validatedData['content'],
            'user_id' =>  auth()->user()->id,
            'status' => 'Active',
        ]);

        // Redirect with success message
        return redirect()->route('feedbackscreate')->with('success', 'Feedback created successfully.');
    }

}
