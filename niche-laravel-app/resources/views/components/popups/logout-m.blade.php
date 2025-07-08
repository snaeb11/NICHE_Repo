<!-- Wrapper for the modal -->
<div id="logout-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

  <div class="w-[25vw] max-h-[45vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <!-- ❌ X Button -->
    <button id="logout-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- 🔒 Logout Icon -->
    <div class="flex justify-center mt-16">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 rotate-[12.5deg]">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
      </svg>
    </div>

    <!-- Text Message -->
    <div class="text-center mt-12 text-xl font-semibold">
      <span class="text-[#575757]">Confirm account </span>
      <span class="text-[#ED2828]">logout</span><span class="text-[#575757]">?</span>
    </div>

    <!-- Buttons -->
    <div class="flex justify-center space-x-6 mt-20">
      <button id="logout-cancel-btn" class="w-[7vw] h-[5vh] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
        Cancel
      </button>
      <button id="logout-confirm-btn" class="w-[7vw] h-[5vh] rounded-full text-[#fffff0] bg-gradient-to-r from-[#FE5252] to-[#E10C0C] hover:from-[#f87c7c] hover:to-[#e76969]">
        Confirm   
      </button>
    </div>

  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  document.getElementById('logout-close-popup').addEventListener('click', function () {
    document.getElementById('logout-popup').style.display = 'none';
  });

  document.getElementById('logout-cancel-btn').addEventListener('click', function () {
    document.getElementById('logout-popup').style.display = 'none';
  });

  document.getElementById('logout-confirm-btn').addEventListener('click', function () {
    document.getElementById('logout-popup').style.display = 'none';
  });
</script>
