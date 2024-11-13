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
    public function view(Request $request): View
    {
        return view('editProfile', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());
        $user->email = $request->user()->email; // Keep existing email
        $user->role = $request->user()->role; // Keep existing role
        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('editProfile.view')->with('status', 'profile-updated');
    }
}
