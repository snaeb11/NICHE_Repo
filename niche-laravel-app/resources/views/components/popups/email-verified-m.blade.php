<div id="email-verified-popup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div id="ev-step1" class="min-w-[20vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">
         <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>

        <div class="text-center text-xl font-semibold mt-10">
            <span class="text-[#575757]">Email verified!</span>
        </div>

        <div class="mt-20 flex justify-center">
            <button id="ev-confirm-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    const confirm2Btn = document.getElementById('ev-confirm-btn');
  if (confirm2Btn) {
    confirm2Btn.addEventListener('click', () => {
      document.getElementById('email-verified-popup').style.display = 'none';
    });
  }
</script>