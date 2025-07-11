<div id="edit-account-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div id="ea-step1" class="min-w-[52svw] max-w-[60vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- ❌ Close Button -->
        <button id="ea-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10">
            <input id="first-name" type="text" placeholder="First Name"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

            <input id="current-password" type="password" placeholder="Current password"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
            
            <input id="last-name" type="text" placeholder="Last Name"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

            <input id="new-password" type="password" placeholder="New password"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
            
            <input id="usep-email" type="email" placeholder="USeP Email"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

            <input id="confirm-password" type="password" placeholder="Confirm password"
                class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
        </div>
        <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                    <input type="checkbox" id="ea-show-password-toggle" class="h-4 w-4 accent-[#575757] hover:cursor-pointer"/>
                    <span class="hover:cursor-pointer">Show password</span>
                </label>

        <div class="mt-10 flex justify-center">
            <button id="confirm1-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>

    <div id="ea-step2" class="min-w-[20vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8 hidden">
         <div class="flex justify-center mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>

        <div class="text-center text-xl font-semibold mt-10">
            <span class="text-[#575757]">Successfully Changed Account Details!</span>
        </div>

        <div class="text-center mt-5 text-normal font-regular">
            <span class="text-[#575757]">Successfully altered this account’s information.</span>
        </div>

        <div class="mt-20 flex justify-center">
            <button id="confirm2-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility() {
  const passwordIds = ['current-password', 'new-password', 'confirm-password'];
  const isChecked = document.getElementById('ea-show-password-toggle')?.checked;

  passwordIds.forEach(id => {
    const field = document.getElementById(id);
    if (field) {
      field.type = isChecked ? 'text' : 'password';
    } else {
      console.warn(`Input with id="${id}" not found.`);
    }
  });
}

function initEditAccountPopup() {
  const checkbox = document.getElementById('ea-show-password-toggle');
  if (checkbox) {
    checkbox.addEventListener('change', togglePasswordVisibility);
  }

  const confirm1Btn = document.getElementById('confirm1-btn');
  if (confirm1Btn) {
    confirm1Btn.addEventListener('click', () => {
      const step1 = document.getElementById('ea-step1');
      const step2 = document.getElementById('ea-step2');

      step1?.classList.add('hidden');
      step2?.classList.remove('hidden');
      step2?.classList.add('flex', 'flex-col', 'items-center', 'justify-center');
    });
  }

  const confirm2Btn = document.getElementById('confirm2-btn');
  if (confirm2Btn) {
    confirm2Btn.addEventListener('click', () => {
      document.getElementById('edit-account-popup').style.display = 'none';
    });
  }
}

// This ensures your script runs after DOM is fully available (including with Vite)
document.addEventListener('DOMContentLoaded', initEditAccountPopup);

</script>



