<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::query();

        // For regular users, show only approved testimonials
        if (!$request->user()->isAdmin()) {
            $testimonials->where('is_approved', true);
        }

        return response()->json($testimonials->get());
    }

    /**
     * Store a newly created testimonial.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimonial = new Testimonial($request->all());
        $testimonial->user_id = $request->user()->id;

        // Auto-approve for admins
        if ($request->user()->isAdmin()) {
            $testimonial->is_approved = true;
        } else {
            $testimonial->is_approved = false;
        }

        $testimonial->save();

        return response()->json($testimonial, 201);
    }

    /**
     * Display the specified testimonial.
     */
    public function show(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if user can view this testimonial
        if (!$testimonial->is_approved && !$request->user()->isAdmin() && $testimonial->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($testimonial);
    }

    /**
     * Update the specified testimonial.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if user can update this testimonial
        if (!$request->user()->isAdmin() && $testimonial->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'rating' => 'sometimes|integer|min:1|max:5',
        ]);

        // Only admins can update approval status
        if ($request->user()->isAdmin()) {
            $testimonial->update($request->all());
        } else {
            $testimonial->update($request->except(['is_approved', 'is_featured']));
            // Reset approval when user edits their testimonial
            $testimonial->is_approved = false;
            $testimonial->save();
        }

        return response()->json($testimonial);
    }

    /**
     * Remove the specified testimonial.
     */
    public function destroy(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if user can delete this testimonial
        if (!$request->user()->isAdmin() && $testimonial->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $testimonial->delete();

        return response()->json(['message' => 'Testimonial deleted successfully']);
    }
}
