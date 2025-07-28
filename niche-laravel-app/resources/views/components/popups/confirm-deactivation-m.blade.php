<div id="confirm-deactivation-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">
        <!-- Close Button -->
        <button id="cdr-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Icon -->
        <div class="mt-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#575757" class="h-20 w-20 rotate-[7.5deg]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 10v10a2 2 0 002 2h8a2 2 0 002-2V10M9 10v8m6-8v8M4 6h16M10 6V4a1 1 0 011-1h2a1 1 0 011 1v2" />
            </svg>
        </div>

        <!-- STEP 1 -->
        <div id="cdr-step1">
            <div class="mt-8 text-center text-xl font-semibold">
                <span class="text-[#575757]">Do you want to</span>
                <span class="text-[#ED2828]">deactivate</span>
                <span class="text-[#575757]">your account?</span>
            </div>

            <div class="mt-8 text-center text-base font-light">
                <span class="text-[#575757]">
                    Your account will be <span class="font-semibold">deactivated immediately</span> but not permanently
                    deleted.
                    You'll have <span class="font-semibold text-[#27C50D]">30 days</span> to reactivate your account by
                    simply logging in.
                </span>
                <div class="mt-4 text-[#575757]">
                    <span class="font-semibold text-[#ED2828]">After 30 days</span>, your account and all associated
                    data will be <span class="font-semibold">permanently deleted</span>.
                </div>
            </div>

            <div class="mt-10 flex justify-center space-x-6">
                <button id="cdr-cancel-btn1"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fdfdfd] hover:from-[#cccaca] hover:to-[#888888]">
                    Cancel
                </button>
                <button id="cdr-next-step1"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] text-[#fdfdfd] hover:from-[#f87c7c] hover:to-[#e76969]">
                    Proceed
                </button>
            </div>
        </div>

        <!-- STEP 2 -->
        <div id="cdr-step2" class="hidden">
            <div class="mt-8 text-center text-xl font-semibold">
                <span class="text-[#575757]">Final Confirmation</span>
            </div>

            <div class="mt-8 text-center text-base font-light">
                <span class="text-[#575757]">Type <span class="font-bold text-[#ED2828]">"DEACTIVATE"</span> to confirm
                    account deletion:</span>
            </div>

            <div class="mt-4">
                <input id="deactivation-confirmation" type="text" placeholder="Type DEACTIVATE here"
                    class="w-full rounded-lg border border-[#575757] px-4 py-2 text-center font-light text-[#575757] focus:outline-none">
                <div id="confirmation-error" class="mt-1 hidden text-center text-sm text-red-500">
                    You must type exactly "DEACTIVATE" to proceed
                </div>
            </div>

            <div class="mt-6 flex justify-center space-x-6">
                <button id="cdr-back-btn"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fdfdfd] hover:from-[#cccaca] hover:to-[#888888]">
                    Back
                </button>
                <button id="cdr-confirm-btn" disabled
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] text-[#fdfdfd] opacity-50 hover:from-[#f87c7c] hover:to-[#e76969]">
                    Confirm
                </button>
            </div>
        </div>

        <!-- STEP 3 -->
        <div id="cdr-step3" class="hidden">
            <div class="mt-8 text-center text-xl font-semibold text-[#575757]">
                Account Deactivated
            </div>

            <div id="deactivation-success-message" class="mt-4 text-center text-base font-light text-[#575757]">
                Your account has been successfully deactivated. You will be logged out shortly.
            </div>

            <div class="mt-6 flex justify-center">
                <button onclick="window.location.href='/'"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fdfdfd] hover:from-[#cccaca] hover:to-[#888888]">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Elements
        const popup = document.getElementById('confirm-deactivation-popup');
        const step1 = document.getElementById('cdr-step1');
        const step2 = document.getElementById('cdr-step2');
        const step3 = document.getElementById('cdr-step3');
        const nextBtn = document.getElementById('cdr-next-step1');
        const backBtn = document.getElementById('cdr-back-btn');
        const confirmBtn = document.getElementById('cdr-confirm-btn');
        const cancelBtn = document.getElementById('cdr-cancel-btn1');
        const closeBtn = document.getElementById('cdr-close-popup');
        const finalCloseBtn = document.getElementById('cdr-final-close1');
        const confirmationInput = document.getElementById('deactivation-confirmation');
        const errorMessage = document.getElementById('confirmation-error');

        // Open popup when deactivate button is clicked
        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === 'deactivate-user-btn') {
                resetPopup();
                popup.style.display = 'flex';
            }
        });

        // Reset popup to initial state
        function resetPopup() {
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            step3.classList.add('hidden');
            confirmationInput.value = '';
            confirmBtn.disabled = true;
            confirmBtn.classList.add('opacity-50');
            confirmBtn.textContent = 'Confirm';
            errorMessage.classList.add('hidden');
        }

        // Step 1 → Step 2 (Continue button)
        nextBtn.addEventListener('click', function() {
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            confirmationInput.focus();
        });

        // Step 2 → Step 1 (Back button)
        backBtn.addEventListener('click', function() {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
        });

        // Validate confirmation input
        confirmationInput.addEventListener('input', function() {
            const isValid = this.value.toUpperCase() === 'DEACTIVATE';
            confirmBtn.disabled = !isValid;
            confirmBtn.classList.toggle('opacity-50', !isValid);
            errorMessage.classList.add('hidden');
        });

        // Final confirmation
        confirmBtn.addEventListener('click', async function() {
            if (confirmationInput.value.toUpperCase() !== 'DEACTIVATE') {
                errorMessage.classList.remove('hidden');
                return;
            }

            const originalText = confirmBtn.innerHTML;
            confirmBtn.disabled = true;
            confirmBtn.innerHTML = `
        <span class="inline-flex items-center">
            <svg class="mr-2 h-4 w-4 animate-spin" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Processing...
        </span>
    `;

            try {
                const response = await fetch('{{ route('account.deactivate') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Deactivation failed');
                }

                // Show success message
                const successMessage = document.getElementById('deactivation-success-message');
                if (successMessage) {
                    successMessage.textContent = data.message;
                    successMessage.classList.remove('hidden');
                }

                // Hide current step and show success step
                step2.classList.add('hidden');
                step3.classList.remove('hidden');

                // Redirect after delay
                if (data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 3000);
                }

            } catch (error) {
                console.error('Deactivation failed:', error);

                // Show error message
                const errorDisplay = document.getElementById('deactivation-error-display');
                if (errorDisplay) {
                    errorDisplay.textContent = error.message;
                    errorDisplay.classList.remove('hidden');
                }

                // Reset button state
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = originalText;
            }
        });

        // Close handlers
        [cancelBtn, closeBtn].forEach(btn => {
            btn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        });

        // Allow closing with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && popup.style.display === 'flex') {
                popup.style.display = 'none';
            }
        });
    });
</script>
