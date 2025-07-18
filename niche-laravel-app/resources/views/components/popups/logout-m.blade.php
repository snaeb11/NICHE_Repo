<!-- Wrapper for the modal -->
<div id="logout-popup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">

        <!-- ❌ X Button -->
        <button id="logout-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- 🔒 Logout Icon -->
        <div class="mt-16 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-20 w-20 rotate-[12.5deg]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
            </svg>
        </div>

        <!-- Text Message -->
        <div class="mt-12 text-center text-xl font-semibold">
            <span class="text-[#575757]">Confirm account </span>
            <span class="text-[#ED2828]">logout</span><span class="text-[#575757]">?</span>
        </div>

        <!-- Buttons -->
        <div class="mt-20 flex justify-center space-x-6">
            <button id="logout-cancel-btn"
                class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fffff0] hover:from-[#cccaca] hover:to-[#888888]">
                Cancel
            </button>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" id="logout-confirm-btn"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] text-[#fffff0] hover:from-[#f87c7c] hover:to-[#e76969]">
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
