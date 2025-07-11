<!-- Wrapper for the modal -->
<div id="backup-download-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

  <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <!-- ❌ X Button -->
    <button id="bds-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Check Icon -->
    <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-40 h-40">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
        </svg>

    </div>

    <!-- Text Message -->
    <div class="text-center mt-5 text-xl font-medium">
      <span class="text-[#575757]">Successfully downloaded backup!</span>
    </div>

    <!-- subtext -->
    <div class="text-center mt-7 text-base font-light">
      <span class="text-[#575757]">Saved as: </span> <br>
      <span id="file-name" class="text-[#575757] text-decoration: underline">ResearchDataBackup_06-30-25.filetype</span>
    </div>

    <!-- Buttons -->
    <div class="flex justify-center space-x-6 mt-13">
      <button id="bds-confirm-btn" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:from-[#3ceb22] hover:to-[#2db415]">
        Confirm   
      </button>
    </div>

  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  document.getElementById('bds-close-popup').addEventListener('click', function () {
    document.getElementById('backup-download-popup').style.display = 'none';
  });

  document.getElementById('bds-confirm-btn').addEventListener('click', function () {
    document.getElementById('backup-download-popup').style.display = 'none';
  });
</script>
