<div id="forgot-password-success-modal" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <!-- Success Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span class="text-[#575757]">Password reset link sent!</span>
            <div class="mt-2 text-sm font-normal text-[#575757]">
                If this email exists in our system, you'll receive a reset link shortly.
                Please check your inbox and spam folder.
            </div>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="fp-success-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#4CAF50] to-[#2E7D32] px-10 py-4 text-[#fdfdfd] shadow hover:brightness-110">
                OK
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Close modal on button click
        document.getElementById('fp-success-confirm-btn').addEventListener('click', () => {
            document.getElementById('forgot-password-success-modal').style.display = 'none';
        });

        // Auto-show if session has success message
        @if (session('showForgotPasswordSuccessModal'))
            document.getElementById('forgot-password-success-modal').style.display = 'flex';
        @endif
    });
</script>
