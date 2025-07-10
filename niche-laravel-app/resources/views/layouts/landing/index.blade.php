@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Home')

@section('childContent')
    <!-- Top Gradient -->
    <div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

    <!-- Responsive Navbar -->
    <nav class="h-[3.8vw] flex justify-between items-center border-b border-b-[#dddddd] bg-[#fffff0] px-6 py-2 shadow-sm md:px-12 lg:px-24"">
        <div class="flex items-center space-x-8">
        <a href="#" class="text-sm font-semibold hover:text-[#9D3E3E] underline">Home</a>
        <a href="#" class="text-sm font-semibold hover:text-[#9D3E3E]">Downloadable forms</a>
        </div>
        <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-[#9D3E3E]">Login</a>
    </nav>

    <section class="flex flex-col items-center py-8 md:py-12 space-y-6 mb-15 mt-10">
        <div class="flex space-x-4 md:space-x-8">
            <div class="h-16 w-16 md:h-20 md:w-20 rounded-full overflow-hidden">
                <img src="assets/usep-logo.png" class="h-full w-full object-cover" />
            </div>
            <div class="h-16 w-16 md:h-20 md:w-20 rounded-full overflow-hidden">
                <img src="assets/ctet-logo.png" class="h-full w-full object-cover" />
            </div>
        </div>

        <h1 class="text-2xl md:text-4xl font-bold text-[#575757]">RESEARCH OFFICE</h1>

        <div class="flex border border-[#575757] rounded overflow-hidden w-[80%] md:w-[30vw]">
            <span class="flex items-center justify-center px-3 text-[#575757]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </span>
            <div class="place-self-center h-5 w-px bg-[#dddddd]"></div>
            <input type="text" placeholder="Search…" class="w-full px-3 py-2 text-sm md:text-base bg-[#fffff0] focus:outline-none">
        </div>
    </section>
    <x-layout-partials.footer />
@endsection
