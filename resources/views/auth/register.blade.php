<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <br />
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
            <div class="w-full flex items-center">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <br />
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            <div class="w-full flex items-center">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Role Selection -->
        <div class="form-group mt-3">
            <label>Role</label>
            <div class="flex space-x-4">
                <button type="button" id="jobseeker-btn" class="btn btn-outline" onclick="setRole('jobseeker')">Jobseeker</button>
                <button type="button" id="recruiter-btn" class="btn btn-outline" onclick="setRole('recruiter')">Recruiter</button>
            </div>
            <input type="hidden" id="role" name="role" value=""> <!-- Default role -->
            <div class="w-full flex items-center">
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="password">Password</label>
            <br />
            <input id="password" class="form-control" type="password" name="password" required>
            <div class="w-full flex items-center">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group mt-3">
            <label for="password_confirmation">Confirm Password</label>
            <br />
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
            <div class="w-full flex items-center">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="flex justify-center items-center mt-4">
            <button type="submit" class="flex w-full justify-center items-center rounded-lg btn btn-primary text-white p-2 bg-black">
                Register
            </button>
        </div>
        
        <div class="flex justify-center items-center mt-4">
            <a class="text-sm text-muted" href="{{ route('login') }}">
                Already Registered? Login here
            </a>
        </div>
    </form>

    <script>
        function setRole(role) {
            document.getElementById('role').value = role;
            document.getElementById('jobseeker-btn').classList.toggle('bg-blue-500', role === 'jobseeker');
            document.getElementById('recruiter-btn').classList.toggle('bg-blue-500', role === 'recruiter');
        }
    </script>
</x-guest-layout>
