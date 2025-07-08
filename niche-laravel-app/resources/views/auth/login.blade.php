@extends('layouts.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Login')

@section('childContent')
    <x-layout-partials.header />
    <div class="mt-20 flex flex-col items-center justify-center space-y-8">
        <!-- Title -->
        <div class="mb-5 flex flex-col items-center">
            <span class="text-8xl font-bold text-[#575757]">welcome!</span>
            <span class="mt-3 text-3xl font-light text-[#575757]">login </span>
        </div>

        <!-- Grid: 2x3 Inputs -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-6">
            <input type="email" placeholder="USeP Email"
                class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$"
                title="Please enter a valid USeP email (e.g., example@usep.edu.ph)" required />

            <!-- Password + Show Toggle -->
            <div class="flex w-[350px] flex-col">
                <input id="password" type="password" placeholder="Password"
                    class="h-[65px] w-[350px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

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
                class="h-[60px] w-[150px] rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                Login
            </button>
            <button
                class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                Create an account
            </button>
            <button
                class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                Forgot password?
            </button>
        </div>
    </div>
    <div class="mt-4 h-11"></div>
    <x-layout-partials.footer />
@endsection
