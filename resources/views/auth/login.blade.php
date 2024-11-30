<x-guest-layout>
    <h1 class="text-2xl font-bold my-5">Login</h1>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <br />
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <br />
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            </div>
            <div class="form-group form-check my-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>
            <div class="w-full my-3 flex items-center">
                @error('loginError')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center items-center">
                <button type="submit" class="flex w-full justify-center items-center rounded-lg btn btn-primary text-white p-2 bg-black">
                    Log in
                </button>
            </div>
            <div class="flex justify-center items-center mt-4">
                <a class="text-sm text-muted" href="{{ route('register') }}">
                    Dont have an account yet? Register here
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
