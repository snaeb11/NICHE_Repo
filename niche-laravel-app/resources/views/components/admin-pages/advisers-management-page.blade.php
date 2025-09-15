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
                        <select name="advisers-dd-program" id="advisers-program-filter"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                            <option value="">All Programs</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Adviser Form -->
        <div id="add-adviser-form-container" class="mb-6 hidden">
            <form id="create-adviser-form" class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                <input type="text" name="name" placeholder="Adviser name"
                    class="rounded-lg border border-gray-300 px-4 py-2" />
                <select name="program_id" id="adviser-program-select"
                    class="rounded-lg border border-gray-300 px-4 py-2"></select>
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

        function loadProgramsForSelect() {
            return fetch('/admin/programs').then(r => r.json()).then(list => {
                allPrograms = list;
                programSelect.innerHTML = list.map(p => `<option value="${p.id}">${p.name}</option>`)
                    .join('');
                programFilter.innerHTML = '<option value="">All Programs</option>' +
                    list.map(p => `<option value="${p.id}">${p.name}</option>`).join('');
            });
        }

        function loadAdvisers() {
            fetch('/admin/advisers').then(r => r.json()).then(list => {
                allAdvisers = list;
                displayAdvisers(list);
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
                        <select class="w-full min-w-0 rounded border px-2 py-1 text-xs sm:text-sm" data-field="program_id" data-id="${item.id}"></select>
                        </td>
                    <td class="px-2 py-3 whitespace-nowrap sm:px-6">
                        <button class="update-adviser text-blue-600 hover:underline text-xs sm:text-sm" data-id="${item.id}">Update</button>
                        <button class="delete-adviser ml-1 sm:ml-3 text-red-600 hover:underline text-xs sm:text-sm" data-id="${item.id}" data-name="${item.name}">Delete</button>
                        </td>`;
                tbody.appendChild(tr);

                // populate the program select for this row
                const sel = tr.querySelector('select[data-id="' + item.id +
                    '"][data-field="program_id"]');
                sel.innerHTML = allPrograms.map(p =>
                    `<option value="${p.id}" ${p.id===item.program_id?'selected':''}>${p.name}</option>`
                ).join('');
            });
        }

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
            document.getElementById('OKtopText').textContent = "Success!";
            document.getElementById('OKsubText').textContent = message;
            document.getElementById('universal-ok-popup').style.display = 'flex';
        }

        function showError(message) {
            document.getElementById('x-topText').textContent = "Error!";
            document.getElementById('x-subText').textContent = message;
            document.getElementById('universal-x-popup').style.display = 'flex';
        }

        function showConfirm(title, message, onConfirm) {
            document.getElementById('opt-topText').textContent = title;
            document.getElementById('opt-subText').textContent = message;
            document.getElementById('universal-option-popup').style.display = 'flex';

            // Remove existing listeners
            const confirmBtn = document.getElementById('uniOpt-confirm-btn');
            const newConfirmBtn = confirmBtn.cloneNode(true);
            confirmBtn.parentNode.replaceChild(newConfirmBtn, confirmBtn);

            // Add new listener
            newConfirmBtn.addEventListener('click', () => {
                document.getElementById('universal-option-popup').style.display = 'none';
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
            const name = formData.get('name').trim();
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
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .content
                },
                body
            }).then(async r => {
                console.log('Adviser API Response status:', r.status);
                const responseData = await r.json().catch(() => null);
                console.log('Adviser API Response data:', responseData);

                if (r.ok) {
                    // Check if the response indicates actual success (even for cross-program confirmed)
                    if (responseData && responseData.success !== false && responseData.error !==
                        true) {
                        showSuccess('Adviser added successfully!');
                        loadAdvisers();
                        form.reset();
                        addAdviserFormContainer.classList.add('hidden');
                    } else {
                        // Even for cross-program confirmed, if backend says it failed, show error
                        const errorMessage = responseData?.message ||
                            'Failed to add adviser. Please try again.';
                        showError(errorMessage);
                    }
                } else {
                    const errorMessage = responseData?.message ||
                        'Failed to add adviser. Please try again.';
                    showError(errorMessage);
                }
            }).catch(error => {
                console.error('Adviser API Error:', error);
                showError('Failed to add adviser. Please try again.');
            });
        }

        // Universal modal close handlers
        document.getElementById('uniOK-confirm-btn').addEventListener('click', () => {
            document.getElementById('universal-ok-popup').style.display = 'none';
        });

        document.getElementById('uniX-confirm-btn').addEventListener('click', () => {
            document.getElementById('universal-x-popup').style.display = 'none';
        });

        document.getElementById('uniOpt-cancel-btn').addEventListener('click', () => {
            document.getElementById('universal-option-popup').style.display = 'none';
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
                        fetch(`/admin/advisers/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            }
                        }).then(r => {
                            if (r.ok) {
                                showSuccess('Adviser deleted successfully!');
                                loadAdvisers();
                            } else {
                                showError('Failed to delete adviser. Please try again.');
                            }
                        }).catch(() => {
                            showError('Failed to delete adviser. Please try again.');
                        });
                    }
                );
            }

            if (updBtn) {
                const id = updBtn.dataset.id;
                const name = tbody.querySelector(`input[data-id="${id}"][data-field="name"]`)?.value
                    .trim();
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
                            return; // Do nothing if no changes
                        }

                        const body = new URLSearchParams({
                            name,
                            program_id
                        });
                        fetch(`/admin/advisers/${id}`, {
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .content
                            },
                            body
                        }).then(r => {
                            if (r.ok) {
                                showSuccess('Adviser updated successfully!');
                                loadAdvisers();
                            } else {
                                showError('Failed to update adviser. Please try again.');
                            }
                        }).catch(() => {
                            showError('Failed to update adviser. Please try again.');
                        });
                    }
                );
            }
        });

        Promise.all([loadProgramsForSelect()]).then(loadAdvisers);
    });
</script>
