<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index(Request $request)
    {
        // For admins, show all reservations
        if ($request->user()->isAdmin()) {
            return response()->json(Reservation::all());
        }

        // For regular users, show only their own reservations
        return response()->json($request->user()->reservations);
    }

    /**
     * Store a newly created reservation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'reservation_date' => 'required|date|after:today',
            'reservation_time' => 'required',
            'party_size' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = $request->user()->id;
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;
        $reservation->party_size = $request->party_size;
        $reservation->special_requests = $request->special_requests;
        $reservation->status = 'pending';
        $reservation->save();

        return response()->json($reservation, 201);
    }

    /**
     * Display the specified reservation.
     */
    public function show(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Check if user can view this reservation
        if (!$request->user()->isAdmin() && $reservation->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($reservation);
    }

    /**
     * Update the specified reservation.
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Check if user can update this reservation
        if (!$request->user()->isAdmin() && $reservation->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'phone' => 'sometimes|string|max:20',
            'reservation_date' => 'sometimes|date|after:today',
            'reservation_time' => 'sometimes',
            'party_size' => 'sometimes|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        // Only admins can update status and admin notes
        if ($request->user()->isAdmin()) {
            if ($request->has('reservation_date')) {
                $reservation->reservation_date = $request->reservation_date;
            }
            if ($request->has('reservation_time')) {
                $reservation->reservation_time = $request->reservation_time;
            }
            // Update other fields as needed
            $reservation->save();
        } else {
            // If user updates their reservation, set status back to pending
            if ($request->has('reservation_date')) {
                $reservation->reservation_date = $request->reservation_date;
            }
            if ($request->has('reservation_time')) {
                $reservation->reservation_time = $request->reservation_time;
            }
            // Update other fields
            $reservation->status = 'pending';
            $reservation->save();
        }

        return response()->json($reservation);
    }

    /**
     * Remove the specified reservation.
     */
    public function destroy(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Check if user can delete this reservation
        if (!$request->user()->isAdmin() && $reservation->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
