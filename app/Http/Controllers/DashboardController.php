<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $reservationsCount = Reservation::where('user_id', $user->id)->count();
        $ordersCount = Order::where('user_id', $user->id)->count();

        // Get recent reservations for the dashboard - FIX: Change column names
        $recentReservations = Reservation::where('user_id', $user->id)
            ->orderBy('reservation_date', 'desc')
            ->orderBy('reservation_time', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.index', compact('user', 'reservationsCount', 'ordersCount', 'recentReservations'));
    }

    /**
     * Show all reservations for the current user.
     *
     * @return \Illuminate\View\View
     */
    public function reservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->orderBy('reservation_date', 'desc')
            ->paginate(10);

        return view('dashboard.reservations.index', compact('reservations'));
    }

    /**
     * Show the reservation creation form.
     *
     * @return \Illuminate\View\View
     */
    public function createReservation()
    {
        return view('dashboard.reservations.create');
    }

    /**
     * Store a new reservation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReservation(Request $request)
    {
        $validated = $request->validate([
            'reservation_date' => 'required|date|after:today',
            'reservation_time' => 'required',
            'party_size' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:500',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->name = Auth::user()->name;
        $reservation->email = Auth::user()->email;
        $reservation->phone = Auth::user()->phone ?? '';
        $reservation->reservation_date = $validated['reservation_date'];
        $reservation->reservation_time = $validated['reservation_time'];
        $reservation->party_size = $validated['party_size'];
        $reservation->special_requests = $validated['special_requests'] ?? null;
        $reservation->notes = $validated['special_requests'] ?? ''; // Add this line to set notes field
        $reservation->status = 'pending';
        $reservation->save();

        return redirect()->route('dashboard.reservations')
            ->with('success', 'Reservation created successfully!');
    }

    /**
     * Show a specific reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function showReservation(Reservation $reservation)
    {
        $this->authorizeReservation($reservation);
        return view('dashboard.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing a reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function editReservation(Reservation $reservation)
    {
        $this->authorizeReservation($reservation);
        return view('dashboard.reservations.edit', compact('reservation'));
    }

    /**
     * Update a reservation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateReservation(Request $request, Reservation $reservation)
    {
        $this->authorizeReservation($reservation);

        $validated = $request->validate([
            'reservation_date' => 'required|date|after:today',
            'reservation_time' => 'required',
            'party_size' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:500',
        ]);

        $reservation->update($validated);

        return redirect()->route('dashboard.reservations')
            ->with('success', 'Reservation updated successfully!');
    }

    /**
     * Delete a reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteReservation(Reservation $reservation)
    {
        $this->authorizeReservation($reservation);

        $reservation->delete();

        return redirect()->route('dashboard.reservations')
            ->with('success', 'Reservation cancelled successfully!');
    }

    /**
     * Cancel a reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelReservation(Reservation $reservation)
    {
        $this->authorizeReservation($reservation);

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('dashboard.reservations')
            ->with('success', 'Reservation cancelled successfully!');
    }

    /**
     * Show the menu.
     *
     * @return \Illuminate\View\View
     */
    public function menu()
    {
        $menuItems = MenuItem::all()->groupBy('category');
        return view('dashboard.menu.index', compact('menuItems'));
    }

    /**
     * Show user orders.
     *
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show a specific order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function showOrder(Order $order)
    {
        $this->authorizeOrder($order);
        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Cancel an order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelOrder(Order $order)
    {
        $this->authorizeOrder($order);

        if ($order->status == 'pending') {
            $order->status = 'cancelled';
            $order->save();
            return back()->with('success', 'Order cancelled successfully!');
        }

        return back()->with('error', 'This order cannot be cancelled.');
    }

    /**
     * Add an item to cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Implement cart logic here
        // This could use a session-based cart or a Cart model

        return back()->with('success', 'Item added to cart!');
    }

    /**
     * View the shopping cart.
     *
     * @return \Illuminate\View\View
     */
    public function viewCart()
    {
        // Cart logic here
        return view('dashboard.cart.index');
    }

    /**
     * Checkout from cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        // Checkout logic here
        return redirect()->route('dashboard.orders')
            ->with('success', 'Order placed successfully!');
    }

    /**
     * Authorize that the current user owns the reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    private function authorizeReservation(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Authorize that the current user owns the order.
     *
     * @param  \App\Models\Order  $order
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    private function authorizeOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
