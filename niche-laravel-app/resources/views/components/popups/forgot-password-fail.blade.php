<div id="forgot-password-fail-modal" style="display: flex;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <!-- Fail Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span class="text-[#575757]">{{ $message ?? 'Failed to send reset link.' }}</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="fp-fail-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#FF5656] to-[#DF0606] px-10 py-4 text-[#fffff0] shadow hover:brightness-110">
                OK
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('fp-fail-confirm-btn').addEventListener('click', () => {
        document.getElementById('forgot-password-fail-modal').style.display = 'none';
    });
</script>
