@extends('layouts.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Sign up')

@section('childContent')
    <x-layout-partials.header />
    <div class="mt-20 flex flex-col items-center justify-center space-y-8">
        <!-- Title -->
        <div class="mb-5 flex flex-col items-center">
            <span class="text-8xl font-bold text-[#575757]">welcome!</span>
            <span class="mt-3 text-3xl font-light text-[#575757]">create an account</span>
        </div>

        <!-- Grid: 2x3 Inputs -->
        <div class="grid grid-cols-2 gap-x-8 gap-y-6">
            <input type="text" placeholder="First Name"
                class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
            <input type="text" placeholder="Last Name"
                class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
            <input type="email" placeholder="USeP Email"
                class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$"
                title="Please enter a valid USeP email (e.g., example@usep.edu.ph)" required />
            <input id="password" type="password" placeholder="Password"
                class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

            <!-- Program Dropdown -->
            <div class="relative w-[350px]">
                <select id="program-select"
                    class="hover: h-[65px] w-full cursor-pointer appearance-none rounded-[10px] border border-[#575757] bg-[#fffff0] px-4 pr-10 font-light text-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none">
                    <option value="" disabled selected>Select your program</option>
                    <option value="BSIT">BSIT - Information Technology</option>
                    <option value="BSCS">BSCS - Computer Science</option>
                    <option value="BSEMC">BSEMC - Entertainment and Multimedia Computing</option>
                    <option value="BSIS">BSIS - Information Systems</option>
                </select>

                <!-- Chevron Icon -->
                <div id="chevron-icon"
                    class="top-8.5 pointer-events-none absolute right-5 -translate-y-1/2 transform text-[#575757] transition-transform duration-200">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Confirm Password + Show Toggle -->
            <div class="flex w-[350px] flex-col">
                <input id="confirm-password" type="password" placeholder="Confirm password"
                    class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                    <input type="checkbox" id="show-password-toggle" class="h-4 w-4 accent-[#575757] hover:cursor-pointer"
                        onclick="togglePasswordVisibility()" />
                    <span class="hover:cursor-pointer">Show password</span>
                </label>
            </div>
        </div>

        <!-- Centered Buttons Below -->
        <div class="flex flex-col items-center space-y-2">
            <button
                class="h-[60px] w-[300px] rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                Create account
            </button>
            <button
                class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                Already have an account?
            </button>
        </div>
    </div>
    <x-layout-partials.footer />
@endsection
