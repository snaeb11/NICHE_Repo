<!-- Wrapper for the modal -->
<div id="forgot-pass-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

    <div class="max-w-[25vw] min-w-[25vw] max-h-[57vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- ❌ X Button -->
        <button id="fp-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="fp-step1"
            class="flex flex-col items-center justify-center mt-4 space-y-6">
            <!-- Check Icon -->
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="#575757" class="w-20 h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
            </div>

            <!-- Main Message -->
            <div class="text-center text-xl font-medium text-[#575757] m-auto">
                Authentication your account.
            </div>

            <!-- Subtext -->
            <div class="text-center text-base font-light text-[#575757] mr-[2vh] ml-[2vh]">
                Please confirm your account by entering the security code sent to
                <span id="user-email" class="font-semibold m-auto">vk********02***@usep.edu.ph</span>
            </div>

            <!-- Input and Buttons Wrapper -->
            <div class="w-[20vw] flex flex-col space-y-4">
                <!-- Input Field -->
                <input
                type="text"
                placeholder="Security code"
                class="h-[65px] rounded-[10px] border border-[#575757]
                    placeholder-[#575757] text-[#575757] font-light px-4
                    focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                />

                <!-- Resend Code Link -->
                <div class="text-left">
                <button class="text-[#575757] font-light text-sm underline hover:text-[#9D3E3E] transition duration-150">
                    Resend code
                </button>
                </div>

                <!-- Confirm Button (Right aligned) -->
                <div class="flex justify-end mt-10">
                <button
                    id="fp-submit-btn"
                    class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r
                    from-[#D56C6C] to-[#9D3E3E] hover:from-[#f18e8e] hover:to-[#d16868] transition duration-200">
                    Submit code
                </button>
                </div>
            </div>
        </div>

        <div id="fp-step2" class="hidden">
            <div class="flex flex-col items-center justify-center mt-7 space-y-6">

            <!-- Main Message -->
            <div class="text-center text-xl font-medium text-[#575757]">
                Reset password
            </div>

                <!-- Input and Buttons Wrapper -->
                <div class="w-[350px] flex flex-col space-y-4">
                    <!-- Input Field -->
                    <input
                        id="initial-password"
                        type="password"
                        placeholder="Password"
                        class="h-[65px] rounded-[10px] border border-[#575757]
                            placeholder-[#575757] text-[#575757] font-light px-4
                            focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                    />

                    <div id="password-requirements" class="text-[#575757] text-sm font-light ml-10 space-y-2">
                        <div class="flex items-center space-x-2">
                            <div id="circle-length" class="w-3 h-3 rounded-full bg-gray-300"></div>
                            <span>Minimum of 8 characters</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div id="circle-uppercase" class="w-3 h-3 rounded-full bg-gray-300"></div>
                            <span>An uppercase letter</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div id="circle-lowercase" class="w-3 h-3 rounded-full bg-gray-300"></div>
                            <span>A lowercase letter</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div id="circle-number" class="w-3 h-3 rounded-full bg-gray-300"></div>
                            <span>A number</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div id="circle-special" class="w-3 h-3 rounded-full bg-gray-300"></div>
                            <span>A special character</span>
                        </div>
                    </div>

                    <input
                        id="confirm-password"
                        type="password"
                        placeholder="Confirm password"
                        class="h-[65px] rounded-[10px] border border-[#575757]
                            placeholder-[#575757] text-[#575757] font-light px-4
                            focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                    />

                    <label class="flex items-center justify-end mt-2 text-sm text-[#575757] font-light space-x-2">
                        <input
                            type="checkbox"
                            id="show-password-toggle"
                            class="accent-[#575757] w-4 h-4 hover:cursor-pointer"
                            onclick="togglePasswordVisibility()"
                        />
                        <span class="hover:cursor-pointer">Show password</span>
                    </label>

                    <!-- Confirm Button (Right aligned) -->
                    <div class="flex justify-end">
                        <button
                            id="fp-confirm-btn"
                            class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r
                            from-[#D56C6C] to-[#9D3E3E] hover:from-[#f18e8e] hover:to-[#d16868] transition duration-200">
                            Reset password
                        </button>
                    </div>
                </div>
            </div>
        </div>

  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  // Close modal
  document.getElementById('fp-close-popup').addEventListener('click', function () {
    document.getElementById('forgot-pass-popup').style.display = 'none';
  });

  // Proceed from Step 1 to Step 2
  document.getElementById('fp-submit-btn').addEventListener('click', function () {
    // Hide step 1
    document.getElementById('fp-step1').classList.add('hidden');

    // Show step 2
    document.getElementById('fp-step2').classList.remove('hidden');
  });

    function togglePasswordVisibility() {
    const pwInputs = document.querySelectorAll('#fp-step2 input[type="password"], #fp-step2 input[type="text"]');
    const checkbox = document.getElementById('show-password-toggle');
    
    pwInputs.forEach(input => {
        input.type = checkbox.checked ? 'text' : 'password';
    });
    }

    const passwordInput = document.getElementById('initial-password');
    passwordInput.addEventListener('input', function () {
    const value = passwordInput.value;

    // Regex checks
    document.getElementById('circle-length').className = value.length >= 8 ? 'w-3 h-3 rounded-full bg-green-500' : 'w-3 h-3 rounded-full bg-gray-300';
    document.getElementById('circle-uppercase').className = /[A-Z]/.test(value) ? 'w-3 h-3 rounded-full bg-green-500' : 'w-3 h-3 rounded-full bg-gray-300';
    document.getElementById('circle-lowercase').className = /[a-z]/.test(value) ? 'w-3 h-3 rounded-full bg-green-500' : 'w-3 h-3 rounded-full bg-gray-300';
    document.getElementById('circle-number').className = /\d/.test(value) ? 'w-3 h-3 rounded-full bg-green-500' : 'w-3 h-3 rounded-full bg-gray-300';
    document.getElementById('circle-special').className = /[!@#$%^&*(),.?":{}|<>]/.test(value) ? 'w-3 h-3 rounded-full bg-green-500' : 'w-3 h-3 rounded-full bg-gray-300';
    });
</script>

