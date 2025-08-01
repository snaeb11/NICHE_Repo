<div id="edit-admin-perms-popup" style="display: none;"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 px-4 sm:px-0">
    <form action="">
        <div
            class="w-full sm:min-w-[21vw] sm:max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-8 overflow-y-auto">
            <div id="eap-step2">
                <div class="flex flex-col items-center justify-center mt-4 space-y-6">
                    <div class="text-center text-xl font-medium text-[#575757] m-auto">Permission</div>

                    <div class="w-full sm:w-[20vw] flex flex-col space-y-4 mt-5">

                        <!-- Admin Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">Admin Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer"
                                    id="edit-perms-view-dashboard" />
                                <span class="text-[#575757] text-base">View Dashboard</span>
                            </label>
                        </div>

                        <!-- Submissions Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">Submissions Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer"
                                    id="edit-perms-view-submissions" />
                                <span class="text-[#575757] text-base">View Submissions</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer"
                                    id="edit-perms-acc-rej-submissions" />
                                <span class="text-[#575757] text-base">Accept/Reject Submission</span>
                            </label>
                        </div>

                        <!-- Inventory Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">Inventory Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-view-inventory"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">View Inventory</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-add-inventory"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Add Inventory</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-edit-inventory"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Edit Inventory</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-import-inventory"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Import Inventory</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-export-inventory"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Export Inventory</span>
                            </label>
                        </div>

                        <!-- User Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">User Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-view-accounts"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">View Accounts</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-edit-permissions"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Edit Permission</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-add-admin"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Add Admin</span>
                            </label>
                        </div>

                        <!-- Logs Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">Logs Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-view-logs"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">View Logs</span>
                            </label>
                        </div>

                        <!-- Backup Management -->
                        <div class="text-left text-l font-semibold text-[#575757]">Backup Management</div>
                        <div class="w-full sm:w-[20vw] grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-view-backup"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">View Backup</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-download-backup"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Download Backup</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="edit-perms-allow-restore"
                                    class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 cursor-pointer" />
                                <span class="text-[#575757] text-base">Allow Restore</span>
                            </label>
                        </div>

                        <!-- Confirm Button -->
                        <div class="flex justify-end mt-5 space-x-1">
                            <button id="eap-cancel-btn" type="button"
                                class="w-full sm:min-w-[10vw] sm:min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#d1d1d1] to-[#585858] hover:brightness-110 transition duration-200 cursor-pointer">
                                Cancel
                            </button>
                            <button id="eap-confirm-btn" type="submit"
                                class="w-full sm:min-w-[10vw] sm:min-h-[3vw] rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#28CA0E] to-[#1BA104] hover:brightness-110 transition duration-200 cursor-pointer">
                                Confirm
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('eap-cancel-btn').addEventListener('click', () => {
            // Hide the popup
            document.getElementById('edit-admin-perms-popup').style.display = 'none';

            // Reset all checkboxes
            resetPermissionCheckboxes();
        });

        //submissions permissions
        const viewSubmissions = document.getElementById('edit-perms-view-submissions');
        const accRejSubmission = document.getElementById('edit-perms-acc-rej-submissions');

        const updateSubmissionPermissions = () => {
            const isChecked = viewSubmissions.checked;
            accRejSubmission.disabled = !isChecked;
            if (!isChecked) accRejSubmission.checked = false;
        };

        updateSubmissionPermissions();

        viewSubmissions.addEventListener('change', updateSubmissionPermissions);

        //inventory permissions
        const viewInventory = document.getElementById('edit-perms-view-inventory');
        const dependentCheckboxes = [
            document.getElementById('edit-perms-add-inventory'),
            document.getElementById('edit-perms-edit-inventory'),
            document.getElementById('edit-perms-import-inventory'),
            document.getElementById('edit-perms-export-inventory')
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
        const viewAccountsCheckbox = document.getElementById('edit-perms-view-accounts');
        const userDependentCheckboxes = [
            document.getElementById('edit-perms-edit-permissions'),
            document.getElementById('edit-perms-add-admin')
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
        const viewBackupCheckbox = document.getElementById('edit-perms-view-backup');
        const backupDependentCheckboxes = [
            document.getElementById('edit-perms-download-backup'),
            document.getElementById('edit-perms-allow-restore')
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

        //amoghus
        document.getElementById('eap-confirm-btn').addEventListener('click', async function(e) {
            e.preventDefault();

            const form = document.querySelector('#edit-admin-perms-popup form');
            const userId = form.dataset.userId;

            try {
                const permissions = [];
                document.querySelectorAll('#edit-admin-perms-popup input[type="checkbox"]:checked')
                    .forEach(checkbox => {
                        const permission = checkbox.id.replace('edit-perms-', '').replace(/-/g,
                            '_');
                        permissions.push(permission);
                    });

                const response = await fetch(`/admin/users/${userId}/update-permissions`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content
                    },
                    body: JSON.stringify({
                        permissions
                    })
                });

                if (!response.ok) throw new Error('Failed to update permissions');

                alert('Permissions updated successfully!');
                document.getElementById('edit-admin-perms-popup').style.display = 'none';

                // Refresh the user data
                if (typeof fetchUserData === 'function') {
                    fetchUserData();
                } else {
                    console.warn('fetchUserData function not available');
                    location.reload();
                }

            } catch (error) {
                console.error('Update error:', error);
                alert(`Error: ${error.message}`);
            }
        });

        function resetPermissionCheckboxes() {
            // List all permission checkbox IDs
            const checkboxIds = [
                'edit-perms-view-dashboard',
                'edit-perms-view-submissions',
                'edit-perms-acc-rej-submissions',
                'edit-perms-view-inventory',
                'edit-perms-add-inventory',
                'edit-perms-import-inventory',
                'edit-perms-export-inventory',
                'edit-perms-view-accounts',
                'edit-perms-edit-permissions',
                'edit-perms-add-admin',
                'edit-perms-view-logs',
                'edit-perms-view-backup',
                'edit-perms-download-backup',
                'edit-perms-allow-restore'
            ];

            // Uncheck all boxes and reset dependencies
            checkboxIds.forEach(id => {
                const checkbox = document.getElementById(id);
                if (checkbox) {
                    checkbox.checked = false;
                    // Trigger change event to update dependent checkboxes
                    checkbox.dispatchEvent(new Event('change'));
                }
            });
        }
    });
</script>
