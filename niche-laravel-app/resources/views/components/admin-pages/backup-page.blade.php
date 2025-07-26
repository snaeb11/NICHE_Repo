<!-- Backup Table -->
<x-popups.universal-option-m />
    <main id="backup-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        
        <div class="flex justify-center items-center flex-gaps-4">
            <div class="flex flex-col items-center justify-center rounded-lg bg-[#FDFDFD] w-1/4 border border-[#575757] p-4 space-y-5">
                <h1 class="text-2xl m-4 font-bold">Backup and Restore</h1>

                <form action="{{ route('admin.backup.reset') }}" method="post" onsubmit="return confirmBackup(event)" class="w-full">
                    <button class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover: brightness-110 cursor-pointer">Backup and Reset</button>
                </form>
                <form action="{{ route('admin.backup.download') }}" method="get" class="w-full">
                    <button id="backup-btn" class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover: brightness-110 cursor-pointer">Backup</button>
                </form>
                
                <div class="flex flex-col items-center justify-center rounded border-dashed border-[#575757] border p-4 w-full">
                    <span class="text-[#575757] text-sm py-1 rounded mt-5 font-semibold">Choose a file or drag & drop it here.</span>
                    <span class="text-[#575757] text-sm py-1 rounded mt-2">File type must be .sqlite</span>

                    <div id="hidden-class" class="hidden items-center space-x-2 mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span id="backup-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                    </div>
                    
                    <button id="backup-browse-btn" class="min-w-[10vw] min-h-[3vw] rounded-lg bg-[#fdfdfd] text-[#575757] font-semibold hover:brightness-95 border-[1px] border-[#575757] mt-5 mb-5 hover:cursor-pointer transition-all duration-200">
                        Browse
                    </button>
                    
                </div>

                <form action="{{ route('admin.backup.restore') }}" method="post" onsubmit="confirmRestore()" enctype="multipart/form-data" class="w-full">
                    <button class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover: brightness-110 cursor-pointer">Restore</button>
                </form>
            </div>
        </div>
    </main>

 <script>
    document.getElementById('backup-browse-btn').addEventListener('click', function() {
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = '.sql, .sqlite';
        fileInput.click();

        fileInput.onchange = function() {
            const fileName = fileInput.files[0].name;
            const fileNameDisplay = document.getElementById('backup-file-name');
            fileNameDisplay.textContent = fileName;
            document.getElementById('hidden-class').classList.remove('hidden');
            document.getElementById('hidden-class').classList.add('flex');
        };
    });

    function confirmBackup() {
        event.preventDefault();
        formToSubmit = event.target;

        const kpopup = document.getElementById('universal-option-popup');
        const kTopText = document.getElementById('opt-topText');
        const kSubText = document.getElementById('opt-subText');
        const kConfirmBtn = document.getElementById('uniOpt-confirm-btn');
        const kCancelBtn = document.getElementById('uniOpt-cancel-btn');
        kTopText.textContent = "Backup and reset database?!";
        kSubText.textContent = "amoghus balls";
        kpopup.style.display = 'flex';

        kConfirmBtn.onclick = function() {
            kpopup.style.display = 'none';
            formToSubmit.submit();
        };

        kCancelBtn.onclick = function() {
            kpopup.style.display = 'none';
        };
        return false;
    }

    function confirmRestore() {
        event.preventDefault();
        formToSubmit = event.target;

        const kpopup = document.getElementById('universal-option-popup');
        const kTopText = document.getElementById('opt-topText');
        const kSubText = document.getElementById('opt-subText');
        const kConfirmBtn = document.getElementById('uniOpt-confirm-btn');
        const kCancelBtn = document.getElementById('uniOpt-cancel-btn');
        kTopText.textContent = "Restore database?!";
        kSubText.textContent = "This will overwrite the current database.";
        kpopup.style.display = 'flex';

        kConfirmBtn.onclick = function() {
            kpopup.style.display = 'none';
            formToSubmit.submit();
        };

        kCancelBtn.onclick = function() {
            kpopup.style.display = 'none';
        };
        return false;
    }
 </script>