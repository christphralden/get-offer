<x-app-layout>
    <div class="mt-20 ml-10">
        <h2 class="text-black font-bold text-4xl pt-5">Edit Profile</h2>
    </div>
    <div class="mt-10 flex justify-center">
        <form action="{{ route('editProfile.update') }}" method="POST" class="w-full max-w-lg">
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
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control mt-1 block w-full" required readonly>
                <!-- Make email field readonly to prevent changes -->
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="phoneNumber" class="block text-gray-700">Phone Number</label>
                <input id="phoneNumber" type="text" name="phoneNumber" value="{{ old('phoneNumber', $user->phoneNumber) }}" class="form-control mt-1 block w-full" required>
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="role" class="block text-gray-700">Role</label>
                <input id="role" type="text" name="role" value="{{ $user->role }}" class="form-control mt-1 block w-full" readonly>
                <!-- Make role field readonly to prevent changes -->
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
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
    </div>
    <div class="mt-4 w-full">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="flex w-full justify-center items-center rounded-lg btn btn-primary text-white p-2 bg-red-500">
                Logout
            </button>
        </form>
    </div>
</x-app-layout>
