<!-- Login Fail Modal -->
<div id="login-fail-modal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span id="lf-title" class="text-[#575757]">Login failed.</span>
        </div>

        <div class="text-normal font-regular mt-5 text-center">
            <span id="lf-message" class="text-[#575757]">Please try again.</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="lf-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#FF5656] to-[#DF0606] px-10 py-4 text-[#fdfdfd] shadow hover:brightness-110">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    // Login fail modal handling
    document.addEventListener('DOMContentLoaded', function() {
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
</script>
