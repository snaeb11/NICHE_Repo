<!-- Wrapper for the modal -->
<div id="logout-popup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
    <div class="relative w-full max-w-md rounded-2xl bg-[#fdfdfd] p-6 sm:p-8 shadow-xl">

        <button id="logout-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="mt-12 sm:mt-16 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-16 w-16 sm:h-20 sm:w-20 rotate-[12.5deg]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
            </svg>
        </div>

        <!-- Text Message -->
        <div class="mt-8 sm:mt-12 text-center text-lg sm:text-xl font-semibold">
            <span class="text-[#575757]">Confirm account </span>
            <span class="text-[#ED2828]">logout</span><span class="text-[#575757]">?</span>
        </div>

        <!-- Buttons -->
        <div class="mt-12 sm:mt-20 flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
            <button id="logout-cancel-btn"
                class="w-full sm:w-auto px-6 py-2 rounded-full text-white bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
                Cancel
            </button>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                @csrf
                <button type="submit" id="logout-confirm-btn"
                    class="w-full sm:w-auto px-6 py-2 rounded-full text-white bg-gradient-to-r from-[#FE5252] to-[#E10C0C] hover:brightness-110">
                    Confirm
                </button>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript to close the popup -->
<script>
    document.getElementById('logout-close-popup').addEventListener('click', function() {
        document.getElementById('logout-popup').style.display = 'none';
    });

    document.getElementById('logout-cancel-btn').addEventListener('click', function() {
        document.getElementById('logout-popup').style.display = 'none';
    });

    document.getElementById('logout-confirm-btn').addEventListener('click', function() {
        document.getElementById('logout-popup').style.display = 'none';
    });
</script>
