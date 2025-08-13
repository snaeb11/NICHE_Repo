<x-popups.admin-add-succ-m />
<x-popups.admin-add-fail-m />

<div id="add-admin-popup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div id="aaa-step1" class="relative max-h-[90vh] min-w-[50vw] max-w-[100vw] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">

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

                    <!-- First Name -->
                    <label for="aaa-first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="aaa-first-name" name="first_name" type="text" placeholder="First Name"
                        value="{{ old('first-name') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />
                    <div id="aaa-first-name-error" class="hidden text-sm text-red-500"></div>

                    <!-- Last Name -->
                    <label for="aaa-last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="aaa-last-name" name="last_name" type="text" placeholder="Last Name"
                        value="{{ old('last-name') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />
                    <div id="aaa-last-name-error" class="hidden text-sm text-red-500"></div>

                    <!-- Email -->
                    <label for="aaa-usep-email" class="block text-sm font-medium text-gray-700">Email
                        Address</label>
                    <input id="aaa-usep-email" type="email" placeholder="USeP Email" name="email"
                        value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />
                    <div id="aaa-email-error" class="hidden text-sm text-red-500"></div>

                    <!-- Temporary Password -->
                    <label for="aaa-temp-password" class="block text-sm font-medium text-gray-700">Temporary
                        Password</label>
                    <input id="aaa-temp-password" type="text" name="password" value="!2Qwerty" readonly
                        class="mt-1 block w-full rounded-lg border border-[#575757] bg-gray-100 px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none" />
                    <p class="mt-1 text-xs text-red-500"><span class="font-semibold">Note:</span> User will be
                        required to change this password on
                        first
                        login</p>
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
                    <p id="permissions-error" class="mt-2 text-sm text-red-600">Please select at least one
                        permission</p>

                    <!-- Admin Management -->
                    <div>
                        <h5 class="text-sm font-semibold text-gray-700">Admin Management</h5>
                        <div class="mt-1 grid w-full grid-cols-1 gap-4">
                            <div class="flex items-center">
                                <input id="view-dashboard-cb" value="view-dashboard" type="checkbox"
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
                                <input id="view-submissions-cb" data-group="submissions" value="view-submissions"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-submissions-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Submissions
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="acc-rej-submission-cb" data-group="submissions" value="acc-rej-submission"
                                    type="checkbox"
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
                                    value="view-inventory" type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="add-inventory-cb" data-group="inventory-management" value="add-inventory"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="add-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Add Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="import-inventory-cb" data-group="inventory-management"
                                    value="import-inventory" type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="import-inventory-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Import Inventory
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="export-inventory-cb" data-group="inventory-management"
                                    value="export-inventory" type="checkbox"
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
                                <input id="view-accounts-cb" data-group="user-management" value="view-accounts"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-accounts-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Accounts
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="edit-permissions-cb" data-group="user-management" value="edit-permissions"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="edit-permissions-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Edit Permissions
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="add-admin-cb" data-group="user-management" value="add-admin"
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
                                <input id="view-logs-cb" value="view-logs" type="checkbox"
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
                                <input id="view-backup-cb" data-group="backup-management" value="view-backup"
                                    type="checkbox"
                                    class="permission-checkbox view-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 bg-white text-green-600 focus:ring-green-500" />
                                <label for="view-backup-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    View Backup
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="download-backup-cb" data-group="backup-management" value="download-backup"
                                    type="checkbox"
                                    class="permission-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    disabled />
                                <label for="download-backup-cb" class="ml-2 cursor-pointer text-sm text-gray-700">
                                    Download Backup
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="allow-restore-cb" data-group="backup-management" value="allow-restore"
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
    document.addEventListener('DOMContentLoaded', function() {
        const addAdminPopup = document.getElementById('add-admin-popup');
        const addAdminForm = document.getElementById('add-admin-form');
        const closeBtn = document.getElementById('aaa-close-popup');
        const cancelBtn = document.getElementById('aaa-cancel-btn');
        const submitBtn = document.getElementById('aaa-add-admin-btn');
        const successModal = document.getElementById('admin-add-succ-m');
        const errorModal = document.getElementById('admin-add-fail-m');
        const errorMessage = document.getElementById('admin-add-fail-message');

        // Error elements
        const firstNameError = document.getElementById('aaa-first-name-error');
        const lastNameError = document.getElementById('aaa-last-name-error');
        const emailError = document.getElementById('aaa-email-error');
        const permissionsError = document.getElementById('permissions-error');

        // Input fields
        const firstNameInput = document.getElementById('aaa-first-name');
        const lastNameInput = document.getElementById('aaa-last-name');
        const emailInput = document.getElementById('aaa-usep-email');

        // Permission checkboxes
        const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
        const hiddenPermissionsInput = document.getElementById('permissions');
        const toggleAllBtn = document.getElementById('toggle-all-permissions');
        const toggleAllText = document.getElementById('toggle-all-text');

        // Regular expressions
        const nameRegex = /^[A-Za-z\s'\-]+$/;
        const emailRegex = /^[^\s@]+@usep\.edu\.ph$/;

        // Add blur events alongside input events
        firstNameInput.addEventListener('input', () => {
            validateNameField(firstNameInput, firstNameError);
        });
        firstNameInput.addEventListener('blur', () => {
            validateNameField(firstNameInput, firstNameError);
        });

        lastNameInput.addEventListener('input', () => {
            validateNameField(lastNameInput, lastNameError);
        });
        lastNameInput.addEventListener('blur', () => {
            validateNameField(lastNameInput, lastNameError);
        });

        emailInput.addEventListener('input', () => {
            validateEmailField(emailInput, emailError);
        });
        emailInput.addEventListener('blur', () => {
            validateEmailField(emailInput, emailError);
        });

        // Name validation
        function validateNameField(field, errorElement) {
            const value = field.value.trim();
            if (value === "") {
                errorElement.classList.add('hidden');
                return false;
            }
            if (!nameRegex.test(value)) {
                errorElement.textContent = 'Only letters, spaces, apostrophes, and hyphens are allowed';
                errorElement.classList.remove('hidden');
                return false;
            }
            errorElement.classList.add('hidden');
            return true;
        }

        // Email validation
        function validateEmailField(field, errorElement) {
            const value = field.value.trim();
            if (value === "") {
                errorElement.classList.add('hidden');
                return false;
            }
            if (!emailRegex.test(value)) {
                errorElement.textContent = 'Please enter a valid USeP email (@usep.edu.ph)';
                errorElement.classList.remove('hidden');
                return false;
            }
            errorElement.classList.add('hidden');
            return true;
        }


        // New function to highlight permissions error
        function highlightPermissionsError() {
            // Add asterisk to error message
            permissionsError.textContent = 'Please select at least one permission*';
            permissionsError.classList.remove('hidden');

            // Add bold styling
            permissionsError.classList.add('font-bold');

            // Remove highlight after 3 seconds
            setTimeout(() => {
                permissionsError.classList.remove('font-bold');
                // Remove asterisk but keep message visible
                permissionsError.textContent = 'Please select at least one permission';
            }, 3000);
        }


        // Update your existing validatePermissionsField function
        function validatePermissionsField() {
            const selectedPermissions = Array.from(permissionCheckboxes)
                .filter(cb => cb.checked);

            if (selectedPermissions.length === 0) {
                permissionsError.textContent = 'Please select at least one permission';
                return false;
            }

            permissionsError.classList.add('hidden');
            return true;
        }

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

        // Event listeners for real-time validation
        firstNameInput.addEventListener('input', () => validateNameField(firstNameInput, firstNameError));
        lastNameInput.addEventListener('input', () => validateNameField(lastNameInput, lastNameError));
        emailInput.addEventListener('input', () => validateEmailField(emailInput, emailError));

        // Add event listeners to all permission checkboxes
        permissionCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                updatePermissions();
                validatePermissionsField();
            });
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

        // Form submission
        addAdminForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            clearAllErrors();

            // Frontend validation
            const isNameValid = validateNameField(firstNameInput, firstNameError);
            const isLastNameValid = validateNameField(lastNameInput, lastNameError);
            const isEmailValid = validateEmailField(emailInput, emailError);
            const arePermissionsValid = validatePermissionsField();

            if (!arePermissionsValid) {
                highlightPermissionsError();
                return;
            }

            if (!isNameValid || !isLastNameValid || !isEmailValid) {
                return;
            }

            const submitBtn = document.getElementById('aaa-add-admin-btn');
            const originalBtnText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                                    <span class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-solid border-white border-r-transparent"></span>
                                    Adding...
                                `;

            try {
                const formData = new FormData(this);

                // Convert permissions to comma-separated string
                const selectedPermissions = Array.from(permissionCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
                formData.set('permissions', selectedPermissions.join(', '));

                const response = await fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                    },
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    throw {
                        message: data.message || 'Failed to add admin',
                        errors: data.errors || null
                    };
                }

                // On success
                addAdminPopup.style.display = 'none';
                successModal.style.display = 'flex';
                setTimeout(() => window.location.reload(), 1500);

            } catch (error) {
                console.error('Submission error:', error);

                // Handle validation errors
                if (error.errors) {
                    if (error.errors.first_name) {
                        firstNameError.textContent = error.errors.first_name[0];
                        firstNameError.classList.remove('hidden');
                    }
                    if (error.errors.last_name) {
                        lastNameError.textContent = error.errors.last_name[0];
                        lastNameError.classList.remove('hidden');
                    }
                    if (error.errors.email) {
                        emailError.textContent = error.errors.email[0];
                        emailError.classList.remove('hidden');
                    }
                    if (error.errors.permissions) {
                        permissionsError.textContent = error.errors.permissions[0];
                        permissionsError.classList.remove('hidden');
                    }
                } else {
                    errorModal.style.display = 'flex';
                    errorMessage.textContent = error.message || 'An unexpected error occurred';
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });

        function clearAllErrors() {
            firstNameError.classList.add('hidden');
            lastNameError.classList.add('hidden');
            emailError.classList.add('hidden');
            permissionsError.classList.add('hidden');
        }

        // Close popup handlers
        function closePopup() {
            addAdminPopup.style.display = 'none';
        }

        closeBtn.addEventListener('click', closePopup);
        cancelBtn.addEventListener('click', closePopup);
    });
</script>
