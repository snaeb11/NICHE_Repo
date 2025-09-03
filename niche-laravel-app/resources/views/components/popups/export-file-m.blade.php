<!-- Wrapper for the modal -->
<div id="export-file-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 px-4">

  <div id="export-step1" class="w-full sm:w-[60vw] md:w-[50vw] lg:w-[20vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-6 sm:p-8 overflow-y-auto">

    <!-- Export Icon -->
    <div class="flex justify-center mt-8">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" 
           class="w-20 h-20 sm:w-24 sm:h-24 rotate-[15deg]">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
      </svg>
    </div>

    <!-- Text Message -->
    <div class="text-center mt-5 text-xl font-semibold text-[#575757]">
      Export file
    </div>

    <!-- Radio Options -->
    <div class="flex justify-center mt-8">
      <div class="flex flex-col gap-3 w-full max-w-[200px] text-[#575757]">
        <label class="inline-flex items-center space-x-2 cursor-pointer">
          <input type="radio" name="file_type" value="docx" class="form-radio text-red-600 w-5 h-5" checked>
          <span class="text-base">Word File</span>
        </label>
        <label class="inline-flex items-center space-x-2 cursor-pointer">
          <input type="radio" name="file_type" value="excel" class="form-radio text-green-600 w-5 h-5">
          <span class="text-base">Excel File</span>
        </label>
      </div>
    </div>

    <!-- Buttons -->
    <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mt-10">
      <button id="ef-cancel-btn" class="w-full sm:w-auto px-6 py-2 rounded-full text-white bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
        Cancel
      </button>
      <button id="ef-export-btn" class="w-full sm:w-auto px-6 py-2 rounded-full text-white bg-gradient-to-r from-[#28C90E] to-[#1CA305] hover:brightness-110">
        Export   
      </button>
    </div>

  </div>
</div>


<script>
  const efStep1 = document.getElementById('export-step1');

  document.getElementById('ef-cancel-btn').addEventListener('click', function () {
    document.getElementById('export-file-popup').style.display = 'none';
  });

   document.getElementById('ef-export-btn').addEventListener('click', function () {
  const selectedType = document.querySelector('input[name="file_type"]:checked').value;

  let url = '';
  switch (selectedType) {
    case 'docx':
      url = '{{ route("inventory.export.docx") }}';
      break;
    case 'excel':
      url = '{{ route("inventory.export.excel") }}';
      break;
    case 'pdf':
      url = '{{ route("inventory.export.pdf") }}';
      break;
    default:
      alert("Unsupported export format.");
      return;
  }

  // Start download
  window.location.href = url;

  // Close modal
  document.getElementById('export-file-popup').style.display = 'none';
});

  
</script>
