<div id="image-edit-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
  <div class="min-w-[52svw] max-w-[60vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8 overflow-y-auto">

    <!-- Close Button -->
    <button id="ea-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- 2 Column Layout -->
    <div class="flex flex-col md:flex-row gap-6">
      
      <!-- Left Side -->
      <div class="flex-1 flex flex-col">
        <h2 class="text-xl font-bold text-[#575757] mb-3">Abstract</h2>
        
        <!-- Image Preview -->
        <div class="border border-[#575757] rounded-xl min-h-[30vh] max-h-[50vh] flex items-center justify-center mb-4">
          <img src="#" alt="Image Preview" id="abstract-image-preview" class="max-w-full max-h-full object-contain">
        </div>
        
        <!-- Sliders -->
        <div class="space-y-3">
          <input type="range" class="w-full">
          <input type="range" class="w-full">
          <input type="range" class="w-full">
        </div>

        <!-- Crop Image Button (Right-Aligned) -->
        <div class="flex justify-end mt-3">
          <button class="bg-[#fffff0] text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] font-semibold px-4 py-2 rounded-lg hover:brightness-110 cursor-pointer transition-all duration-200">
            Crop Image
          </button>
        </div>
      </div>

      <!-- Right Side -->
      <div class="flex-1 flex flex-col">
        <h2 class="text-xl font-bold text-[#575757] mb-3">Extracted Text</h2>
        <div class="p-4 min-h-[30vh] max-h-[50vh] overflow-auto text-[#575757]">
          <p class="text-sm font-medium mb-2">[text-start]</p>
          <p class="text-sm">Extracted text goes here...</p>
          <p class="text-sm font-medium mt-2">[text-end]</p>
        </div>
      </div>
    </div>

    <!-- Bottom Right: Add Text to Form Button -->
    <div class="flex justify-end mt-6">
      <button class="bg-[#575757] text-[#fffff0] font-semibold bg-gradient-to-r from-[#28CA0E] to-[#1BA104] px-6 py-2 rounded-lg hover:brightness-110 cursor-pointer transition-all duration-200">
        Add Text to Form
      </button>
    </div>
  </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('imageEdit-close-popup').addEventListener('click', function () {
        document.getElementById('image-edit-popup').style.display = 'none';
    });
  });
</script>
