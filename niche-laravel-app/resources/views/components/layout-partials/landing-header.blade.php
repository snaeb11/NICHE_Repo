<!-- Top Gradient -->
<div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

<!-- Navbar -->
<nav
    class="flex h-[3.8vw] items-center justify-between border-b border-b-[#dddddd] bg-[#fffff0] px-6 py-2 shadow-sm md:px-12 lg:px-24">
    <div class="flex items-center space-x-8">
        <a href="{{ route('home') }}"
            class="{{ Route::currentRouteName() === 'home' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }} text-sm font-semibold">
            Home
        </a>
        <a href="{{ route('downloads') }}"
            class="{{ Route::currentRouteName() === 'downloads' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }} text-sm font-semibold">
            Downloadable forms
        </a>
    </div>

    <!-- Right Side -->
    <div>
        @guest
            <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-[#9D3E3E]">
                Login
            </a>
        @endguest

        @auth
            <div class="flex items-center space-x-4">
                <span class="text-sm font-semibold">
                    Welcome, {{ Auth::user()->first_name }}
                </span>

                <!-- Separator -->
                <div class="h-5 w-px bg-gray-300"></div>

                <!-- Logout Trigger -->
                <button type="button" class="flex items-center text-[#575757] hover:text-[#9D3E3E]"
                    onclick="document.getElementById('logout-popup').style.display = 'flex';" title="Logout">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                </button>
            </div>
        @endauth
    </div>
</nav>
