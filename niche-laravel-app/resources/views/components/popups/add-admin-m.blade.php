<!-- Wrapper for the modal -->
<div id="add-admin-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

    <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- ❌ X Button -->
        <button id="aa-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="aa-step1" class="hidden">
            <div class="flex flex-col items-center justify-center mt-4 space-y-6">

                <!-- Main Message -->
                <div class="text-center text-xl font-medium text-[#575757] m-auto">
                    Add Admin
                </div>

                <!-- Input and Buttons Wrapper -->
                <div class="w-[20vw] flex flex-col space-y-4 mt-5">
                    <!-- Input Field -->
                    <input
                    id="first-name-input"
                    type="text"
                    placeholder="First Name"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <input
                    id="last-name-input"
                    type="text"
                    placeholder="Last Name"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <input
                    id="email-input"
                    type="text"
                    placeholder="USeP Email"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <!-- Confirm Button (Right aligned) -->
                    <div class="flex justify-end mt-5">
                        <button
                            id="aa-next-btn"
                            class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r
                            from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="aa-step1">
            <div class="flex flex-col items-center justify-center mt-4 space-y-6">

                <!-- Main Message -->
                <div class="text-center text-xl font-medium text-[#575757] m-auto">
                    Permission
                </div>

                <!-- Input and Buttons Wrapper -->
                <div class="w-[20vw] flex flex-col space-y-4 mt-5">
                    <!-- Input Field -->
                    <input
                    id="first-name-input"
                    type="text"
                    placeholder="First Name"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <input
                    id="last-name-input"
                    type="text"
                    placeholder="Last Name"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <input
                    id="email-input"
                    type="text"
                    placeholder="USeP Email"
                    class="h-[65px] rounded-[10px] border border-[#575757]
                        placeholder-[#575757] text-[#575757] font-light px-4
                        focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                    />

                    <!-- Confirm Button (Right aligned) -->
                    <div class="flex justify-end mt-5">
                        <button
                            id="aa-confirm-btn"
                            class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r
                            from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>

  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const closeBtn = document.getElementById('aa-close-popup');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                document.getElementById('add-admin-popup').style.display = 'none';
            });
        }
    });
</script>


