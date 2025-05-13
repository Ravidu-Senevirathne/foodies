<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::with('user')->paginate(10);
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $testimonial = new Testimonial($validated);
        $testimonial->user_id = Auth::id();
        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully');
    }

    /**
     * Display the specified testimonial.
     */
    public function show(Testimonial $testimonial)
    {
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $testimonial->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('testimonials.index')->with('error', 'Unauthorized action');
        }

        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $testimonial->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('testimonials.index')->with('error', 'Unauthorized action');
        }

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $testimonial->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('testimonials.index')->with('error', 'Unauthorized action');
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
