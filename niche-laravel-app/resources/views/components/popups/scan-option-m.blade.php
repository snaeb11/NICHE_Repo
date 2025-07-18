<div id="scan-option-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="min-w-[30vw] max-w-[40vw] min-h-[40vh] max-h-[100vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <button id="scanOpt-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex flex-col md:flex-row justify-center items-start gap-5">
            <!-- Column 1 -->
            <div class="text-center">
                <div class="bg-[#fffff0] rounded-lg text-left text-normal px-5 py-2 text-[#575757] font-semibold hover:brightness-110">
                <span>Upload image</span>
                </div>
                <div class="mt-2 min-w-[15vw] max-w-[25vw] min-h-[30vh] max-h-[100vh] border border-dashed border-[#575757] rounded-xl mx-auto">
                    <div class="flex flex-col items-center">
                        <span class="text-[#575757] text-sm py-1 rounded mt-5 font-semibold">Choose a file or drag & drop it here.</span>
                        <span class="text-[#575757] text-sm py-1 rounded mt-3 mb-13">File type must be .PNG, .JPG, .JPEG, .HEIC</span>

                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                            <span id="image-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                        </div>

                        <button id="upload-image-btn" class="min-w-[10vw] min-h-[3vw] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-10 mb-5 hover:cursor-pointer transition-all duration-200">
                            Browse
                        </button>

                        <input type="file" id="image-input" accept=".png,.jpg,.jpeg,.heic" style="display: none;" />


                        <input type="file" id="ir-file-input-1" class="hidden">
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="text-center">
                <div class="bg-[#fffff0] rounded-lg text-left text-normal px-5 py-2 text-[#575757] font-semibold hover:brightness-110">
                <span>Scan document</span>
                </div>
                <div class="mt-2 min-w-[15vw] max-w-[25vw] min-h-[30vh] max-h-[50vh] border border-dashed border-[#575757] rounded-xl mx-auto">
                    <div class="flex flex-col items-center">
                        <span class="text-[#575757] text-sm py-1 rounded mt-5 font-semibold">Scan your document.</span>
                        <span class="text-[#575757] text-sm py-1 rounded mt-3 mb-13">This will open your camera device camera.</span>

                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>

                        </div>

                        <button id="scan-docu-upload-btn" class="min-w-[10vw] min-h-[3vw] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-10 mb-5 hover:cursor-pointer transition-all duration-200">
                            Scan
                        </button>

                        <input type="file" id="ir-file-input-1" class="hidden">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('scanOpt-close-popup').addEventListener('click', function () {
    document.getElementById('scan-option-popup').style.display = 'none';
  });

  //image upload
  const fileNameDisplay = document.getElementById('image-file-name');
  const uploadBtn = document.getElementById('upload-image-btn');
  const fileInput = document.getElementById('image-input');

  uploadBtn.addEventListener('click', () => {
    fileInput.click();
  });

  fileInput.addEventListener('change', (event) => {
    const file = fileInput.files[0];
    if (file) {
      fileNameDisplay.textContent = file.name;
    } else {
      fileNameDisplay.textContent = '';
    }
  });

});
</script>