<!-- Wrapper for the modal -->
<div id="export-file-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

  <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <!-- ❌ X Button -->
    <button id="ef-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Export Icon -->
    <div class="flex justify-center mt-8">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" class="w-30 h-30 rotate-[15deg]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
        </svg>
    </div>

    <!-- Text Message -->
    <div class="text-center mt-5 text-xl font-semibold">
      <span class="text-[#575757]">Export file</span>
    </div>

    <!-- RADYO -->
    <div class="flex justify-center mt-8">
        <div class="block w-[120px] text-[#575757]">
        <label class="inline-flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="file_type" value="pdf" class="form-radio text-red-600 w-5 h-5" checked>
            <span class="text-lg">PDF File</span>
        </label>
        <label class="inline-flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="file_type" value="excel" class="form-radio text-green-600 w-5 h-5">
            <span class="text-lg">Excel File</span>
        </label>
    </div>
    </div>
    

    <!-- Buttons -->
    <div class="flex justify-center space-x-6 mt-10">
      <button id="ef-cancel-btn" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
        Cancel
      </button>
      <button id="ef-export-btn" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#28C90E] to-[#1CA305] hover:brightness-110">
        Export   
      </button>
    </div>

  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  document.getElementById('ef-close-popup').addEventListener('click', function () {
    document.getElementById('export-file-popup').style.display = 'none';
  });

  document.getElementById('ef-cancel-btn').addEventListener('click', function () {
    document.getElementById('export-file-popup').style.display = 'none';
  });

   document.getElementById('ef-export-btn').addEventListener('click', function () {
    document.getElementById('export-file-popup').style.display = 'none';
  });
</script>
