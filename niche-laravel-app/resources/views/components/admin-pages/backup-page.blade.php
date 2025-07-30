<!-- Backup Table -->
<x-popups.universal-option-m />
@if(session('success'))
    <script>alert("{{ session('success') }}");</script>
@endif
@if(session('error'))
    <script>alert("{{ session('error') }}");</script>
@endif

<!-- Confirmation Modal Content (Hidden by default) -->
@if(auth()->user()->hasPermission('view-backup'))
    <div id="confirm-input-popup" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[90%] max-w-md space-y-4 text-center">
                <h2 class="text-xl font-bold text-[#1CA305]">Confirm Restore</h2>
                <p class="text-sm text-gray-700">Restoring will <span class="font-semibold text-red-600">overwrite your current database</span>. This action cannot be undone.</p>
                
                <input type="text"  autocomplete="off" id="confirm-overwrite-input" class="border border-gray-300 rounded w-full px-3 py-2" placeholder="Type OVERWRITE to confirm (case sensitive)">
                <input type="text" id="confirm-name-input" class="border border-gray-300 rounded w-full px-3 py-2 mt-2" placeholder="Enter your name">

                <div class="flex flex-col sm:flex-row justify-end gap-2 pt-2">
                    <button id="cancel-confirm-btn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-sm">Cancel</button>
                    <button id="confirm-submit-btn" class="px-4 py-2 bg-[#28C90E] text-white rounded hover:brightness-110 text-sm">Confirm Restore</button>
                </div>
            </div>
    </div>
@endif

