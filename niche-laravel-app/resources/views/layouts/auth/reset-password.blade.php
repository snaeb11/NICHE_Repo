@extends('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd]'])
@section('title', 'Reset Password')

@section('childContent')
    <x-layout-partials.header />

    <form method="POST" action="{{ route('password.update') }}"
        class="-mt-8 flex w-full flex-grow items-center justify-center">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-600">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-10 flex flex-col items-center justify-center space-y-8 px-4 md:px-8">
            <!-- Title -->
            <div class="flex flex-col items-center">
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">Reset Your Password</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">Enter your new password below.</span>
            </div>

            <!-- Email + Password Fields -->
            <div class="flex flex-col gap-4">
                <!-- Email Field (readonly) -->
                <div class="flex flex-row items-center gap-1.5">
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" readonly
                        class="min-h-[45px] w-full rounded-[10px] border border-[#575757] bg-gray-100 px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] focus:outline-none md:w-[300px] lg:w-[20vw]" />
                </div>

                <!-- New Password Field with Help Icon -->
                <div class="flex flex-row items-center gap-1.5">
                    <input id="new-password" type="password" name="password" placeholder="New Password"
                        class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] focus:outline-none md:w-[300px] lg:w-[20vw]"
                        required minlength="8" />

                    <div>
                        <!-- Help Icon -->
                        <div id="password-help-icon" class="group relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer text-[#575757]"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div
                                class="absolute bottom-full right-0 z-10 mb-2 hidden w-64 rounded-lg border border-[#575757] bg-white p-2 text-sm text-[#575757] shadow-lg group-hover:block">
                                Password must contain:
                                <ul class="mt-1 list-disc pl-5">
                                    <li id="length-req">At least 8 characters</li>
                                    <li id="upper-req">One uppercase letter</li>
                                    <li id="lower-req">One lowercase letter</li>
                                    <li id="number-req">One number</li>
                                    <li id="special-req">One special character</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Validation Icon -->
                        <div id="password-validation" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="flex flex-col">
                    <div class="flex flex-row items-center gap-1.5">
                        <input id="confirm-password" type="password" name="password_confirmation"
                            placeholder="Confirm Password"
                            class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] focus:outline-none md:w-[300px] lg:w-[20vw]"
                            required minlength="8" />

                        <!-- Validation Icon -->
                        <div id="confirm-password-validation" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <!-- Show Password Toggle -->
                    <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                        <input type="checkbox" id="show-password-toggle"
                            class="h-4 w-4 accent-[#575757] hover:cursor-pointer" onclick="togglePasswordVisibility()" />
                        <span class="hover:cursor-pointer">Show password</span>
                    </label>
                </div>
            </div>

            <!-- Centered Button -->
            <div class="flex flex-col items-center space-y-2">
                <button
                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fdfdfd] transition duration-200 hover:cursor-pointer hover:brightness-110">
                    Reset Password
                </button>
                <a href="{{ route('login') }}"
                    class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                    Back to Login
                </a>
            </div>
        </div>
    </form>

    <div class="mt-4 h-11"></div>
    <x-layout-partials.footer />

    <script>
        function togglePasswordVisibility() {
            const newPassword = document.getElementById('new-password');
            const confirmPassword = document.getElementById('confirm-password');
            const toggle = document.getElementById('show-password-toggle');

            if (toggle.checked) {
                newPassword.type = 'text';
                confirmPassword.type = 'text';
            } else {
                newPassword.type = 'password';
                confirmPassword.type = 'password';
            }
        }

        // Password validation
        const passwordInput = document.getElementById('new-password');
        const passwordLength = document.getElementById('length-req');
        const passwordUppercase = document.getElementById('upper-req');
        const passwordLowercase = document.getElementById('lower-req');
        const passwordNumber = document.getElementById('number-req');
        const passwordSpecial = document.getElementById('special-req');
        const passwordHelpIcon = document.getElementById('password-help-icon');
        const passwordValidation = document.getElementById('password-validation');

        passwordInput.addEventListener('input', function() {
            const password = this.value;

            // Check requirements
            const hasLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[^A-Za-z0-9]/.test(password);
            const allValid = hasLength && hasUpper && hasLower && hasNumber && hasSpecial;

            // Update requirement text colors
            passwordLength.style.color = hasLength ? '#16a34a' : '#575757';
            passwordUppercase.style.color = hasUpper ? '#16a34a' : '#575757';
            passwordLowercase.style.color = hasLower ? '#16a34a' : '#575757';
            passwordNumber.style.color = hasNumber ? '#16a34a' : '#575757';
            passwordSpecial.style.color = hasSpecial ? '#16a34a' : '#575757';

            // Show validation icon when all requirements are met
            if (password && allValid) {
                passwordValidation.classList.remove('hidden');
                passwordHelpIcon.classList.add('hidden');
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            } else {
                passwordValidation.classList.add('hidden');
                passwordHelpIcon.classList.remove('hidden');
                this.classList.remove('border-green-500');
                if (password) {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            }
        });

        // Password match validation
        const confirmPasswordInput = document.getElementById('confirm-password');
        const confirmPasswordValidation = document.getElementById('confirm-password-validation');
        const form = document.querySelector('form');

        function checkPasswordMatch() {
            if (passwordInput.value && confirmPasswordInput.value) {
                if (passwordInput.value === confirmPasswordInput.value) {
                    confirmPasswordValidation.classList.remove('hidden');
                    confirmPasswordInput.classList.remove('border-red-500');
                    confirmPasswordInput.classList.add('border-green-500');
                    confirmPasswordInput.setCustomValidity('');
                } else {
                    confirmPasswordValidation.classList.add('hidden');
                    confirmPasswordInput.classList.remove('border-green-500');
                    confirmPasswordInput.classList.add('border-red-500');
                    confirmPasswordInput.setCustomValidity('Passwords do not match');
                }
            } else {
                confirmPasswordValidation.classList.add('hidden');
                confirmPasswordInput.classList.remove('border-green-500', 'border-red-500');
                confirmPasswordInput.setCustomValidity(confirmPasswordInput.required ? 'Please confirm your password' : '');
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        // Form submission handler
        form.addEventListener('submit', function(event) {
            checkPasswordMatch();

            if (passwordInput.value !== confirmPasswordInput.value) {
                event.preventDefault();
                confirmPasswordInput.focus();
                confirmPasswordInput.setCustomValidity('Passwords do not match');
                confirmPasswordInput.reportValidity();
            }
        });
    </script>
@endsection
