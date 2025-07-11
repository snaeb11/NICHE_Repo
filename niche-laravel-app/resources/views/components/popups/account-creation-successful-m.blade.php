<div id="account-creation-succ-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="min-w-[20vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">
         <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>

        <div class="text-center text-xl font-semibold mt-10">
            <span class="text-[#575757]">Account Created Successfully!</span>
        </div>

        <div class="text-center mt-5 text-normal font-regular">
            <span class="text-[#575757]">The account <span id="account.name">--account name--</span> has been successfully created</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="acs-confirm-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const confirmBtn = document.getElementById('acs-confirm-btn');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', () => {
                document.getElementById('account-creation-succ-popup').style.display = 'none';
            });
        }
    });
</script>