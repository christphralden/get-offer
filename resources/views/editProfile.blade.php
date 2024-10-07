<x-app-layout>
    <div class="mx-auto p-10 mt-20 w-full max-w-4xl bg-gray-800 rounded-lg text-white shadow-lg">
        <h1 class="text-3xl font-bold mb-10 text-center">Manage Profile</h1>

        <!-- Profile Update Section -->
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4">Profile Information</h2>
            <form method="POST" action="{{ route('editProfile.update') }}" class="space-y-4">
                @csrf
                @method('patch')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" value="{{ old('name', $user->name) }}" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" value="{{ old('email', $user->email) }}" required>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p class="mt-2 text-yellow-500 text-sm">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="underline">Click here to re-send the verification email.</button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-green-500 text-sm">A new verification link has been sent to your email address.</p>
                        @endif
                    @endif
                </div>

                <!-- Save Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded-md hover:bg-blue-500">Save Changes</button>
                    @if (session('status') === 'profile-updated')
                        <span class="text-green-500 text-sm ml-3">Profile updated successfully.</span>
                    @endif
                </div>
            </form>
        </div>

        <!-- Password Update Section -->
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4">Update Password</h2>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                @method('put')

                <!-- Current Password Field -->
                <div>
                    <label for="current_password" class="block text-sm">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" required>
                    @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- New Password Field -->
                <div>
                    <label for="password" class="block text-sm">New Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" required>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" required>
                    @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Save Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded-md hover:bg-blue-500">Update Password</button>
                    @if (session('status') === 'password-updated')
                        <span class="text-green-500 text-sm ml-3">Password updated successfully.</span>
                    @endif
                </div>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4">Delete Account</h2>
            <form method="POST" action="{{ route('editProfile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <!-- Confirmation Message -->
                <div>
                    <p class="text-red-500 text-sm">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you want to permanently delete your account.</p>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password_delete" class="block text-sm">Password</label>
                    <input type="password" name="password" id="password_delete" class="w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none" required>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Delete Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-red-600 px-4 py-2 rounded-md hover:bg-red-500">Delete Account</button>
                </div>
            </form>
        </div>

        <!-- Logout Button at the Bottom -->
        <div class="mt-10 flex justify-center">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white hover:text-gray-400" aria-label="Logout">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
