<x-popups.admin-add-succ-m />

<div id="add-admin-popup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div id="aaa-step1" class="relative max-h-[90vh] min-w-[40vw] max-w-[100vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">

        <!-- Close Button -->
        <button id="aaa-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-3 text-2xl font-bold text-gray-900">Add Admin Account</h2>
        </div>

        <form id="add-admin-form" class="mt-2 space-y-6" method="POST" action="{{ route('admin.store') }}">
            @csrf

            <div class="flex flex-col gap-8 md:flex-row">
                <div class="flex-1 space-y-1">
                    <label class="block text-sm font-bold text-gray-700">PERSONAL INFORMATION:</label>
                    <label for="aaa-first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="aaa-first-name" name="first_name" type="text" placeholder="First Name"
                        value="{{ old('first-name') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />

                    <label for="aaa-last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="aaa-last-name" name="last_name" type="text" placeholder="Last Name"
                        value="{{ old('last-name') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />

                    <label for="aaa-usep-email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="aaa-usep-email" type="email" placeholder="USeP Email" name="email"
                        value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />

                    <div id="email-warning" class="hidden text-sm text-red-500"></div>

                    <label for="aaa-password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="aaa-password" type="password" name="password" placeholder="Password"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />

                    <label for="aaa-confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input id="aaa-confirm-password" type="password" name="confirm-password"
                        placeholder="Confirm Password"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />

                    <div id="confirm-password-error" class="hidden text-sm text-red-500"></div>

                    <label class="flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                        <input type="checkbox" id="show-password-toggle"
                            class="h-4 w-4 accent-[#575757] hover:cursor-pointer" />
                        <span class="hover:cursor-pointer">Show password</span>
                    </label>
                </div>

                <!-- Divider -->
                <div class="h-115 w-px bg-[#dddddd]"></div>

                <div class="flex-1 space-y-1">
                    <div class="flex items-center justify-start gap-2">
                        <label class="block text-sm font-bold text-gray-700">PERMISSIONS:</label>
                        <button type="button" id="toggle-all-permissions" class="text-xs text-red-600 hover:underline">
                            <span id="toggle-all-text">[Check All]</span>
                        </button>
                    </div>

                    <!-- Admin Management -->
                    <div>
                        <h5 class="text-sm font-semibold text-gray-700">Admin Management</h5>
                        <div class="mt-1 grid w-full grid-cols-1 gap-4">
                            <div class="flex items-center">
                                <input id="view-dashboard-cb" value="View Dashboard" type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-dashboard-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Dashboard
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submissions Management -->
                    <div class="mt-3">
                        <h5 class="text-sm font-semibold text-gray-700">Submissions Management</h5>
                        <div class="grid w-full grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <input id="view-submissions-cb" data-group="submissions" value="View Submissions"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-submissions-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Submissions
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="acc-rej-submission-cb" data-group="submissions"
                                    value="Accept/Reject Submission" type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="acc-rej-submission-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Accept/Reject Submission
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Management -->
                    <div class="mt-3">
                        <h5 class="text-sm font-semibold text-gray-700">Inventory Management</h5>
                        <div class="mt-1 grid w-full grid-cols-2 gap-2">
                            <div class="flex items-center">
                                <input id="view-inventory-cb" data-group="inventory-management"
                                    value="View Inventory" type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="add-inventory-cb" data-group="inventory-management" value="Add Inventory"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="add-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Add Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="import-inventory-cb" data-group="inventory-management"
                                    value="Import Inventory" type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="import-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Import Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="export-inventory-cb" data-group="inventory-management"
                                    value="Export Inventory" type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="export-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Export Inventory
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- User Management -->
                    <div class="mt-3">
                        <h5 class="text-sm font-semibold text-gray-700">User Management</h5>
                        <div class="mt-1 grid w-full grid-cols-2 gap-2">
                            <div class="flex items-center">
                                <input id="view-accounts-cb" data-group="user-management" value="View Accounts"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-accounts-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Accounts
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="edit-permissions-cb" data-group="user-management" value="Edit Permissions"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="edit-permissions-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Edit Permissions
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="add-admin-cb" data-group="user-management" value="Add Admin"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="add-admin-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Add Admin
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Logs Management -->
                    <div class="mt-3">
                        <h5 class="text-sm font-semibold text-gray-700">Logs Management</h5>
                        <div class="mt-1 grid w-full grid-cols-2 gap-2">
                            <div class="flex items-center">
                                <input id="view-logs-cb" value="View Logs" type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-logs-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Logs
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Backup Management -->
                    <div class="mt-3">
                        <h5 class="text-sm font-semibold text-gray-700">Backup Management</h5>
                        <div class="mt-1 grid w-full grid-cols-2 gap-2">
                            <div class="flex items-center">
                                <input id="view-backup-cb" data-group="backup-management" value="View Backup"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-backup-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Backup
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="download-backup-cb" data-group="backup-management" value="Download Backup"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="download-backup-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Download Backup
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="allow-restore-cb" data-group="backup-management" value="Allow Restore"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="allow-restore-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Allow Restore
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="permissions" id="permissions">
            <div class="flex justify-center space-x-6">
                <button id="aaa-cancel-btn" type="button"
                    class="min-h-[3vw] min-w-[10vw] cursor-pointer rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fdfdfd] hover:brightness-110">
                    Cancel
                </button>
                <button id="aaa-add-admin-btn" type="submit"
                    class="min-h-[3vw] min-w-[10vw] cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] text-[#fdfdfd] hover:brightness-110">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addAdminPopup = document.getElementById('add-admin-popup');
        const addAdminForm = document.getElementById('add-admin-form');
        const password = document.getElementById('aaa-password');
        const confirmPassword = document.getElementById('aaa-confirm-password');
        const showPasswordToggle = document.getElementById('show-password-toggle');
        const submitBtn = document.getElementById('aaa-add-admin-btn');
        const emailInput = document.getElementById('aaa-usep-email'); // Added this

        // Error divs
        const confirmError = document.getElementById('confirm-password-error');
        const emailWarning = document.getElementById('email-warning');

        // Toggle password visibility for all password fields
        showPasswordToggle.addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            password.type = type;
            confirmPassword.type = type;
        });

        const firstName = document.getElementById('aaa-first-name');
        const lastName = document.getElementById('aaa-last-name');

        const validate = () => {
            const ok =
                firstName.value.trim() &&
                lastName.value.trim()
        };
        validate();
        [firstName, lastName, emailInput].forEach(el => el.addEventListener('input', validate));

        // Email validation - improved version
        emailInput.addEventListener('input', function() {
            const email = this.value.trim();
            const isUSePEmail = email.endsWith('@usep.edu.ph');

            if (email === '') {
                emailWarning.classList.add('hidden');
            } else if (!isUSePEmail) {
                emailWarning.classList.remove('hidden');
                emailWarning.textContent = 'Please enter a valid email address (@usep.edu.ph)';
            } else {
                emailWarning.classList.add('hidden');
            }
        });

        // Check password match whenever either field changes
        [password, confirmPassword].forEach(field => {
            field.addEventListener('input', checkPasswordMatch);
        });

        function checkPasswordMatch() {
            const passwordValue = password.value;
            const confirmValue = confirmPassword.value;

            // If either field is empty, hide the warning
            if (passwordValue === '' || confirmValue === '') {
                confirmError.classList.add('hidden');
                return;
            }

            // Only show warning if both fields have values and don't match
            if (passwordValue !== confirmValue) {
                confirmError.classList.remove('hidden');
                confirmError.textContent = 'Passwords do not match.';
            } else {
                confirmError.classList.add('hidden');
            }
        }

        // Get all permission checkboxes
        const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
        const hiddenPermissionsInput = document.getElementById('permissions');
        const toggleAllBtn = document.getElementById('toggle-all-permissions');
        const toggleAllText = document.getElementById('toggle-all-text');

        function updatePermissions() {
            const selectedPermissions = Array.from(permissionCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
            hiddenPermissionsInput.value = JSON.stringify(selectedPermissions);

            // Update the toggle all text based on current state
            const allChecked = Array.from(permissionCheckboxes).every(cb => cb.checked);
            toggleAllText.textContent = allChecked ? '[Uncheck All]' : '[Check All]';
        }

        // Initialize permissions
        updatePermissions();
        enforceGroupViewRules();

        function enforceGroupViewRules() {
            const viewCheckboxes = Array.from(permissionCheckboxes).filter(cb =>
                cb.id.includes('view-') && cb.dataset.group
            );

            viewCheckboxes.forEach(viewCheckbox => {
                const group = viewCheckbox.dataset.group;
                const relatedCheckboxes = Array.from(permissionCheckboxes).filter(cb =>
                    cb.dataset.group === group && cb !== viewCheckbox
                );

                const updateRelatedCheckboxes = () => {
                    const isViewChecked = viewCheckbox.checked;

                    relatedCheckboxes.forEach(cb => {
                        cb.disabled = !isViewChecked;
                        if (!isViewChecked) {
                            cb.checked = false;
                        }

                        // Update Tailwind classes based on state
                        if (isViewChecked) {
                            cb.classList.remove('disabled:opacity-50',
                                'disabled:cursor-not-allowed');
                            cb.classList.add('text-blue-600', 'focus:ring-blue-500');
                        } else {
                            cb.classList.add('disabled:opacity-50',
                                'disabled:cursor-not-allowed');
                        }
                    });

                    updatePermissions();
                };

                // Set initial state
                updateRelatedCheckboxes();
                viewCheckbox.addEventListener('change', updateRelatedCheckboxes);
            });
        }

        permissionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updatePermissions);
        });


        // Toggle all permissions
        toggleAllBtn.addEventListener('click', () => {
            const allCurrentlyChecked = Array.from(permissionCheckboxes).every(cb => cb.checked);
            const newState = !allCurrentlyChecked;

            permissionCheckboxes.forEach(cb => {
                cb.checked = newState;
                // Ensure dependent checkboxes respect view rules
                if (cb.id.includes('view-') && cb.dataset.group) {
                    const event = new Event('change');
                    cb.dispatchEvent(event);
                }
            });
            updatePermissions();
        });

        // Close popup handlers
        document.addEventListener('click', function(e) {
            // Close button
            if (e.target.closest('#aaa-close-popup')) {
                addAdminPopup.style.display = 'none';
            }

            // Cancel button
            if (e.target.closest('#aaa-cancel-btn')) {
                e.preventDefault();
                addAdminPopup.style.display = 'none';
            }
        });
    });
</script>
