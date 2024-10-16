<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function view()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'role' => 'required|in:jobseeker,recruiter',
        ]);

        // Create and save the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phoneNumber' => "",
            'link' => "",
            'jobs' => json_encode([""]),
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);
        auth()->login($user);
        return redirect()->route('home');
    }
}

