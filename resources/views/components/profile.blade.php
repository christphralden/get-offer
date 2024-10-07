<div class="flex flex-row gap-10 justify-center items-center bg-gray-800">
    <div class="flex flex-row text-white justify-center items-center gap-5">
        @auth
        <span>Hi, {{ Auth::user()->name }}</span>
        @endauth
    </div>
   
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="text-white hover:text-gray-400" aria-label="Logout">Logout</button>
    </form>
</div>