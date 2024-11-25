<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use PhpParser\Node\Stmt\TryCatch;

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

        try {
            // Create and save the user
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => '', // Defaults to empty
                'link' => '',        // Defaults to empty
                'role' => $validated['role'],
                'password' => Hash::make($validated['password']),
            ]);

            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->withInput()->withErrors([
                'transaction_error' => 'Failed to create account. Please try again later.',
            ]);
        }
    }
}

