<div class="h-[0.5vw] w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>
<nav class="flex h-[5vw] w-full items-center justify-between border-b border-b-[#dddddd] bg-[#fffff0] px-6 shadow-sm">
    <!-- Left Side -->
    <div class="ml-[5vw] flex items-center space-x-3">
        <!-- Circle -->
        <div
            class="flex h-[2.5vw] w-[2.5vw] items-center justify-center rounded-full bg-[#575757] text-[3vw] font-semibold text-white">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/usep-logo.png') }}" alt="CTET Logo" class="h-full w-full object-cover" />
            </a>
        </div>

        <div class="h-[3vh] w-[1px] bg-[#dddddd]"></div>

        <!-- Text -->
        <a href="{{ url('/') }}">
            <span class="text-[clamp(1.3vw,1.4vw,1.3vw)] font-semibold text-[#575757]">
                University of Southeastern Philippines
            </span>
        </a>
    </div>

    <!-- Right Side -->
    <div class="mr-[5vw] flex items-center space-x-3">
        <!-- Text -->
        <div class="flex flex-col items-end">
            <span class="text-right text-[clamp(1.2vw,1.4vw,1.2vw)] font-semibold leading-tight text-[#575757]">
                College of Teacher Education and Technology
            </span>
            <span class="font-regular text-[clamp(1vw,1.3vw,1vw)] leading-tight text-[#575757]">
                Research Office
            </span>
        </div>

        <!-- Circle -->
        <div
            class="flex h-[2.5vw] w-[2.5vw] items-center justify-center rounded-full bg-[#575757] text-sm font-semibold text-white">
            <img src="{{ asset('assets/ctet-logo.png') }}" alt="CTET Logo" class="h-full w-full object-cover" />
        </div>
    </div>
</nav>
