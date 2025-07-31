<!-- Wrapper for the modal -->
<div id="add-admin-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 px-4 sm:px-0">

  <div class="w-full sm:min-w-[21vw] sm:max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-8 overflow-y-auto">

    <!-- X Button -->
    <button id="aa-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <form id="add-admin-form" method="POST" action="{{ url('/admin/users/create') }}">
      @csrf

      <!-- Step 1 -->
      <div id="aa-step1">
        <div class="flex flex-col items-center justify-center mt-4 space-y-6">
          <div class="text-center text-xl font-medium text-[#575757] m-auto">Add Admin</div>

          <div class="w-full sm:w-[20vw] flex flex-col space-y-4 mt-5">
            <input id="first-name-input" type="text" placeholder="First Name"
              class="h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3" />
            <input id="last-name-input" type="text" placeholder="Last Name"
              class="h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3" />
            <input id="email-input" type="text" placeholder="USeP Email"
              class="h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 mt-3" />
            <span id="email-warning" class="text-sm text-red-500 hidden">Please use a valid USeP e-mail (ending with @usep.edu.ph).</span>

            <div class="flex justify-end mt-5">
              <button id="aa-next-btn" type="button"
                class="w-full sm:min-w-[10vw] sm:min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200 cursor-pointer"> Next              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div id="aa-step2" class="hidden">
        <div class="flex flex-col items-center justify-center mt-4 space-y-6">
          <div class="text-center text-xl font-medium text-[#575757] m-auto">Permission</div>

          <div class="w-full sm:w-[20vw] flex flex-col space-y-4 mt-5">

            <!-- Admin Management -->
            <div class="text-left text-l font-semibold text-[#575757]">Admin Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" id="view-dashboard" />
                <span class="text-[#575757] text-base">View Dashboard</span>
              </label>
            </div>

            <!-- Submissions Management -->
            <div class="text-left text-l font-semibold text-[#575757]">Submissions Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" id="view-submissions" />
                <span class="text-[#575757] text-base">View Submissions</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" id="acc-rej-submission" />
                <span class="text-[#575757] text-base">Accept/Reject Submission</span>
              </label>
            </div>

            <!-- Inventory Management -->
            <div class="text-left text-l font-semibold text-[#575757]">Inventory Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="view-inventory"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">View Inventory</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="add-inventory"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Add Inventory</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="import-inventory"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Import Inventory</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="export-inventory"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Export Inventory</span>
              </label>
            </div>

            <!-- User Management -->
            <div class="text-left text-l font-semibold text-[#575757]">User Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="view-accounts"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">View Accounts</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="edit-permissions"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Edit Permission</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="add-admin"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Add Admin</span>
              </label>
            </div>

            <!-- Logs Management -->
            <div class="text-left text-l font-semibold text-[#575757]">Logs Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="view-logs"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">View Logs</span>
              </label>
            </div>

            <!-- Backup Management -->
            <div class="text-left text-l font-semibold text-[#575757]">Backup Management</div>
            <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="view-backup"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">View Backup</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="download-backup"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Download Backup</span>
              </label>
              <label class="flex items-center space-x-3">
                <input type="checkbox" id="allow-restore"
                  class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                <span class="text-[#575757] text-base">Allow Restore</span>
              </label>
            </div>

            <!-- Confirm Button -->
            <div class="flex justify-end mt-5 space-x-1">
                <button id="aa-back-btn" type="button"
                class="w-full sm:min-w-[10vw] sm:min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#d1d1d1] to-[#585858] hover:brightness-110 transition duration-200 cursor-pointer">
                Back
              </button>
              <button id="aa-confirm-btn" type="submit"
                class="w-full sm:min-w-[10vw] sm:min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200 cursor-pointer">
                Confirm
              </button>
            </div>

          </div>
        </div>
      </div>
    </form>

  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    let step1, step2, nextBtn;

    
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


            // show / hide warning
            document.getElementById('email-warning')
                    .classList.toggle('hidden', emailVal === '' || emailVal.endsWith('@usep.edu.ph'));
        };
        validate();
        [firstName, lastName, email].forEach(el => el.addEventListener('input', validate));


    nextBtn.addEventListener('click', () => {
        const emailVal = email.value.trim().toLowerCase();

        if (
            !firstName.value.trim() ||
            !lastName.value.trim() ||
            !emailVal ||
            !emailVal.endsWith('@usep.edu.ph')
        ) {
            const popupAddmin = document.getElementById('universal-x-popup');
            const xTopTextAddmin = document.getElementById('x-topText');
            const xSubTextAddmin = document.getElementById('x-subText');

            const mainPopup = document.getElementById('add-admin-popup');
            xTopTextAddmin.textContent = "Missing fields.";
            xSubTextAddmin.textContent = "Please fill in all fields and ensure the email ends with @usep.edu.ph.";
            popupAddmin.style.display = 'flex';
            mainPopup.style.display = 'none';
            document.getElementById('email-warning').classList.remove('hidden');
            return;

            const xConfirmAddmin = document.getElementById('uniX-confirm-btn');
            xConfirmAddmin.addEventListener('click', () => {
                document.getElementById('universal-x-popup').style.display = 'none';
                document.getElementById('add-admin-popup').style.display = 'flex';
            });
        }

        step1.classList.add('hidden');
        step2.classList.remove('hidden');
    });
    const closeBtn = document.getElementById('aa-close-popup');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            document.getElementById('add-admin-popup').style.display = 'none';
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            resetModal();
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

    const backBtn = document.getElementById('aa-back-btn');
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
            resetModal();
        });
    }
    function resetModal() {
    const modal = document.getElementById('add-admin-popup');
    const inputs = modal.querySelectorAll('input[type="text"]');
    inputs.forEach(input => input.value = '');

    const checkboxes = modal.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(cb => cb.checked = false);

    const emailWarning = document.getElementById('email-warning');
    if (emailWarning) {
      emailWarning.classList.add('hidden');
    }

    document.getElementById('aa-step1').classList.remove('hidden');
    document.getElementById('aa-step2').classList.add('hidden');
  }

  //checkbox shenanigas

  //submissions permissions
   const viewSubmissions = document.getElementById('view-submissions');
    const accRejSubmission = document.getElementById('acc-rej-submission');

    const updateSubmissionPermissions = () => {
        const isChecked = viewSubmissions.checked;
        accRejSubmission.disabled = !isChecked;
        if (!isChecked) accRejSubmission.checked = false;
    };

    updateSubmissionPermissions();

    viewSubmissions.addEventListener('change', updateSubmissionPermissions);

  //inventory permissions
  const viewInventory = document.getElementById('view-inventory');
    const dependentCheckboxes = [
        document.getElementById('add-inventory'),
        document.getElementById('import-inventory'),
        document.getElementById('export-inventory')
    ];

    const updateInventoryPermissions = () => {
        const isChecked = viewInventory.checked;

        dependentCheckboxes.forEach(checkbox => {
            checkbox.disabled = !isChecked;
            checkbox.checked = isChecked ? checkbox.checked : false;
        });
    };

    updateInventoryPermissions();

    viewInventory.addEventListener('change', updateInventoryPermissions);

    //user management permissions
    const viewAccountsCheckbox = document.getElementById('view-accounts');
    const userDependentCheckboxes = [
    document.getElementById('edit-permissions'),
    document.getElementById('add-admin')
    ];

    function updateUserCheckboxStates() {
    const enabled = viewAccountsCheckbox.checked;
    userDependentCheckboxes.forEach(cb => {
        cb.disabled = !enabled;
        if (!enabled) cb.checked = false;
    });
    }

    updateUserCheckboxStates();

    viewAccountsCheckbox.addEventListener('change', updateUserCheckboxStates);

    //backup management permissions
    const viewBackupCheckbox = document.getElementById('view-backup');
    const backupDependentCheckboxes = [
    document.getElementById('download-backup'),
    document.getElementById('allow-restore')
    ];

    function updateBackupCheckboxStates() {
    const enabled = viewBackupCheckbox.checked;
    backupDependentCheckboxes.forEach(cb => {
        cb.disabled = !enabled;
        if (!enabled) cb.checked = false;
    });
    }

    updateBackupCheckboxStates();
    viewBackupCheckbox.addEventListener('change', updateBackupCheckboxStates);
 });
</script>