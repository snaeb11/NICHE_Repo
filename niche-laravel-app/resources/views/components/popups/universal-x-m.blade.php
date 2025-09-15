<div id="universal-x-popup" style="display: none;" 
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 p-4 sm:p-6 md:p-8">
    
    <!-- Modal Card -->
    <div id="x-popup" 
        class="relative w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl 
               max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl p-6 sm:p-8 overflow-y-auto">
        
        <!-- Icon -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" 
                class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <!-- Title -->
        <div class="mt-6 sm:mt-8 text-center text-lg sm:text-xl md:text-2xl font-semibold text-[#575757]">
            <span id="x-topText">Successfully Changed Account Details!</span>
        </div>

        <!-- Subtitle -->
        <div class="mt-3 sm:mt-4 text-center text-sm sm:text-base md:text-lg font-normal text-[#575757]">
            <span id="x-subText">Successfully altered this account’s information.</span>
        </div>

        <!-- Button -->
        <div class="mt-8 sm:mt-12 flex justify-center">
            <button id="uniX-confirm-btn" 
                class="rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] 
                       px-6 py-2 sm:px-8 sm:py-3 md:px-10 md:py-4 
                       text-sm sm:text-base md:text-lg text-[#fdfdfd] 
                       shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>


<script>
    document.getElementById('uniX-confirm-btn').addEventListener('click', function() {
        document.getElementById('universal-x-popup').style.display = 'none';
    });
</script>