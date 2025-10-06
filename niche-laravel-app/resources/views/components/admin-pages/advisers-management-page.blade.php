<!-- Advisers Management -->
<main id="advisers-management-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    @if (auth()->user() && auth()->user()->hasPermission('modify-advisers-list'))
        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full">
                <div class="mb-5 flex w-full items-center justify-between">
                    <h1 class="text-2xl font-bold text-[#575757]">Advisers Management</h1>
                    <div class="flex flex-wrap justify-end gap-1 sm:gap-2">
                        <!-- Add Adviser Button -->
                        <button id="add-adviser-btn"
                            class="w-full max-w-[150px] cursor-pointer rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                            Add
                        </button>
                    </div>
                </div>

                <!-- Responsive Actions Wrapper -->
                <div class="flex flex-col gap-2 sm:flex-row sm:justify-between sm:gap-4">
                    <input type="text" id="advisers-search" name="advisers-search" placeholder="Search advisers..."
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] placeholder-gray-400 focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-[300px] md:w-[400px]" />
                    <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                        <!-- Program Filter Dropdown -->
                        <div class="relative w-fit">
                            <select name="advisers-dd-program" id="advisers-program-filter"
                                class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                                <option value="">All Programs</option>
                            </select>
                            <div
                                class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Adviser Form -->
        <div id="add-adviser-form-container" class="mb-6 hidden">
            <form id="create-adviser-form" class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                <input type="text" name="name" placeholder="Adviser name"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2" />
                <div class="relative w-full sm:w-fit">
                    <select name="program_id" id="adviser-program-select"
                        class="w-full appearance-none rounded-lg border border-gray-300 px-4 py-2 pr-10"></select>
                    <div class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="flex-1 rounded-lg bg-gradient-to-r from-[#4CAF50] to-[#2E7D32] px-4 py-2 text-white shadow hover:brightness-110">Add
                        Adviser</button>
                    <button type="button" id="cancel-add-adviser"
                        class="flex-1 rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-white shadow hover:brightness-110">Cancel</button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Program</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Action</th>
                    </tr>
                </thead>
                <tbody id="advisers-table-body" class="divide-y divide-gray-200 bg-[#fdfdfd] text-[#575757]">
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div id="pagination-controls-advisers" class="mt-4 flex justify-end space-x-2">
            <button onclick="changePage('advisers', -1)"
                class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
            <span id="pagination-info-advisers" class="px-3 py-1 text-[#575757]">Page 1</span>
            <button onclick="changePage('advisers', 1)"
                class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
        </div>

        <!-- Universal Modals -->
        <x-popups.universal-ok-m />
        <x-popups.universal-x-m />
        <x-popups.universal-option-m />
    @else
        <p class="text-red-600">You don't have permission to modify advisers.</p>
    @endif
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pageContainer = document.getElementById('advisers-management-page');
        const tbody = document.getElementById('advisers-table-body');
        const programSelect = document.getElementById('adviser-program-select');
        const searchInput = document.getElementById('advisers-search');
        const programFilter = document.getElementById('advisers-program-filter');
        const addAdviserBtn = document.getElementById('add-adviser-btn');
        const addAdviserFormContainer = document.getElementById('add-adviser-form-container');
        const cancelAddAdviserBtn = document.getElementById('cancel-add-adviser');

        if (!tbody) return;

        let allAdvisers = [];
        let allPrograms = [];

        // Pagination variables and functions
        const rowsPerPage = 18;
        const currentPages = {};

        function showPage(tableKey, page) {
            const tbody = document.getElementById(`${tableKey}-table-body`);
            const rows = tbody?.querySelectorAll('tr') || [];
            const totalPages = Math.ceil(rows.length / rowsPerPage);
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;
            currentPages[tableKey] = page;

            rows.forEach((row, i) => {
                row.style.display = (i >= (page - 1) * rowsPerPage && i < page * rowsPerPage) ? '' :
                    'none';
            });

            const info = document.getElementById(`pagination-info-${tableKey}`);
            if (info) info.textContent = `Page ${page} of ${totalPages}`;
        }

        function changePage(tableKey, offset) {
            const current = currentPages[tableKey] || 1;
            showPage(tableKey, current + offset);
        }

        // Input sanitization helpers (restrict risky inputs at source)
        function sanitizeAdviserName(value) {
            // Allow letters, numbers, spaces, hyphen, apostrophe, period
            return value
                .replace(/<|>|javascript:|on\w+=/gi, '')
                .replace(/[^A-Za-z0-9 .\-']/g, '')
                .replace(/\s{2,}/g, ' ')
                .trimStart();
        }

        function attachSanitizers() {
            const nameInput = document.querySelector('#create-adviser-form input[name="name"]');
            if (nameInput) {
                nameInput.addEventListener('input', (e) => {
                    const clean = sanitizeAdviserName(e.target.value).substring(0, 100);
                    if (e.target.value !== clean) e.target.value = clean;
                });
                nameInput.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const paste = (e.clipboardData || window.clipboardData).getData('text');
                    const cleanPaste = sanitizeAdviserName(paste).substring(0, 100);
                    const el = e.target;
                    const start = el.selectionStart;
                    const end = el.selectionEnd;
                    const newValue = (el.value.substring(0, start) + cleanPaste + el.value.substring(
                        end)).substring(0, 100);
                    el.value = newValue;
                    el.dispatchEvent(new Event('input'));
                });
            }
        }

        function loadProgramsForSelect() {
            console.log('Loading programs for select...');
            return fetch('/admin/programs', {
                    method: 'GET',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(r => {
                    console.log('Programs for select response status:', r.status);
                    if (r.ok) {
                        return r.json();
                    } else {
                        throw new Error(`HTTP error! status: ${r.status}`);
                    }
                })
                .then(list => {
                    console.log('Programs for select loaded:', list);
                    allPrograms = list;
                    programSelect.innerHTML = list.map(p => `<option value="${p.id}">${p.name}</option>`)
                        .join('');
                    programFilter.innerHTML = '<option value="">All Programs</option>' +
                        list.map(p => `<option value="${p.id}">${p.name}</option>`).join('');
                })
                .catch(error => {
                    console.error('Error loading programs for select:', error);
                    showError('Failed to load programs. Please refresh the page.');
                });
        }

        function loadAdvisers() {
            console.log('Loading advisers...');
            fetch('/admin/advisers', {
                    method: 'GET',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(r => {
                    console.log('Advisers response status:', r.status);
                    if (r.ok) {
                        return r.json();
                    } else {
                        throw new Error(`HTTP error! status: ${r.status}`);
                    }
                })
                .then(list => {
                    console.log('Advisers loaded:', list);
                    allAdvisers = list;
                    displayAdvisers(list);
                })
                .catch(error => {
                    console.error('Error loading advisers:', error);
                    showError('Failed to load advisers. Please refresh the page.');
                });
        }

        function displayAdvisers(advisers) {
            tbody.innerHTML = '';
            advisers.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="px-2 py-3 sm:px-6">
                        <input class="w-full min-w-0 rounded border px-2 py-1 text-xs sm:text-sm" value="${item.name}" data-field="name" data-id="${item.id}">
                        </td>
                    <td class="px-2 py-3 sm:px-6">
                        <div class="relative w-fit">
                            <select class="w-full min-w-0 appearance-none rounded border px-2 py-1 pr-8 text-xs sm:text-sm" data-field="program_id" data-id="${item.id}">
                            </select>
                            <div class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 transform text-[#575757]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        </td>
                    <td class="px-2 py-3 whitespace-nowrap sm:px-6">
                        <button class="update-adviser text-green-700 hover:underline hover:cursor-pointer text-xs sm:text-sm" data-id="${item.id}">Update</button>
                        <button class="delete-adviser ml-1 sm:ml-3 text-red-600 hover:underline hover:cursor-pointer text-xs sm:text-sm" data-id="${item.id}" data-name="${item.name}">Delete</button>
                        </td>`;
                tbody.appendChild(tr);

                // populate the program select for this row
                const sel = tr.querySelector('select[data-id="' + item.id +
                    '"][data-field="program_id"]');
                sel.innerHTML = allPrograms.map(p =>
                    `<option value="${p.id}" ${p.id===item.program_id?'selected':''}>${p.name}</option>`
                ).join('');
            });

            // Show first page after displaying advisers
            showPage('advisers', 1);
        }

        // Delegate sanitization for inline edits
        tbody.addEventListener('input', (e) => {
            const target = e.target;
            if (target && target.matches('input[data-field="name"]')) {
                const clean = sanitizeAdviserName(target.value).substring(0, 100);
                if (target.value !== clean) target.value = clean;
            }
        });

        tbody.addEventListener('paste', (e) => {
            const target = e.target;
            if (target && target.matches('input[data-field="name"]')) {
                e.preventDefault();
                const paste = (e.clipboardData || window.clipboardData).getData('text');
                const cleanPaste = sanitizeAdviserName(paste).substring(0, 100);
                const start = target.selectionStart;
                const end = target.selectionEnd;
                const newValue = (target.value.substring(0, start) + cleanPaste + target.value
                    .substring(end)).substring(0, 100);
                target.value = newValue;
                target.dispatchEvent(new Event('input'));
            }
        });

        function filterAdvisers() {
            const searchTerm = searchInput.value.toLowerCase();
            const programFilterValue = programFilter.value;

            let filtered = allAdvisers.filter(adviser => {
                const matchesSearch = adviser.name.toLowerCase().includes(searchTerm);
                const matchesProgram = !programFilterValue || adviser.program_id == programFilterValue;
                return matchesSearch && matchesProgram;
            });

            displayAdvisers(filtered);
        }

        // Search functionality
        searchInput.addEventListener('input', filterAdvisers);
        programFilter.addEventListener('change', filterAdvisers);

        // Helper functions for universal modals
        function showSuccess(message) {
            console.log('Showing success modal:', message);
            const okTop = pageContainer.querySelector('#OKtopText');
            const okSub = pageContainer.querySelector('#OKsubText');
            const okPopup = pageContainer.querySelector('#universal-ok-popup');
            if (okTop) okTop.textContent = "Success!";
            if (okSub) okSub.textContent = message;
            if (okPopup) okPopup.style.display = 'flex';
        }

        function showError(message) {
            console.log('Showing error modal:', message);
            const xTop = pageContainer.querySelector('#x-topText');
            const xSub = pageContainer.querySelector('#x-subText');
            const xPopup = pageContainer.querySelector('#universal-x-popup');
            if (xTop) xTop.textContent = "Error!";
            if (xSub) xSub.textContent = message;
            if (xPopup) xPopup.style.display = 'flex';
        }

        function showConfirm(title, message, onConfirm) {
            const optTop = pageContainer.querySelector('#opt-topText');
            const optSub = pageContainer.querySelector('#opt-subText');
            const optPopup = pageContainer.querySelector('#universal-option-popup');
            if (optTop) optTop.textContent = title;
            if (optSub) optSub.textContent = message;
            if (optPopup) optPopup.style.display = 'flex';

            // Remove existing listeners
            const confirmBtn = pageContainer.querySelector('#uniOpt-confirm-btn');
            if (!confirmBtn) return;
            const newConfirmBtn = confirmBtn.cloneNode(true);
            confirmBtn.parentNode.replaceChild(newConfirmBtn, confirmBtn);

            // Add new listener
            newConfirmBtn.addEventListener('click', () => {
                const popup = pageContainer.querySelector('#universal-option-popup');
                if (popup) popup.style.display = 'none';
                onConfirm();
            });
        }

        // Add Adviser button toggle
        addAdviserBtn.addEventListener('click', () => {
            addAdviserFormContainer.classList.toggle('hidden');
            if (!addAdviserFormContainer.classList.contains('hidden')) {
                addAdviserFormContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });

        cancelAddAdviserBtn.addEventListener('click', () => {
            addAdviserFormContainer.classList.add('hidden');
            document.getElementById('create-adviser-form').reset();
        });

        // Duplication check function
        function checkDuplicateAdviser(name, program_id) {
            const trimmedName = name.trim().toLowerCase();
            const exactDuplicate = allAdvisers.some(adviser =>
                adviser.name.toLowerCase() === trimmedName && adviser.program_id == program_id
            );
            const crossProgramDuplicate = allAdvisers.some(adviser =>
                adviser.name.toLowerCase() === trimmedName && adviser.program_id != program_id
            );

            console.log('Checking duplicate adviser:', {
                name: trimmedName,
                program_id,
                exactDuplicate,
                crossProgramDuplicate,
                allAdvisers
            });

            return {
                exact: exactDuplicate,
                crossProgram: crossProgramDuplicate,
                hasAny: exactDuplicate || crossProgramDuplicate
            };
        }

        document.getElementById('create-adviser-form').addEventListener('submit', e => {
            e.preventDefault();
            console.log('Adviser form submission started');
            const form = e.target;
            const formData = new FormData(form);
            const name = sanitizeAdviserName(formData.get('name') || '').trim();
            const program_id = formData.get('program_id');

            console.log('Adviser form data:', {
                name,
                program_id
            });

            if (!name || !program_id) {
                console.log('Missing required fields for adviser');
                showError('Please fill in all required fields.');
                return;
            }

            // Check for duplicates
            const duplicateCheck = checkDuplicateAdviser(name, program_id);
            if (duplicateCheck.exact) {
                console.log('Exact duplicate adviser found, stopping submission');
                const programName = document.querySelector(
                    `select[name="program_id"] option[value="${program_id}"]`)?.text;
                showError(
                    `An adviser with the name "${name}" already exists in the "${programName}" program.`
                );
                return;
            }

            if (duplicateCheck.crossProgram) {
                console.log('Cross-program duplicate adviser found, showing error');
                const programName = document.querySelector(
                    `select[name="program_id"] option[value="${program_id}"]`)?.text;
                showError(
                    `An adviser named "${name}" already exists in a different program.`
                );
                return;
            }

            console.log('No duplicate adviser found, proceeding with submission');
            submitAdviserForm(form, formData);
        });

        // Separate function for adviser form submission
        function submitAdviserForm(form, formData) {
            console.log('submitAdviserForm called with formData:', formData);
            const body = new URLSearchParams(formData);
            console.log('Request body:', body.toString());
            fetch('/admin/advisers', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .content,
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body
            }).then(async r => {
                console.log('Adviser API Response status:', r.status);

                if (r.ok) {
                    try {
                        const responseData = await r.json();
                        console.log('Adviser API Response data:', responseData);
                        showSuccess('Adviser added successfully!');
                        loadAdvisers();
                        form.reset();
                        addAdviserFormContainer.classList.add('hidden');
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        showSuccess('Adviser added successfully!');
                        loadAdvisers();
                        form.reset();
                        addAdviserFormContainer.classList.add('hidden');
                    }
                } else {
                    try {
                        const responseData = await r.json();
                        const errorMessage = responseData?.message ||
                            'Failed to add adviser. Please try again.';
                        showError(errorMessage);
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        showError('Failed to add adviser. Please try again.');
                    }
                }
            }).catch(error => {
                console.error('Network Error:', error);
                showError('Network error. Please check your connection and try again.');
            });
        }

        // Universal modal close handlers
        const okBtn = pageContainer.querySelector('#uniOK-confirm-btn');
        if (okBtn) okBtn.addEventListener('click', () => {
            const popup = pageContainer.querySelector('#universal-ok-popup');
            if (popup) popup.style.display = 'none';
        });

        const xBtn = pageContainer.querySelector('#uniX-confirm-btn');
        if (xBtn) xBtn.addEventListener('click', () => {
            const popup = pageContainer.querySelector('#universal-x-popup');
            if (popup) popup.style.display = 'none';
        });

        const optCancelBtn = pageContainer.querySelector('#uniOpt-cancel-btn');
        if (optCancelBtn) optCancelBtn.addEventListener('click', () => {
            const popup = pageContainer.querySelector('#universal-option-popup');
            if (popup) popup.style.display = 'none';
        });

        // Table row click handlers
        tbody.addEventListener('click', e => {
            const delBtn = e.target.closest('.delete-adviser');
            const updBtn = e.target.closest('.update-adviser');

            if (delBtn) {
                const id = delBtn.dataset.id;
                const name = delBtn.dataset.name;

                showConfirm(
                    'Delete Adviser',
                    `Are you sure you want to delete "${name}"? This action cannot be undone.`,
                    () => {
                        console.log('Deleting adviser with ID:', id);
                        fetch(`/admin/advisers/${id}`, {
                            method: 'DELETE',
                            credentials: 'same-origin',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }).then(async r => {
                            console.log('Delete response status:', r.status);

                            if (r.ok) {
                                try {
                                    const responseData = await r.json();
                                    console.log('Delete response data:', responseData);
                                    showSuccess('Adviser deleted successfully!');
                                    loadAdvisers();
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showSuccess('Adviser deleted successfully!');
                                    loadAdvisers();
                                }
                            } else {
                                try {
                                    const responseData = await r.json();
                                    const errorMessage = responseData?.message ||
                                        'Failed to delete adviser. Please try again.';
                                    showError(errorMessage);
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showError(
                                        'Failed to delete adviser. Please try again.'
                                    );
                                }
                            }
                        }).catch(error => {
                            console.error('Network error:', error);
                            showError(
                                'Network error. Please check your connection and try again.'
                            );
                        });
                    }
                );
            }

            if (updBtn) {
                const id = updBtn.dataset.id;
                const name = sanitizeAdviserName(
                    tbody.querySelector(`input[data-id="${id}"][data-field="name"]`)?.value || ''
                ).trim();
                const program_id = tbody.querySelector(
                    `select[data-id="${id}"][data-field="program_id"]`)?.value;
                const programName = tbody.querySelector(
                    `select[data-id="${id}"][data-field="program_id"]`)?.selectedOptions[0]?.text;

                if (!name) {
                    showError('Adviser name cannot be empty');
                    return;
                }

                showConfirm(
                    'Update Adviser',
                    `Are you sure you want to update this adviser to "${name}" (${programName})?`,
                    () => {
                        // Check if any changes were made
                        const originalAdviser = allAdvisers.find(a => a.id == id);
                        if (originalAdviser && originalAdviser.name === name && originalAdviser
                            .program_id == program_id) {
                            showError('No changes detected.');
                            return; // Do nothing if no changes
                        }

                        const body = new URLSearchParams({
                            name,
                            program_id
                        });
                        console.log('Adviser update data:', {
                            id,
                            name,
                            program_id,
                            body: body.toString()
                        });
                        fetch(`/admin/advisers/${id}`, {
                            method: 'PUT',
                            credentials: 'same-origin',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .content,
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body
                        }).then(async r => {
                            console.log('Adviser update response status:', r.status);
                            console.log('Adviser update response ok:', r.ok);

                            if (r.ok) {
                                try {
                                    const responseData = await r.json();
                                    console.log('Adviser update response data:',
                                        responseData);
                                    showSuccess('Adviser updated successfully!');
                                    loadAdvisers();
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showSuccess('Adviser updated successfully!');
                                    loadAdvisers();
                                }
                            } else {
                                try {
                                    const responseData = await r.json();
                                    const errorMessage = responseData?.message ||
                                        'Failed to update adviser. Please try again.';
                                    showError(errorMessage);
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showError(
                                        'Failed to update adviser. Please try again.'
                                    );
                                }
                            }
                        }).catch(error => {
                            console.error('Network error:', error);
                            showError(
                                'Network error. Please check your connection and try again.'
                            );
                        });
                    }
                );
            }
        });

        Promise.all([loadProgramsForSelect()]).then(loadAdvisers);
        attachSanitizers();
    });
</script>
