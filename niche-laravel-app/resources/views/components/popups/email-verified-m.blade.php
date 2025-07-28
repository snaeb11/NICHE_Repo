<!-- Email Verified Success Modal -->
<div id="email-verified-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">
        <!-- Close Button -->
        <button class="absolute right-4 top-4 text-[#575757] hover:text-red-500"
            onclick="document.getElementById('email-verified-popup').style.display='none'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Content -->
        <div class="flex flex-col items-center justify-center space-y-6">
            <!-- Check Icon -->
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#27C50D" class="h-20 w-20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Message -->
            <h2 id="welcome-message" class="text-center text-xl font-medium text-[#575757]">
                Email Verified Successfully!
            </h2>

            <div class="text-center text-sm text-[#575757]">
                Redirecting to your dashboard...
            </div>
        </div>
    </div>
</div>
