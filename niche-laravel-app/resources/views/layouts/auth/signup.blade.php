@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Sign up')

@section('childContent')
    <x-layout-partials.header />
    <div class="mt-20 flex flex-col items-center justify-center space-y-8">
        <!-- Title -->
        <div class="flex flex-col items-center">
            <span style="font-size: 5vw;" class="font-bold text-[#575757]">welcome!</span>
            <span style="font-size: 2vw;" class="font-light text-[#575757]">create an account</span>
        </div>

        <!-- Grid: 2x3 Inputs -->
        <div class="flex flex-col lg:flex-row gap-4">

          <!-- LEFT COLUMN -->
          <div class="flex flex-col gap-4" >

            <div class="w-full max-x-8xl">
              <input
                type="text"
                placeholder="First Name"
                class="w-full h-14 rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
              />
            </div>

            <div class="w-full max-x-8xl">
              <input
                type="text"
                placeholder="Last Name"
                class="w-full h-14 rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
              />
            </div>

            <div class="relative w-full max-x-8xl">
              <div class="h-14 flex items-center relative">
                <select
                  id="program-select"
                  class="appearance-none w-full h-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] text-base leading-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                >
                  <option value="" disabled selected>Select your program</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSCS">BSCS</option>
                  <option value="BSEMC">BSEMC</option>
                  <option value="BSIS">BSIS</option>
                </select>
                <div class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 text-[#575757]">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="flex flex-col gap-4">

          <div class="w-full max-x-8xl">
            <input
              type="email"
              placeholder="USeP Email"
              class="w-full h-14 rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
              pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$"
              title="Please enter a valid USeP email (e.g., example@usep.edu.ph)"
              required
            />
          </div>

          <div class="w-full max-x-8xl">
            <input
              id="password"
              type="password"
              placeholder="Password"
              class="w-full h-14 rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
            />
          </div>

          <div class="w-full max-x-8xl flex flex-col">
            <input
              id="confirm-password"
              type="password"
              placeholder="Confirm password"
              class="w-full h-14 rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
            />
            <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
              <input
                type="checkbox"
                id="show-password-toggle"
                class="h-4 w-4 accent-[#575757] hover:cursor-pointer"
                onclick="togglePasswordVisibility()"
              />
              <span class="hover:cursor-pointer">Show password</span>
            </label>
          </div>

        </div>
      </div>

        <!-- Centered Buttons Below -->
        <div class="flex flex-col items-center space-y-2">
            <button
                class="h-10 w-50 rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] font-semibold text-[#fffff0] px-10 py-9 transition duration-200 hover:cursor-pointer hover:brightness-110">
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
