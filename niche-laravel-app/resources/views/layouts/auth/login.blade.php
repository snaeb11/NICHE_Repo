@extends('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd]'])
@section('title', 'Login')

@section('childContent')
    <x-layout-partials.header />

    <form id="login-form" class="-mt-8 flex w-full flex-grow items-center justify-center">
        @csrf

        <div class="flex flex-col items-center justify-center space-y-8 px-4 md:px-8">
            <!-- Title -->
            <div class="flex flex-col items-center">
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">welcome!</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">login</span>
            </div>

            <!-- Inputs -->
            <div class="flex flex-col items-center gap-4">
                <input type="email" name="email" placeholder="USeP Email" pattern="[A-Za-z0-9._%+\-]+@usep\.edu\.ph"
                    required autocomplete="email" id="email-input"
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:outline-none md:w-[300px] lg:w-[20vw]" />

                <!-- Password + Show Toggle -->
                <div class="flex w-full flex-col md:w-[300px] lg:w-[20vw]">
                    <input id="password-input" type="password" name="password" placeholder="Password" required
                        minlength="8" autocomplete="current-password"
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
                <button type="submit" id="login-submit-btn"
                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fdfdfd] transition duration-200 hover:cursor-pointer hover:brightness-110">
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
        <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">
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
                        class="w-full rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fdfdfd] transition duration-200 hover:brightness-110">
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
            const password = document.getElementById('password-input');
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

            // Login fail modal handling
            const loginFailModal = document.getElementById('login-fail-modal');
            const lfConfirmBtn = document.getElementById('lf-confirm-btn');

            // Close modal with confirm button
            if (lfConfirmBtn) {
                lfConfirmBtn.addEventListener('click', () => {
                    loginFailModal.style.display = 'none';
                });
            }

            // Close when clicking outside modal
            loginFailModal.addEventListener('click', function(e) {
                if (e.target === loginFailModal) {
                    loginFailModal.style.display = 'none';
                }
            });

            // Escape key to close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && loginFailModal.style.display === 'flex') {
                    loginFailModal.style.display = 'none';
                }
            });

            // Auto-show if session says so
            @if (session('showLoginFailModal'))
                loginFailModal.style.display = 'flex';
            @endif
        });

        // Login form handling
        document.getElementById('login-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const submitBtn = document.getElementById('login-submit-btn');
            const emailInput = document.getElementById('email-input');
            const passwordInput = document.getElementById('password-input');
            const rememberInput = document.querySelector('input[name="remember"]');
            const loginFailModal = document.getElementById('login-fail-modal');
            const lfTitle = document.getElementById('lf-title');
            const lfMessage = document.getElementById('lf-message');

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="inline-flex items-center">
                    <svg class="mr-2 h-4 w-4 animate-spin" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                </span>
            `;

            try {
                const response = await fetch("{{ route('login') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        email: emailInput.value,
                        password: passwordInput.value,
                        remember: rememberInput ? rememberInput.checked : false
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    // Handle different error cases
                    let errorTitle = 'Login Failed';
                    let errorMessage = 'Please try again.';

                    if (data.verify === true) {
                        const verifyPopup = document.getElementById('first-time-user-login-popup');
                        if (verifyPopup) {
                            verifyPopup.style.display = 'flex';
                        }
                        return;
                    }

                    if (data.errors) {
                        if (data.errors.email) {
                            errorTitle = 'Invalid Email';
                            errorMessage = data.errors.email[0];
                        } else if (data.errors.password) {
                            errorMessage = data.errors.password[0];
                        }
                    } else if (data.message) {
                        // Custom error messages from backend
                        if (data.message.toLowerCase().includes('credentials')) {
                            errorTitle = 'Incorrect Credentials';
                            errorMessage = 'The email or password you entered is incorrect.';
                        } else if (data.message.toLowerCase().includes('not found') ||
                            data.message.toLowerCase().includes('no user')) {
                            errorTitle = 'Account Not Found';
                            errorMessage = 'No user found with this email address.';
                        } else if (data.message.toLowerCase().includes('invalid email')) {
                            errorTitle = 'Invalid Email';
                            errorMessage = 'Please enter a valid USeP email address.';
                        } else {
                            errorMessage = data.message;
                        }
                    }

                    // Show error modal
                    lfTitle.textContent = errorTitle;
                    lfMessage.textContent = errorMessage;
                    loginFailModal.style.display = 'flex';
                    return;
                }

                // Show success modal
                showLoginSuccess({
                    message: `Welcome back, ${data.user?.first_name || ''}!`,
                    redirectUrl: data.redirect || '/'
                });

            } catch (error) {
                // Show error modal for network errors
                lfTitle.textContent = 'Error';
                lfMessage.textContent = 'An error occurred. Please try again.';
                loginFailModal.style.display = 'flex';
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Login';
            }
        });

        function showLoginSuccess({
            message,
            redirectUrl
        }) {
            const modal = document.getElementById('login-success-modal');
            const messageEl = document.getElementById('login-success-message');

            messageEl.textContent = message;
            modal.style.display = 'flex';

            // Redirect after 1.5 seconds
            setTimeout(() => {
                window.location.href = redirectUrl;
            }, 1500);
        }
    </script>
@endsection
