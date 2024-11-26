<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// refactored

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }
    public function store(Request $request)
    {
        $credentials = $this->validator($request->all())->validate();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'loginError' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

