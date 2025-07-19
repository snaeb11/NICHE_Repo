@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Login')

@section('childContent')
    <x-layout-partials.header />

    <form method="POST" action="{{ route('login') }}" class="-mt-8 flex w-full flex-grow items-center justify-center">
        @csrf

        @csrf

        <div class="flex flex-col items-center justify-center space-y-8 px-4 md:px-8">
            <!-- Title -->
            <div class="flex flex-col items-center">
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">welcome!</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">login</span>
            </div>

            <!-- Inputs -->
            <div class="flex flex-col items-center gap-4">
                <input type="email" name="email" placeholder="USeP Email" value="{{ old('email') }}"
                    pattern="[A-Za-z0-9._%+-]+@usep\.edu\.ph" required autocomplete="email"
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:outline-none md:w-[300px] lg:w-[20vw]" />

                <!-- Password + Show Toggle -->
                <div class="flex w-full flex-col md:w-[300px] lg:w-[20vw]">
                    <input id="password" type="password" name="password" placeholder="Password" required minlength="8"
                        autocomplete="current-password"
                        class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:outline-none" />

                    <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                        <input type="checkbox" id="show-password-toggle"
                            class="h-4 w-4 accent-[#575757] hover:cursor-pointer" onclick="togglePasswordVisibility()" />
                        <span class="hover:cursor-pointer">Show password</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col items-center space-y-2">
                <button type="submit"
                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                    Login
                </button>

                <a href="{{ route('signup') }}"
                    class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                    Create an account
                </a>

                <!-- Forgot password link -->
                <a href="{{ route('password.request') }}"
                    class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                    Forgot password?
                </a>
            </div>
        </div>
    </form>

    <x-layout-partials.footer />

    <script>
        function togglePasswordVisibility() {
            const password = document.getElementById('password');
            const toggle = document.getElementById('show-password-toggle');
            password.type = toggle.checked ? 'text' : 'password';
        }
    </script>

@endsection
