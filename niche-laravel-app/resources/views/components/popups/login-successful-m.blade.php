<!-- Login Success Modal -->
<div id="login-success-modal" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
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
            <h2 class="text-center text-xl font-medium text-[#575757]">
                Login Successful!
            </h2>

            <div id="login-success-message" class="text-center text-base font-light text-[#575757]">
                Welcome back!
            </div>

            <div class="text-center text-sm text-[#575757]">
                Redirecting to dashboard...
            </div>
        </div>
    </div>
</div>
