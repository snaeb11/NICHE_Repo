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
    <div class="flex flex-col items-center justify-center mt-25 space-y-8">
    <!-- Title -->
        <div class="flex flex-col items-center mb-6">
            <span class="text-[#575757] font-bold text-8xl">welcome!</span>
            <span class="text-[#575757] font-light text-3xl mt-3">create an account</span>
        </div>

        <!-- Grid: 2x3 Inputs -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 mt-20">
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

        <!-- Centered Buttons Below -->
        <div class="flex flex-col items-center space-y-2 mt-6">
            <button
            class="w-[150px] h-[60px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110 transition duration-200 font-semibold hover:cursor-pointer"
            >
            Login
            </button>
            <button
                class="text-[#575757] text-sm underline font-light hover:text-[#9D3E3E] transition duration-150 hover:cursor-pointer mt-15"
                >
                Create an account
            </button>
            <button
                class="text-[#575757] text-sm underline font-light hover:text-[#9D3E3E] transition duration-150 hover:cursor-pointer mt-3"
                >
                Forgot password?
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
