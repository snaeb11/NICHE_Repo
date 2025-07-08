<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Create Account</title>
</head>
<body class="bg-[#fffff0]">
  <x-shared.top-grad-bar />
  <x-shared.top-navbar />
    <div class="flex flex-col items-center justify-center mt-20 space-y-8">
    <!-- Title -->
        <div class="flex flex-col items-center mb-6">
            <span class="text-[#575757] font-bold text-8xl">welcome!</span>
            <span class="text-[#575757] font-light text-3xl mt-3">create an account</span>
        </div>

        <!-- Grid: 2x3 Inputs -->
        <div class="grid grid-cols-2 gap-x-8 gap-y-6">
            <input
            type="text"
            placeholder="First Name"
            class="w-[350px] h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
            />
            <input
            type="text"
            placeholder="Last Name"
            class="w-[350px] h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
            />
            <input
                type="email"
                placeholder="USeP Email"
                class="w-[350px] h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$"
                title="Please enter a valid USeP email (e.g., example@usep.edu.ph)"
                required
            />
            <input
            id="password"
            type="password"
            placeholder="Password"
            class="w-[350px] h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
            />

            <!-- Program Dropdown -->
            <div class="relative w-[350px]">
                <select
                    id="program-select"
                    class="appearance-none w-full h-[65px] rounded-[10px] border border-[#575757] text-[#575757] font-light px-4 pr-10 bg-[#fffff0] focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 hover: cursor-pointer"
                >
                    <option value="" disabled selected>Select your program</option>
                    <option value="BSIT">BSIT - Information Technology</option>
                    <option value="BSCS">BSCS - Computer Science</option>
                    <option value="BSEMC">BSEMC - Entertainment and Multimedia Computing</option>
                    <option value="BSIS">BSIS - Information Systems</option>
                </select>

                <!-- Chevron Icon -->
                <div 
                    id="chevron-icon"
                    class="pointer-events-none absolute top-8.5 right-5 transform transition-transform duration-200 -translate-y-1/2 text-[#575757]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>


            <!-- Confirm Password + Show Toggle -->
            <div class="flex flex-col w-[350px]">
                <input
                    id="confirm-password"
                    type="password"
                    placeholder="Confirm password"
                    class="w-full h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
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
            </div>
        </div>

        <!-- Centered Buttons Below -->
        <div class="flex flex-col items-center space-y-2 mt-6">
            <button
            class="w-[300px] h-[60px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110 transition duration-200 font-semibold hover:cursor-pointer"
            >
            Create account
            </button>
            <button
            class="text-[#575757] text-sm underline font-light hover:text-[#9D3E3E] transition duration-150 hover:cursor-pointer"
            >
            Already have an account?
            </button>
        </div>
    </div>
</body>
</html>

<script>
    const select = document.getElementById('program-select');
    const chevron = document.getElementById('chevron-icon');

    function togglePasswordVisibility() {
        const input = document.getElementById('confirm-password');
        const input2 = document.getElementById('password');
        input2.type = input2.type === 'password' ? 'text' : 'password';
        input.type = input.type === 'password' ? 'text' : 'password';
    }

   

    select.addEventListener('blur', () => {
        chevron.classList.remove('rotate-180');
    });
</script>
