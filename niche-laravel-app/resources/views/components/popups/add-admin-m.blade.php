<!-- Wrapper for the modal -->
<div id="add-admin-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

    <div class="min-w-[21vw] max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-8">

        <!-- ❌ X Button -->
        <button id="aa-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <form id="add-admin-form" method="POST" action="{{ url('/admin/users/create') }}">
            @csrf
            <div id="aa-step1">
                <div class="flex flex-col items-center justify-center mt-4 space-y-6">

                    <!-- Main Message -->
                    <div class="text-center text-xl font-medium text-[#575757] m-auto">
                        Add Admin
                    </div>
                    <!-- Input and Buttons Wrapper -->
                    <div class="w-[20vw] flex flex-col space-y-4 mt-5">
                        <!-- Input Field -->
                        <input
                        id="first-name-input"
                        type="text"
                        placeholder="First Name"
                        class="h-[65px] rounded-[10px] border border-[#575757]
                            placeholder-[#575757] text-[#575757] font-light px-4
                            focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                        />

                        <input
                        id="last-name-input"
                        type="text"
                        placeholder="Last Name"
                        class="h-[65px] rounded-[10px] border border-[#575757]
                            placeholder-[#575757] text-[#575757] font-light px-4
                            focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                        />

                        <input
                        id="email-input"
                        type="text"
                        placeholder="USeP Email"
                        class="h-[65px] rounded-[10px] border border-[#575757]
                            placeholder-[#575757] text-[#575757] font-light px-4
                            focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3"
                        />
                        <!-- NEW warning -->
                        <span id="email-warning" class="text-sm text-red-500 hidden">
                            Please use a valid USeP e-mail (ending with @usep.edu.ph).
                        </span>

                        <!-- Confirm Button (Right aligned) -->
                        <div class="flex justify-end mt-5">
                            <button
                                id="aa-next-btn" type="button"
                                class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r
                                from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200 hover: cursor-pointer">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aa-step2" class="hidden">
                <div class="flex flex-col items-center justify-center mt-4 space-y-6">

                    <!-- Main Message -->
                    <div class="text-center text-xl font-medium text-[#575757] m-auto">
                        Permission
                    </div>

                    <!-- Input and Buttons Wrapper -->
                    <div class="w-[20vw] flex flex-col space-y-4 mt-5">
                        
                        <!-- Adminrmanangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            Admin Management
                        </div>
                        <div class="w-[20vw] grid grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-dashboard"
                                />
                                <span class="text-[#575757] text-base">View Dashboard</span>
                            </label>
                        </div>

                        <!-- Submission Manangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            Submissions Management
                        </div>

                        <div class="w-[20vw] grid grid-cols-2 gap-4">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-submissions"
                                />
                                <span class="text-[#575757] text-base">View Submissions</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="acc-rej-submission"
                                />
                                <span class="text-[#575757] text-base">Accept/Reject Submission</span>
                            </label>
                        </div>

                        <!-- Inventory Manangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            Inventory Management
                        </div>

                        <div class="w-[20vw] grid grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-inventory"
                                />
                                <span class="text-[#575757] text-base">View Inventory</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="add-inventory"
                                />
                                <span class="text-[#575757] text-base">Add Inventory</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="import-inventory"
                                />
                                <span class="text-[#575757] text-base">Import Invenory</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="export-inventory"
                                />
                                <span class="text-[#575757] text-base">Export Invenory</span>
                            </label>
                        </div>
                        
                        <!-- Usermanangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            User Management
                        </div>

                        <div class="w-[20vw] grid grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-accounts"
                                />
                                <span class="text-[#575757] text-base">View Accounts</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="edit-permissions"
                                />
                                <span class="text-[#575757] text-base">Edit Permission</span>
                            </label>

                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="add-admin"
                                />
                                <span class="text-[#575757] text-base">Add Admin</span>
                            </label>
                        </div>
                        
                        <!-- Logsmanangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            Logs Management
                        </div>
                        <div class="w-[20vw] grid grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-logs"
                                />
                                <span class="text-[#575757] text-base">View Logsd</span>
                            </label>
                        </div>
                        
                        <!-- Bkupmanangemnt Field -->
                        <div class="text-left text-l font-semibold text-[#575757]">
                            Backup Management
                        </div>
                        <div class="w-[20vw] grid grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="view-backup"
                                />
                                <span class="text-[#575757] text-base">View Backup</span>
                            </label>
                            
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="download-backup"
                                />
                                <span class="text-[#575757] text-base">Download Backup</span>
                            </label>
                            
                            <label class="flex items-center space-x-3">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 hover: cursor-pointer"
                                    id="allow-restore"
                                />
                                <span class="text-[#575757] text-base">Allow Restore</span>
                            </label>
                        </div>

                        <!-- Confirm Button (Right aligned) -->
                        <div class="flex justify-end mt-5">
                            <button
                                id="aa-confirm-btn" type="submit"
                                class="min-w-[10vw] min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r
                                from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200 hover: cursor-pointer">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- form end-->

  </div>
</div>

<script>
    let step1, step2, nextBtn;

    document.addEventListener('DOMContentLoaded', () => {
        nextBtn = document.getElementById('aa-next-btn');
        step1   = document.getElementById('aa-step1');
        step2   = document.getElementById('aa-step2');

        const firstName = document.getElementById('first-name-input');
        const lastName  = document.getElementById('last-name-input');
        const email     = document.getElementById('email-input');

        const validate = () => {
            const emailVal = email.value.trim().toLowerCase();
            const ok =
                firstName.value.trim() &&
                lastName.value.trim()  &&
                emailVal.endsWith('@usep.edu.ph');

            nextBtn.disabled = !ok;

            // show / hide warning
            document.getElementById('email-warning')
                    .classList.toggle('hidden', emailVal === '' || emailVal.endsWith('@usep.edu.ph'));
        };
        validate();
        [firstName, lastName, email].forEach(el => el.addEventListener('input', validate));
    });

    /* 2️⃣  These handlers now see step1 & step2 */
    document.getElementById('aa-next-btn').addEventListener('click', () => {
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
    });

    const closeBtn = document.getElementById('aa-close-popup');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            document.getElementById('add-admin-popup').style.display = 'none';
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
        });
    }

    const confirmBtn = document.getElementById('aa-confirm-btn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', () => {
            document.getElementById('add-admin-popup').style.display = 'none';
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
        });
    }
</script>