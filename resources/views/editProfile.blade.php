<x-app-layout>
    <div class="mx-10 my-20">
        <h2 class="text-black font-bold text-4xl my-10">Edit Profile</h2>
        <div class="flex flex-col items-center justify-center">
            <form action="{{ route('editProfile.update') }}" method="POST" class="w-full">
                @csrf
                @method('PATCH') <!-- Use PATCH method for updating data -->

                <div class="form-group mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control mt-1 block w-full" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <p class="text-gray-500">{{ $user->email }}</p>
                </div>

                <div class="form-group mb-4">
                    <label for="phone_number" class="block text-gray-700">Phone Number</label>
                    <input id="phone_number" type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control mt-1 block w-full" required>
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="role" class="block text-gray-700">Role</label>
                    <p class="text-gray-500">{{ $user->role }}</p>
                </div>
                @if (Auth::user()->role === 'jobseeker')
                <div class="form-group mb-4">
                    <label for="link" class="block text-gray-700">CV / Portfolio Link</label>
                    <input id="link" type="text" name="link" value="{{ $user->link }}" class="form-control mt-1 block w-full">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @endif
                <div>
                    @if (session('status'))
                        <div class="text-green-500">
                            {{ session('status') === 'profile-updated' ? 'Profile updated successfully!' : '' }}
                        </div>
                    @endif
                </div>

                <div class="flex justify-center items-center mt-4">
                    <button type="submit" class="flex w-full justify-center items-center rounded-lg btn btn-primary text-white p-2 bg-black">
                        Update Profile
                    </button>
                </div>
            </form>
            <div class="mt-4 w-full">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex w-full justify-center items-center rounded-lg p-2 text-red-500">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
