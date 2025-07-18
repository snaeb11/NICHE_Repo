<!-- Top Gradient -->
<div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

<!-- Responsive Navbar -->
<nav
    class="flex w-full items-center justify-between border-b border-b-[#dddddd] bg-[#fffff0] px-6 py-2 shadow-sm md:px-12 lg:px-24">
    <!-- Left Side -->
    <div class="flex items-center space-x-3">
        <!-- Circle Logo -->
        <a href="{{ url('/') }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#575757]">
            <img src="{{ asset('assets/usep-logo.png') }}" alt="USeP Logo"
                class="h-full w-full rounded-full object-cover" />
        </a>

        <!-- Divider -->
        <div class="h-5 w-px bg-[#dddddd]"></div>

        <!-- University Name -->
        <a href="{{ url('/') }}">
            <span class="hidden text-[clamp(10px,1.2vw,14px)] font-semibold text-[#575757] sm:inline-block">
                University of Southeastern Philippines
            </span>
        </a>
    </div>

    <!-- Right Side -->
    <div class="flex items-center space-x-3">
        <!-- Office Text -->
        <div class="hidden flex-col items-end text-right sm:flex">
            <span class="text-[clamp(9px,1vw,12px)] font-semibold leading-tight text-[#575757]">
                College of Teacher Education and Technology
            </span>
            <span class="text-[clamp(8px,0.9vw,11px)] font-normal leading-tight text-[#575757]">
                Research Office
            </span>
        </div>

        <!-- CTET Logo -->
        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#575757]">
            <img src="{{ asset('assets/ctet-logo.png') }}" alt="CTET Logo"
                class="h-full w-full rounded-full object-cover" />
        </div>
    </div>
</nav>
