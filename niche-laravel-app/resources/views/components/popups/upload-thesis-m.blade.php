<!-- Wrapper for the modal -->
<div id="upload-thesis-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

  <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <!-- Close Button -->
    <button id="pt-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Title -->
    <div class="min-w-[19vw] max-w-[23vw]">
      <div class="flex items-center justify-start mt-3 space-x-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1" stroke="currentColor" class="w-20 h-20 text-gray-700">
          <path stroke-linecap="round" stroke-linejoin="round" 
                d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 
                5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 
                3.752 0 0 1 18 19.5H6.75Z" />
        </svg>
        <span class="text-[#575757] text-lg py-1 rounded font-bold">Import thesis</span>
      </div>
    </div>

    <!-- STEP 1 -->
    <div id="pt-step-1" class="flex justify-center">
      <div class="flex flex-col items-center min-w-[21vw] max-w-[25vw] rounded-xl border-dashed">
        <div class="flex flex-col items-center min-w-[21vw] max-w-[25vw] border-[1px] border-dashed border-[#575757] rounded-xl">
          <span class="text-[#575757] text-sm py-1 rounded mt-5 font-semibold">Choose a file or drag & drop it here.</span>
          <span class="text-[#575757] text-sm py-1 rounded mt-2">File type must be PDF</span>

          <button id="pt-browse-btn-1" class="min-w-[10vw] min-h-[3vw] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-5 mb-5 hover:cursor-pointer transition-all duration-200">
            Browse
          </button>

          <input type="file" id="pt-file-input-1" accept=".pdf" class="hidden">
        </div>

        <!-- Buttons -->
        <div class="flex justify-center space-x-6 mt-10">
          <button id="pt-cancel-btn" class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888] hover: cursor-pointer transition-all duration-200">
            Cancel
          </button>
        </div>
      </div>
    </div>

    <!-- STEP 2 -->
    <div id="pt-step-2" class="hidden justify-center">
      <div class="flex flex-col items-center max-w-[25vw] rounded-xl border-dashed">
        <div class="flex flex-col items-center max-w-[25vw] border-[1px] border-dashed border-[#575757] rounded-xl">
          <div class="flex items-center space-x-2 mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="#575757" class="w-10 h-10">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            <span id="pt-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
          </div>

          <button id="pt-browse-btn-2" class="min-w-[10vw] min-h-[3vw] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 hover: cursor-pointer transition-all duration-200 border-[1px] border-[#575757] mt-5 mb-5">
            Browse Again
          </button>

          <input type="file" id="pt-file-input-2" accept=".pdf" class="hidden">
        </div>

        <!-- Buttons -->
        <div class="flex flex-col md:flex-row justify-center m-5 w-full space-y-2 md:space-y-0 md:space-x-4">
          <button id="pt-cancel-btn1" class="min-w-[10vw] min-h-[5vh] max-h-[7vh] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888] hover:cursor-pointer transition-all duration-200">
            Cancel
          </button>
          <button id="pt-confirm-btn" class="min-w-[10vw] min-h-[5vh] max-h-[7vh] rounded-full text-[#fffff0] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:from-[#3ceb22] hover:to-[#2db415] cursor-pointer transition-all duration-200">
            Confirm
          </button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
  function resetUploadThesisModal() {
    // Clear file name display
    document.getElementById('pt-file-name').textContent = '';

    // Reset file inputs
    document.getElementById('pt-file-input-1').value = '';
    document.getElementById('pt-file-input-2').value = '';

    // Reset step visibility
    document.getElementById('pt-step-1').classList.remove('hidden');
    document.getElementById('pt-step-1').classList.add('flex');
    document.getElementById('pt-step-2').classList.add('hidden');
    document.getElementById('pt-step-2').classList.remove('flex');

    // Hide the modal
    document.getElementById('upload-thesis-popup').style.display = 'none';
  }

  // Use the reset function for all close/cancel/confirm actions
  document.getElementById('pt-close-popup').addEventListener('click', resetUploadThesisModal);
  document.getElementById('pt-cancel-btn').addEventListener('click', resetUploadThesisModal);
  document.getElementById('pt-cancel-btn1').addEventListener('click', resetUploadThesisModal);
  document.getElementById('pt-confirm-btn').addEventListener('click', resetUploadThesisModal);

  // File browse buttons
  document.getElementById('pt-browse-btn-1').addEventListener('click', () => {
    document.getElementById('pt-file-input-1').click();
  });

  document.getElementById('pt-browse-btn-2').addEventListener('click', () => {
    document.getElementById('pt-file-input-2').click();
  });

  function isPDF(file) {
    return file && file.type === 'application/pdf';
  }

  // Step 1: Select file
  document.getElementById('pt-file-input-1').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!isPDF(file)) {
      alert('Only PDF files are allowed.');
      e.target.value = ''; // reset input
      return;
    }

    document.getElementById('pt-file-name').textContent = `Selected: ${file.name}`;
    document.getElementById('pt-step-1').classList.add('hidden');
    document.getElementById('pt-step-1').classList.remove('flex');
    document.getElementById('pt-step-2').classList.remove('hidden');
    document.getElementById('pt-step-2').classList.add('flex');
  });

  // Step 2: Re-browse
  document.getElementById('pt-file-input-2').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!isPDF(file)) {
      alert('Only PDF files are allowed.');
      e.target.value = '';
      return;
    }

    document.getElementById('pt-file-name').textContent = `Selected: ${file.name}`;
  });

  //---------------------
  let selectedFileName = ""; // global file name to pass to submission popup

  document.getElementById('pt-file-input-1').addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (!file || file.type !== 'application/pdf') {
          alert('Only PDF files are allowed.');
          return;
      }

      selectedFileName = file.name;
      document.getElementById('pt-file-name').textContent = `Selected: ${file.name}`;

      // show step 2
      document.getElementById('pt-step-1').classList.add('hidden');
      document.getElementById('pt-step-1').classList.remove('flex');
      document.getElementById('pt-step-2').classList.remove('hidden');
      document.getElementById('pt-step-2').classList.add('flex');
  });

  // pass filename back to submission popup
  document.getElementById('pt-confirm-btn').addEventListener('click', () => {
      document.getElementById('upload-thesis-popup').style.display = 'none';
      document.getElementById('user-add-submission-popup').style.display = 'flex';

      const uploadedFileContainer = document.getElementById('uploaded-file');
      const fileNameSpan = document.getElementById('uas-file-name');

      if (fileNameSpan && selectedFileName) {
          fileNameSpan.textContent = `Selected: ${selectedFileName}`;
          uploadedFileContainer.classList.remove('hidden');
          uploadedFileContainer.classList.add('flex');
      }

      resetUploadThesisModal();
  });

</script>

