<div id="universal-ok-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 p-4">
    <div id="ok-popup" 
        class="w-full max-w-md md:min-w-[20vw] md:max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-6 sm:p-8 block">

        <!-- Icon -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                stroke-width="1.5" stroke="#575757" 
                class="w-16 h-16 sm:w-20 sm:h-20">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <!-- Title -->
        <div class="text-center text-lg sm:text-xl font-semibold mt-8 sm:mt-10">
            <span id="OKtopText" class="text-[#575757]">
                Successfully Changed Account Details!
            </span>
        </div>

        <!-- Message -->
        <div class="text-center mt-4 sm:mt-5 text-sm sm:text-base font-light">
            <span id="OKsubText" class="text-[#575757]">
                Successfully altered this account’s information.
            </span>
        </div>

        <!-- Button -->
        <div class="mt-8 sm:mt-12 flex justify-center">
            <button id="uniOK-confirm-btn" 
                class="w-full sm:w-auto px-8 sm:px-10 py-3 sm:py-4 rounded-full text-[#fdfdfd] 
                       bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>


<script>
    document.getElementById('uniOK-confirm-btn').addEventListener('click', function() {
        document.getElementById('universal-ok-popup').style.display = 'none';
    });
</script>