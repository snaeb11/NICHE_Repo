<div id="email-taken-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-8">
         <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>

        <div class="text-center text-xl font-semibold mt-10">
            <span class="text-[#575757]">Signup failed.</span>
        </div>

        <div class="text-center mt-5 text-normal font-regular">
            <span class="text-[#575757]">Email already taken. Please try again.</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="emtkn-confirm-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#FF5656] to-[#DF0606] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const confirmBtn = document.getElementById('emtkn-confirm-btn');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', () => {
                document.getElementById('email-taken-popup').style.display = 'none';
            });
        }
    });
</script>