<!-- Wrapper for the modal -->
<div id="first-time-user-login-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">

        <!-- X Button -->
        <button id="ftul-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="ftul-step1" class="mt-0 flex flex-col items-center justify-center space-y-6">
            <!-- Check Icon -->
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#575757" class="h-20 w-20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
            </div>

            <!-- Main Message -->
            <div class="text-center text-xl font-medium text-[#575757]">
                Verify Your Email
            </div>

            <!-- Subtext -->
            <div class="text-center text-base font-light text-[#575757]">
                Please confirm your account by entering the security code sent to
                <span id="user-email" class="font-semibold"><span id="user-email" class="font-semibold">
                        {{ session('verification_email', '--email@usep.edu.ph--') }}
                    </span>
                </span>
            </div>

            <!-- Input and Buttons Wrapper -->
            <div class="flex w-[20vw] flex-col space-y-4">
                <!-- Input Field -->
                <input type="text" placeholder="Security code" inputmode="numeric" maxlength="6"
                    class="code-input h-[65px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

                <!-- Resend Code Link -->
                <div class="text-left">
                    <button
                        class="text-sm font-light text-[#575757] underline transition duration-150 hover:text-[#9D3E3E]">
                        Resend code
                    </button>
                </div>

                <!-- Confirm Button (Right aligned) -->
                <div class="flex justify-end">
                    <button id="ftul-confirm-btn" disabled
                        class="min-h-[3vw] min-w-[10vw] cursor-not-allowed rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] text-[#fffff0] opacity-50 transition duration-200">
                        Submit code
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to close the popup -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resendButton = document.querySelector('.text-left button');
        const ftulClosePopup = document.getElementById('ftul-close-popup');
        const codeInput = document.querySelector('.code-input');
        const ftulConfirmBtn = document.getElementById('ftul-confirm-btn');
        const emailVerifiedPopup = document.getElementById('email-verified-popup');
        const evConfirmBtn = document.getElementById('ev-confirm-btn');

        // Enable/disable submit button based on input
        codeInput.addEventListener('input', function() {
            codeInput.value = codeInput.value.replace(/\D/g, '');
            const isValid = /^\d{6}$/.test(codeInput.value);
            ftulConfirmBtn.disabled = !isValid;

            if (isValid) {
                ftulConfirmBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                ftulConfirmBtn.classList.add('hover:from-[#f18e8e]', 'hover:to-[#d16868]');
            } else {
                ftulConfirmBtn.classList.add('opacity-50', 'cursor-not-allowed');
                ftulConfirmBtn.classList.remove('hover:from-[#f18e8e]', 'hover:to-[#d16868]');
            }
        });

        // Close popup
        ftulClosePopup.addEventListener('click', function() {
            document.getElementById('first-time-user-login-popup').style.display = 'none';
        });

        // Resend code functionality
        resendButton.addEventListener('click', function() {
            resendButton.disabled = true;
            let secondsLeft = 60;
            resendButton.textContent = `Resend code (${secondsLeft}s)`;
            resendButton.classList.remove('hover:text-[#9D3E3E]');
            resendButton.style.cursor = 'not-allowed';

            fetch("{{ route('verification.resend') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    credentials: "same-origin"
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert('Failed to send verification email. Please try again.');
                    clearInterval(countdown);
                    resendButton.textContent = 'Resend code';
                    resendButton.disabled = false;
                    resendButton.classList.add('hover:text-[#9D3E3E]');
                    resendButton.style.cursor = 'pointer';
                });

            const countdown = setInterval(function() {
                secondsLeft--;
                resendButton.textContent = `Resend code (${secondsLeft}s)`;
                if (secondsLeft <= 0) {
                    clearInterval(countdown);
                    resendButton.textContent = 'Resend code';
                    resendButton.disabled = false;
                    resendButton.classList.add('hover:text-[#9D3E3E]');
                    resendButton.style.cursor = 'pointer';
                }
            }, 1000);
        });

        // Submit verification code
        ftulConfirmBtn?.addEventListener('click', function() {
            const code = codeInput.value;
            const btn = this;
            btn.disabled = true;
            btn.innerHTML = 'Verifying...';

            fetch("{{ route('verify.code') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        code
                    }),
                    credentials: "same-origin"
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        // Show success modal
                        document.getElementById('first-time-user-login-popup').style.display =
                            'none';
                        emailVerifiedPopup.style.display = 'flex';
                    } else {
                        alert(data.message || 'Verification failed');
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert('Verification failed. Please try again.');
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerHTML = 'Submit code';
                });
        });

        // Confirm button in success modal
        evConfirmBtn?.addEventListener('click', () => {
            emailVerifiedPopup.style.display = 'none';
            window.location.href = "{{ route('home') }}";
        });
    });

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') e.preventDefault();
    });
</script>
