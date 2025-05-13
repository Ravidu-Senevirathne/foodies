<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the user's reservations.
     */
    public function index()
    {
        $reservations = Auth::user()->reservations()->latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new reservation.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created reservation in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'string'],
            'guests' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->reservation_date = $validated['date']; // Map to correct field name
        $reservation->reservation_time = $validated['time']; // Map to correct field name
        $reservation->guests = $validated['guests'];
        $reservation->notes = $validated['notes'] ?? null;
        $reservation->status = 'pending';
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully');
    }

    /**
     * Display the specified reservation.
     */
    public function show(Reservation $reservation)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized action');
        }

        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified reservation.
     */
    public function edit(Reservation $reservation)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized action');
        }

        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified reservation in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized action');
        }

        $validated = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'string'],
            'guests' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        // Map the fields correctly to the database column names
        $reservation->reservation_date = $validated['date'];
        $reservation->reservation_time = $validated['time'];
        $reservation->guests = $validated['guests'];
        $reservation->notes = $validated['notes'] ?? null;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully');
    }

    /**
     * Cancel the specified reservation.
     */
    public function cancel(Reservation $reservation)
    {
        // Check if the user is the owner or an admin
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized action');
        }

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation cancelled successfully');
    }
}
