<!-- Wrapper for the modal -->
<div id="logout-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

  <div class="w-[523px] h-[473px] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

    <button id="close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
           class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <div class="w-[459px]">
        <div class="flex items-center justify-start mt-3 space-x-4">
            <!-- SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" 
                class="w-20 h-20 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 
                    5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 
                    3.752 0 0 1 18 19.5H6.75Z" />
            </svg>
            <!-- Text -->
            <span class="text-[#575757] text-lg py-1 rounded font-bold">
            Import thesis
            </span>
        </div>
    </div>

    <div id="step 1" class="flex justify-center h-[225px]">
        <div class="flex flex-col items-center  w-[490px] h-[325px] border-[1px] rounded-xl">
            <div class="flex flex-col items-center  w-[490px] h-[325px] border-[1px] border-dashed border-[#575757] rounded-xl">
                <span class="text-[#575757] text-sm py-1 rounded mt-5 font-semibold">
                Choose a file or drag & drop it here.
            </span>

            <span class="text-[#575757] text-sm py-1 rounded mt-2">
                File type must be PDF
            </span>

            <button id="browse-btn" class="w-[130px] h-[44px] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-15">
                Browse
            </button>
            <input type="file" id="file-input" accept=".pdf" class="hidden">
            </div>

            <!-- Buttons -->
            <div id="confirm-btn" class="flex justify-center space-x-6 mt-10">
                <button id="cancel-btn" class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
                    Cancel
                </button>

                <button class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:from-[#3ceb22] hover:to-[#2db415]">
                    Confirm   
                </button>
            </div>
        </div>
    </div>

    <div id="step 2" class="flex justify-center h-[225px]">
        <div class="flex flex-col items-center  w-[490px] h-[325px] border-[1px] rounded-xl">
            <div class="flex flex-col items-center  w-[490px] h-[325px] border-[1px] border-dashed border-[#575757] rounded-xl">
                <div class="flex items-center space-x-2 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>

                <span class="text-[#575757] text-sm py-1 rounded mt-2">
                    <span id="file-name" class="text-[#575757] text-sm mt-2"></span>
                </span>
            </div>

            <!-- 
            <span id="file-name" class="text-[#575757] text-sm mt-2"></span>
            -->

            <button id="browse-btn" class="w-[130px] h-[44px] rounded-[10px] bg-[#fffff0] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-15">
                ASDASD
            </button>
            <input type="file" id="file-input" accept=".pdf" class="hidden">

            </div> <!-- Text -->
            <!-- Buttons -->
            <div id="confirm-btn" class="flex justify-center space-x-6 mt-10">
                <button id="cancel-btn" class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#A4A2A2] to-[#575757] hover:from-[#cccaca] hover:to-[#888888]">
                    Cancel
                </button>

                <button class="w-[175px] h-[66px] rounded-full text-[#fffff0] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:from-[#3ceb22] hover:to-[#2db415]">
                    Confirm   
                </button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- JavaScript to close the popup -->
<script>
  document.getElementById('confirm-btn').addEventListener('click', function () {
    document.getElementById('logout-popup').style.display = 'none';
  });

  document.getElementById('confirm-btn').addEventListener('click', function () {
    document.getElementById('logout-popup').style.display = 'none';
  });

  document.getElementById('browse-btn').addEventListener('click', function () {
    document.getElementById('file-input').click();
  });

  document.getElementById('file-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      console.log("Selected file:", file.name);
    }
  });

  document.getElementById('file-input').addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file) {
    document.getElementById('file-name').textContent = `Selected: ${file.name}`;
  }
});
</script>
