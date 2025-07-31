<!-- Top Gradient -->
<div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

<!-- Responsive Navbar -->
<nav
    class="z-50 flex w-full items-center justify-between border-b border-b-[#dddddd] bg-[#fdfdfd] px-6 py-2 shadow-sm md:px-12 lg:px-24">
    <!-- Left Side -->
    <div class="flex items-center space-x-3">
        <!-- Circle Logo -->
        <a href="{{ url('/') }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#575757]">
            <img src="{{ asset('assets/usep-logo.png') }}" alt="USeP Logo"
                class="h-full w-full rounded-full object-cover" />
        </a>

        <!-- Divider -->
        <div class="h-5 w-px bg-[#dddddd]"></div>

        <!-- CTET Logo -->
        <a href="{{ url('/') }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#575757]">
            <img src="{{ asset('assets/ctet-logo.png') }}" alt="CTET Logo"
                class="h-full w-full rounded-full object-cover" />
        </a>

        <!-- TODO: Fix Responsiveness Navbar -->
        <a href="{{ url('/') }}" class="flex-col sm:flex">
            <span class="text-[clamp(9px,1vw,12px)] font-semibold leading-tight text-[#575757]">
                College of Teacher Education and Technology
            </span>
            <span class="text-[clamp(8px,0.9vw,11px)] font-normal leading-tight text-[#575757]">
                Research Office
            </span>
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
            <div class="group relative flex items-center space-x-4">
                <!-- User greeting with dropdown trigger -->
                <div class="flex cursor-pointer items-center">
                    <span class="text-sm font-semibold">
                        Welcome, {{ Auth::user()->decrypted_first_name }}
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="ml-1 h-4 w-4 text-[#575757] transition-colors group-hover:text-[#9D3E3E]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <!-- Dropdown Menu -->
                <div
                    class="invisible absolute right-0 top-full z-50 mt-2 w-48 rounded-md bg-white py-1 opacity-0 shadow-lg transition-all duration-200 group-hover:visible group-hover:opacity-100">
                    <!-- Edit Profile Option -->
                    <a href="{{ route('user.dashboard') }}"
                        class="block w-full px-4 py-2 text-left text-sm text-[#575757] hover:bg-[#fdfdfd] hover:text-[#9D3E3E]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profile
                        </div>
                    </a>

                    <!-- Logout Option -->
                    <button onclick="document.getElementById('logout-popup').style.display = 'flex';"
                        class="block w-full px-4 py-2 text-left text-sm text-[#575757] hover:bg-[#fdfdfd] hover:text-[#9D3E3E]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Logout
                        </div>
                    </button>
                </div>
            </div>
        @endauth
    </div>
</nav>
