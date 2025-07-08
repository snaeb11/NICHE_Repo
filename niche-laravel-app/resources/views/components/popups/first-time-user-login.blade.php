<!-- Wrapper for the modal -->
<div id="first-time-user-login-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

    <div class="w-[25vw] max-h-[48vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- ❌ X Button -->
        <button id="ftul-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="ftul-step1"
            class="flex flex-col items-center justify-center mt-0 space-y-6">
            <!-- Check Icon -->
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="#575757" class="w-20 h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
            </div>

            <!-- Main Message -->
            <div class="text-center text-xl font-medium text-[#575757]">
                Two Factor Authentication.
            </div>

            <!-- Subtext -->
            <div class="text-center text-base font-light text-[#575757]">
                Please confirm your account by entering the security code sent to
                <span id="user-email" class="font-semibold">vk********02***@usep.edu.ph</span>
            </div>

            <!-- Input and Buttons Wrapper -->
            <div class="w-[350px] flex flex-col space-y-4">
                <!-- Input Field -->
                <input
                type="text"
                placeholder="Security code"
                class="h-[65px] rounded-[10px] border border-[#575757]
                    placeholder-[#575757] text-[#575757] font-light px-4
                    focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                />

                <!-- Resend Code Link -->
                <div class="text-left">
                <button class="text-[#575757] font-light text-sm underline hover:text-[#9D3E3E] transition duration-150">
                    Resend code
                </button>
                </div>

                <!-- Confirm Button (Right aligned) -->
                <div class="flex justify-end">
                <button
                    id="ftul-confirm-btn"
                    class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r
                    from-[#D56C6C] to-[#9D3E3E] hover:from-[#f18e8e] hover:to-[#d16868] transition duration-200">
                    Submit code
                </button>
                </div>
            </div>
        </div>
  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  document.getElementById('ftul-close-popup').addEventListener('click', function () {
    document.getElementById('first-time-user-login-popup').style.display = 'none';
  });

  document.getElementById('ftul-confirm-btn').addEventListener('click', function () {
    document.getElementById('first-time-user-login-popup').style.display = 'none';
  });
</script>
