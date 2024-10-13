<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function view(Request $request): View
    {
        return view('editProfile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Get the user instance
        $user = $request->user();

        // Only fill the fields that can be updated
        $user->fill($request->validated());

        // Prevent changes to the email and role
        $user->email = $request->user()->email; // Keep existing email
        $user->role = $request->user()->role; // Keep existing role

        // Check if email has changed and set verified_at to null
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('editProfile.view')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    // public function logout(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
