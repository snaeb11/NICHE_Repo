<div id="email-taken-popup" style="display: none;" 
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 p-4">
    <!-- 🔹 CHANGED: responsive width & padding -->
    <div class="w-full max-w-md max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-6 sm:p-8 overflow-y-auto">
        
        <!-- Icon -->
        <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                stroke-width="1" stroke="#575757" 
                class="h-16 w-16 sm:h-20 sm:w-20"> 
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <!-- Title -->
        <div class="text-center text-lg font-semibold mt-6 sm:mt-10 sm:text-xl">
            <span class="text-[#575757]">Signup failed.</span>
        </div>

        <!-- Message -->
        <div class="text-center mt-4 text-sm font-light text-[#575757] sm:mt-5 sm:text-base"><
            Email already taken. Please try again.
        </div>

        <!-- Button -->
        <div class="mt-8 flex justify-center sm:mt-13">
            <button id="emtkn-confirm-btn" 
                class="w-full sm:w-auto px-6 py-3 text-sm sm:px-10 sm:py-4 sm:text-base rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#FF5656] to-[#DF0606] shadow hover:brightness-110 cursor-pointer">
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