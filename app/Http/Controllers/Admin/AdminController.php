<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Constructor to apply admin middleware
     */
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $userCount = User::count();
        $testimonialCount = Testimonial::count();
        $reservationCount = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'userCount',
            'testimonialCount',
            'reservationCount',
            'pendingReservations'
        ));
    }
}
