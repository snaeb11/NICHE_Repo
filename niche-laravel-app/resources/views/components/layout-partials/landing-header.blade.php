<!-- Top Gradient -->
<div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

<!-- Navbar -->
<nav
    class="z-50 flex h-[3.8vw] items-center justify-between border-b border-b-[#dddddd] bg-[#fdfdfd] px-6 py-2 shadow-sm md:px-12 lg:px-24">
    <div class="flex items-center space-x-5">
        <a href="{{ route('home') }}"
            class="{{ Route::currentRouteName() === 'home' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }} text-sm font-semibold">
            Home
        </a>
        <a href="{{ route('downloads') }}"
            class="{{ Route::currentRouteName() === 'downloads' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }} text-sm font-semibold">
            Downloadable forms
        </a>
        <a href="{{ route('user.dashboard') }}"
            class="{{ Route::currentRouteName() === 'user.dashboard' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }} text-sm font-semibold">
            Submit Thesis
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
                    <!-- Dashboard Option -->
                    @if (Auth::user()->hasPermission('view-dashboard'))
                        <a href="{{ route('admin.dashboard') }}"
                            class="block w-full px-4 py-2 text-left text-sm text-[#575757] hover:bg-[#fdfdfd] hover:text-[#9D3E3E]">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                                </svg>
                                Go to Dashboard
                            </div>
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}"
                            class="block w-full px-4 py-2 text-left text-sm text-[#575757] hover:bg-[#fdfdfd] hover:text-[#9D3E3E]">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                                </svg>
                                Go to Dashboard
                            </div>
                        </a>
                    @endif

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
