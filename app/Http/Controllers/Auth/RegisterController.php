<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

// refactored

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'role' => 'required|in:jobseeker,recruiter',
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_number' => '', // Defaults to empty
                'link' => '',        // Defaults to empty
                'role' => $request->input('role'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'transaction_error' => 'Failed to create account. Please try again later.',
            ]);
        }
    }
}
