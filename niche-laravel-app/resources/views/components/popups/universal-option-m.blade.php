<div id="universal-option-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div id="option-popup" class="w-[70vw] md:min-w-[20vw] md:max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-6 md:p-8 block">
        <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

        </div>

        <div class="text-center text-xl font-semibold mt-10">
            <span id="opt-topText" class="text-[#575757]"></span>
        </div>

        <div class="text-center mt-5 text-normal font-regular">
            <span id="opt-subText" class="text-[#575757]"></span>
        </div>

        <div class="ml-3 mr-3 mt-20 flex flex-col md:flex-row justify-center space-y-3 md:space-y-0 md:space-x-5">
            <button id="uniOpt-cancel-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#707070] to-[#a5a5a5] shadow hover:brightness-110 cursor-pointer">
                Cancel
            </button>
            <button id="uniOpt-confirm-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('uniOpt-confirm-btn').addEventListener('click', function() {
        document.getElementById('universal-option-popup').style.display = 'none';
    });
</script>