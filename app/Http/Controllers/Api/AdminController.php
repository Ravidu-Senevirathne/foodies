<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard data.
     */
    public function dashboard()
    {
        $userCount = User::count();
        $testimonialCount = Testimonial::count();
        $reservationCount = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $pendingTestimonials = Testimonial::where('is_approved', false)->count();

        return response()->json([
            'userCount' => $userCount,
            'testimonialCount' => $testimonialCount,
            'reservationCount' => $reservationCount,
            'pendingReservations' => $pendingReservations,
            'pendingTestimonials' => $pendingTestimonials
        ]);
    }

    /**
     * List all users
     */
    public function users()
    {
        return response()->json(User::all());
    }

    /**
     * List pending testimonials
     */
    public function pendingTestimonials()
    {
        return response()->json(Testimonial::where('is_approved', false)->with('user')->get());
    }

    /**
     * List pending reservations
     */
    public function pendingReservations()
    {
        return response()->json(Reservation::where('status', 'pending')->with('user')->get());
    }
}
