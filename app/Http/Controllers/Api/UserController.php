<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Get the authenticated user's profile
     */
    public function getProfile(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update the authenticated user's profile
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = $request->user();
        $user->update($request->only(['name', 'email']));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }
}
