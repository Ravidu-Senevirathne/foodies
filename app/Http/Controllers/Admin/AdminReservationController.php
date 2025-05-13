<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Constructor to apply admin middleware
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of all reservations.
     */
    public function index()
    {
        $reservations = Reservation::with('user')->latest()->paginate(15);
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Update the status of a reservation.
     */
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,confirmed,cancelled,completed'],
        ]);

        $reservation->update(['status' => $validated['status']]);

        return redirect()->route('admin.reservations.index')
            ->with('success', "Reservation status updated to {$validated['status']} successfully");
    }
}
