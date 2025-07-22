<div id="user-edit-account-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div id="uea-step1" class="min-w-[30vw] max-w-[645vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- Close Button -->
        <button id="uea-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="text-center mt-5 text-3xl font-semibold">
            <span class="text-[#575757]">Edit account</span>
        </div>

        <form action="">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-10">
                <input id="uea-first-name" type="text" placeholder="First Name"
                    class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

                <input id="uea-last-name" type="text" placeholder="Last Name"
                    class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                
            </div>

            <div class="mt-10 flex justify-center">
                <button id="uea-confirm-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                    Confirm
                </button>
            </div>
        </form>

    </div>
</div>