<main id="backup-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
    @if(auth()->user()->hasPermission('view-backup'))
    <div class="flex justify-center items-center px-4">
        <div class="flex flex-col items-center justify-center rounded-lg bg-[#fdfdfd] w-full sm:w-3/4 md:w-2/3 lg:w-1/3 border border-[#575757] p-6 space-y-6">
            <h1 class="text-2xl m-4 font-bold">Backup and Restore</h1>

            <form action="{{ route('admin.backup.reset') }}" method="post" class="w-full">
                @csrf
                
                @if(auth()->user()->hasPermission('download-backup'))
                    <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover:brightness-110 cursor-pointer">Backup and Reset</button>
                @else
                    <button type="submit" class="hidden"></button>
                @endif
            </form>

            <form action="{{ route('admin.backup.download') }}" method="get" class="w-full">
                @if(auth()->user()->hasPermission('download-backup'))
                    <button id="backup-btn" class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover: brightness-110 cursor-pointer">Backup</button>
                @else
                    <button id="backup-btn" class="hidden"></button>
                @endif
            </form>

            <!-- File Upload UI -->
            @if(auth()->user()->hasPermission('allow-restore'))
            <div class="flex flex-col items-center justify-center rounded border-dashed border-[#575757] border p-4 w-full">
                <span class="text-[#575757] text-sm py-1 font-semibold">Choose a file or drag & drop it here.</span>
                <span class="text-[#575757] text-sm py-1">File type must be .sqlite or .sql</span>

                <div id="hidden-class" class="hidden items-center space-x-2 mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                    <span id="backup-file-name" class="text-[#575757] text-sm font-semibold"></span>
                </div>
            @endif

            @if(auth()->user()->hasPermission('allow-restore'))
                <button id="backup-browse-btn"
                        class="min-w-[10vw] min-h-[3vw] rounded-lg bg-[#fdfdfd] text-[#575757] font-semibold hover:brightness-95 border border-[#575757] mt-5 mb-5 transition-all duration-200">
                    Browse
                </button>
            @else
                <button id="backup-browse-btn" class="hidden" disabled>Restore</button>
            @endif
            </div>

            @if(auth()->user()->hasPermission('allow-restore'))
            <form id="restore-form" action="{{ route('admin.backup.restore') }}" method="post" enctype="multipart/form-data" class="w-full">
                @csrf
                <input type="file" name="backup_file" accept=".sqlite,.sql" hidden>
                <button type="button" id="restore-btn" class="px-4 py-2 bg-gradient-to-r from-[#28C90E] to-[#1CA305] text-white rounded w-full hover:brightness-110 cursor-pointer">Restore</button>
            </form>
            @else
                <input class="hidden"type="file" name="backup_file" accept=".sqlite,.sql" hidden>
                <button type="button" id="restore-btn" class="hidden" disabled>Restore</button>
            @endif
        </div>
    </div>  
        @else
            <p class="text-red-600">You have no view permissions for Backup.</p>
        @endif
</main>

<script>
    const fileInput = document.querySelector('input[name="backup_file"]');
    const browseBtn = document.getElementById('backup-browse-btn');
    // Browse trigger w null checking
    if (browseBtn && fileInput) {
        browseBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            const fileName = fileInput.files[0]?.name || '';
            const fileNameLabel = document.getElementById('backup-file-name');
            const fileDisplayBox = document.getElementById('hidden-class');
            if (fileNameLabel && fileDisplayBox) {
                fileNameLabel.textContent = fileName;
                fileDisplayBox.classList.remove('hidden');
                fileDisplayBox.classList.add('flex');
            }
        });
    }

    const restoreBtn = document.getElementById('restore-btn');
    const confirmPopup = document.getElementById('confirm-input-popup');
    const confirmSubmitBtn = document.getElementById('confirm-submit-btn');
    const cancelConfirmBtn = document.getElementById('cancel-confirm-btn');


    // Restore button opens modal
    if (restoreBtn && confirmPopup) {
        restoreBtn.addEventListener('click', () => {
            if (!fileInput?.files.length) {
                const popup = document.getElementById('universal-x-popup');
                const xTopText = document.getElementById('x-topText');
                const xSubText = document.getElementById('x-subText');
                xTopText.textContent = "No file chosen";
                xSubText.textContent = "Please select a backup file first.";
                popup.style.display = 'flex';
                return;
            }
            confirmPopup.classList.remove('hidden');
            confirmPopup.classList.add('flex');
        });
    }

    // Cancel restore
    const confirmOverwriteInput = document.getElementById('confirm-overwrite-input');
    const confirmNameInput = document.getElementById('confirm-name-input');
    if (cancelConfirmBtn) {
        cancelConfirmBtn.addEventListener('click', () => {
            confirmPopup?.classList.add('hidden');
                
                if (confirmOverwriteInput) confirmOverwriteInput.value = '';
                if (confirmNameInput) confirmNameInput.value = '';
        });
    }


    // Confirm restore with validation
    if (confirmSubmitBtn) {
        confirmSubmitBtn.addEventListener('click', () => {
            const confirmText = confirmOverwriteInput?.value.trim();
            const nameText = confirmNameInput?.value.trim();

            if (confirmText !== 'OVERWRITE') {
                const popup = document.getElementById('universal-x-popup');
                const xTopText = document.getElementById('x-topText');
                const xSubText = document.getElementById('x-subText');
                const kButton = document.getElementById('uniX-confirm-btn');
                xTopText.textContent = "Wrong Confirmation";
                xSubText.textContent = "You must type 'OVERWRITE' exactly (case-sensitive).";
                confirmPopup.classList.add('hidden');
                popup.style.display = 'flex';

                if (kButton) {
                    kButton.addEventListener('click', () => {
                        popup.style.display = 'none';
                        confirmPopup.classList.remove('hidden');
                        confirmPopup.classList.add('flex');
                    });
                }
                return;
            }

            if (!nameText) {
                const popup = document.getElementById('universal-x-popup');
                const xTopText = document.getElementById('x-topText');
                const xSubText = document.getElementById('x-subText');
                const kButton = document.getElementById('uniX-confirm-btn');
                xTopText.textContent = "Name Field Required";
                xSubText.textContent = "Please enter your name to confirm.";
                confirmPopup.classList.add('hidden');
                popup.style.display = 'flex';

                if (kButton) {
                    kButton.addEventListener('click', () => {
                        popup.style.display = 'none';
                        confirmPopup.classList.remove('hidden');
                        confirmPopup.classList.add('flex');
                    });
                }
                return;
            }

            const restoreForm = document.getElementById('restore-form');
            restoreForm?.submit();
        });
    }
</script>
