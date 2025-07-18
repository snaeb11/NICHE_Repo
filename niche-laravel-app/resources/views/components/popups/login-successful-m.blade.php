<div id="login-success-modal" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[20vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span class="text-[#575757]">Login Successfully!</span>
        </div>

        <div class="text-normal font-regular mt-5 text-center">
            <span class="text-[#575757]">Press confirm to be redirected</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="ls-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-10 py-4 text-[#fffff0] shadow hover:brightness-110">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const confirmBtn = document.getElementById('ls-confirm-btn');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', () => {
                document.getElementById('login-success-modal').style.display = 'none';
            });
        }
    });
</script>
