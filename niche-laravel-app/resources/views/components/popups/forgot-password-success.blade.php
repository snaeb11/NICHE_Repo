<div id="forgot-password-success-modal" style="display: flex;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <!-- Success Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span class="text-[#575757]">{{ $message ?? 'Password reset link sent!' }}</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="fp-success-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#4CAF50] to-[#2E7D32] px-10 py-4 text-[#fffff0] shadow hover:brightness-110">
                OK
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fp-success-confirm-btn').addEventListener('click', () => {
            document.getElementById('forgot-password-success-modal').style.display = 'none';
        });
    });
</script>
