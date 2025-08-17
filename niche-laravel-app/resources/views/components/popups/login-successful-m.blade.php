<!-- Login Success Modal -->
<div id="login-success-modal" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
    
    <div class="relative max-h-[90vh] w-full max-w-md rounded-2xl bg-[#fdfdfd] p-6 sm:p-8 shadow-xl overflow-y-auto">
        <div class="flex flex-col items-center justify-center space-y-4 sm:space-y-6">
            
            <!-- Check Icon -->
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#27C50D" class="h-16 w-16 sm:h-20 sm:w-20"> 
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Message -->
            <h2 class="text-center text-lg font-medium text-[#575757] sm:text-xl">
                Login Successful!
            </h2>

            <div id="login-success-message" 
                class="text-center text-sm font-light text-[#575757] sm:text-base">
                Welcome back!
            </div>

            <div class="text-center text-xs text-[#575757] sm:text-sm">
                Redirecting to dashboard...
            </div>
        </div>
    </div>
</div>
