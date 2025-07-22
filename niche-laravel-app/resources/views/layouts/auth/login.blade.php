@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Login')

@section('childContent')
    <x-layout-partials.header />

    <form method="POST" action="{{ route('login') }}" class="-mt-8 flex w-full flex-grow items-center justify-center">
        @csrf

        <div class="flex flex-col items-center justify-center space-y-8 px-4 md:px-8">
            <!-- Title -->
            <div class="flex flex-col items-center">
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">welcome!</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">login</span>
            </div>

            <!-- Inputs -->
            <div class="flex flex-col items-center gap-4">
                <input type="email" name="email" placeholder="USeP Email" pattern="[A-Za-z0-9._%+-]+@usep\.edu\.ph"
                    required autocomplete="email"
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

                <!-- Forgot password button - triggers modal -->
                <button type="button" id="forgot-password-btn"
                    class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                    Forgot password?
                </button>
            </div>
        </div>
    </form>

    <x-layout-partials.footer />

    <!-- Forgot Password Modal -->
    <div id="forgot-password-modal" style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
            <!-- X Button -->
            <button id="forgot-password-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col space-y-6">
                @csrf
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-600">
                        <ul class="list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{!! str_replace('&#039;', "'", e($error)) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Title -->
                <div class="flex flex-col items-center">
                    <span class="text-xl font-medium text-[#575757]">Forgot Password?</span>
                    <span class="text-base font-light text-[#575757]">Enter your USeP email to receive a reset link.</span>
                </div>

                <!-- Email Input -->
                <div class="flex flex-col gap-2">
                    <input type="email" name="email" placeholder="USeP Email" value="{{ old('email') }}"
                        class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$" required />
                </div>

                <!-- Buttons -->
                <div class="flex flex-col items-center space-y-4">
                    <button type="submit"
                        class="w-full rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fffff0] transition duration-200 hover:brightness-110">
                        Send Reset Link
                    </button>
                    <button type="button" id="forgot-password-back-btn"
                        class="text-sm font-light text-[#575757] underline transition duration-150 hover:text-[#9D3E3E]">
                        Back to Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const password = document.getElementById('password');
            const toggle = document.getElementById('show-password-toggle');
            password.type = toggle.checked ? 'text' : 'password';
        }

        // Forgot password modal handling
        document.addEventListener('DOMContentLoaded', function() {
            const forgotPasswordModal = document.getElementById('forgot-password-modal');
            const forgotPasswordBtn = document.getElementById('forgot-password-btn');
            const closeBtn = document.getElementById('forgot-password-close-popup');
            const backBtn = document.getElementById('forgot-password-back-btn');

            // Show modal
            forgotPasswordBtn.addEventListener('click', function() {
                forgotPasswordModal.style.display = 'flex';
            });

            // Hide modal
            function hideModal() {
                forgotPasswordModal.style.display = 'none';
            }

            // Close modal with X button
            closeBtn.addEventListener('click', hideModal);

            // Close modal with back button
            backBtn.addEventListener('click', hideModal);

            // Close when clicking outside modal
            forgotPasswordModal.addEventListener('click', function(e) {
                if (e.target === forgotPasswordModal) {
                    hideModal();
                }
            });

            // Escape key to close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && forgotPasswordModal.style.display === 'flex') {
                    hideModal();
                }
            });

            // Show modal if there are errors
            @if ($errors->has('email') && session('_previous.url') === route('password.request'))
                forgotPasswordModal.style.display = 'flex';
            @endif
        });
    </script>
@endsection
