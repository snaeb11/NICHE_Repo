<div id="confirm-delete-account-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
  <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <!-- ❌ Close Button -->
    <button id="cda-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- 🔒 Icon -->
    <div class="flex justify-center mt-13">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757"
          class="w-20 h-20 rotate-[7.5deg]">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M6 10v10a2 2 0 002 2h8a2 2 0 002-2V10M9 10v8m6-8v8M4 6h16M10 6V4a1 1 0 011-1h2a1 1 0 011 1v2" />
      </svg>
    </div>


    <!-- STEP 1 -->
    <div id="cda-step1">
      <div class="text-center mt-8 text-xl font-semibold">
        <span class="text-[#575757]">Confirm account </span>
        <span class="text-[#ED2828]">deactivation</span><span class="text-[#575757]">?</span>
      </div>

      <div class="text-center mt-8 text-base font-light">
        <span class="text-[#575757]">This action is permanent and cannot be undone. All user data will be permanently deactivated. Are you sure you want to proceed?</span>
      </div>

      <div class="flex justify-center space-x-6 mt-10">
        <button id="cda-cancel-btn1" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
          Cancel
        </button>
        <button id="cda-next-step1" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#FE5252] to-[#E10C0C] hover:from-[#f87c7c] hover:to-[#e76969]">
          Confirm
        </button>
      </div>
    </div>

    <!-- STEP 2 -->
    <div id="cda-step2" class="hidden">
      <div class="text-center mt-8 text-xl font-semibold">
        <span class="text-[#575757]">User </span>
        <span class="text-[#ED2828]">deactivated</span><span class="text-[#575757]">.</span>
      </div>

      <div class="text-center mt-8 text-base font-light">
        <span class="text-[#575757]">User account deactivation successful!</span>
      </div>

      <div class="flex justify-center mt-10">
        <button id="cda-final-close" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
          Close
        </button>
      </div>
    </div>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () =>{
      const popup = document.getElementById('confirm-delete-account-popup');
      const step1 = document.getElementById('cda-step1');
      const step2 = document.getElementById('cda-step2');

      // Step 1 → Step 2
      document.getElementById('cda-next-step1').addEventListener('click', () => {
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
      });

      // Close on Cancel or X
      document.getElementById('cda-close-popup').addEventListener('click', () => {
        popup.style.display = 'none';
      });

      document.getElementById('cda-cancel-btn1').addEventListener('click', () => {
        popup.style.display = 'none';
      });

      document.getElementById('cda-final-close').addEventListener('click', () => {
        popup.style.display = 'none';
      });
  });
</script>
