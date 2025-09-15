<!-- Programs Management -->
<main id="programs-management-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    @if (auth()->user() && auth()->user()->hasPermission('modify-programs-list'))
        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full">
                <div class="mb-5 flex w-full items-center justify-between">
                    <h1 class="text-2xl font-bold text-[#575757]">Programs Management</h1>
                    <div class="flex flex-wrap justify-end gap-1 sm:gap-2">
                        <!-- Add Program Button -->
                        <button id="add-program-btn"
                            class="w-full max-w-[150px] cursor-pointer rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                            Add
                        </button>
                    </div>
                </div>

                <!-- Responsive Actions Wrapper -->
                <div class="flex flex-col gap-2 sm:flex-row sm:justify-between sm:gap-4">
                    <input type="text" id="programs-search" name="programs-search" placeholder="Search programs..."
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] placeholder-gray-400 focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-[300px] md:w-[400px]" />
                    <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                        <!-- Degree Filter Dropdown -->
                        <select name="programs-dd-degree" id="programs-degree-filter"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                            <option value="">All Degrees</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Graduate">Graduate</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Program Form -->
        <div id="add-program-form-container" class="mb-6 hidden">
            <form id="create-program-form" class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                <input type="text" name="name" placeholder="Program name (e.g., BSIT)"
                    class="rounded-lg border border-gray-300 px-4 py-2" />
                <select name="degree" class="rounded-lg border border-gray-300 px-4 py-2">
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Graduate">Graduate</option>
                </select>
                <div class="flex gap-2">
                    <button type="submit"
                        class="flex-1 rounded-lg bg-gradient-to-r from-[#4CAF50] to-[#2E7D32] px-4 py-2 text-white shadow hover:brightness-110">Add
                        Program</button>
                    <button type="button" id="cancel-add-program"
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
                            Degree</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Action</th>
                    </tr>
                </thead>
                <tbody id="programs-table-body" class="divide-y divide-gray-200 bg-[#fdfdfd] text-[#575757]">
                </tbody>
            </table>
        </div>

        <!-- Universal Modals -->
        <x-popups.universal-ok-m />
        <x-popups.universal-x-m />
        <x-popups.universal-option-m />
    @else
        <p class="text-red-600">You don't have permission to modify programs.</p>
    @endif
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('programs-table-body');
        const searchInput = document.getElementById('programs-search');
        const degreeFilter = document.getElementById('programs-degree-filter');
        const addProgramBtn = document.getElementById('add-program-btn');
        const addProgramFormContainer = document.getElementById('add-program-form-container');
        const cancelAddProgramBtn = document.getElementById('cancel-add-program');

        if (!tbody) return;

        let allPrograms = [];

        // Input sanitization helpers (restrict risky inputs at source)
        function sanitizeProgramName(value) {
            // Allow letters, numbers, spaces, hyphen, ampersand, slash, parentheses, and period
            return value
                .replace(/<|>|javascript:|on\w+=/gi, '')
                .replace(/[^A-Za-z0-9 \-&\/().]/g, '')
                .replace(/\s{2,}/g, ' ')
                .trimStart();
        }

        function attachSanitizers() {
            const nameInput = document.querySelector('#create-program-form input[name="name"]');
            if (nameInput) {
                nameInput.addEventListener('input', (e) => {
                    const clean = sanitizeProgramName(e.target.value).substring(0, 100);
                    if (e.target.value !== clean) e.target.value = clean;
                });
                nameInput.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const paste = (e.clipboardData || window.clipboardData).getData('text');
                    const cleanPaste = sanitizeProgramName(paste).substring(0, 100);
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

        function loadPrograms() {
            console.log('Loading programs...');
            fetch('/admin/programs', {
                    method: 'GET',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(r => {
                    console.log('Programs response status:', r.status);
                    if (r.ok) {
                        return r.json();
                    } else {
                        throw new Error(`HTTP error! status: ${r.status}`);
                    }
                })
                .then(list => {
                    console.log('Programs loaded:', list);
                    allPrograms = list;
                    displayPrograms(list);
                })
                .catch(error => {
                    console.error('Error loading programs:', error);
                    showError('Failed to load programs. Please refresh the page.');
                });
        }

        function displayPrograms(programs) {
            tbody.innerHTML = '';
            programs.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="px-2 py-3 sm:px-6">
                        <input class="w-full min-w-0 rounded border px-2 py-1 text-xs sm:text-sm" value="${item.name}" data-field="name" data-id="${item.id}">
                        </td>
                    <td class="px-2 py-3 sm:px-6">
                        <select class="w-full min-w-0 rounded border px-2 py-1 text-xs sm:text-sm" data-field="degree" data-id="${item.id}">
                                <option ${item.degree==='Undergraduate'?'selected':''}>Undergraduate</option>
                                <option ${item.degree==='Graduate'?'selected':''}>Graduate</option>
                            </select>
                        </td>
                    <td class="px-2 py-3 whitespace-nowrap sm:px-6">
                        <button class="update-program text-blue-600 hover:underline text-xs sm:text-sm" data-id="${item.id}">Update</button>
                        <button class="delete-program ml-1 sm:ml-3 text-red-600 hover:underline text-xs sm:text-sm" data-id="${item.id}" data-name="${item.name}">Delete</button>
                        </td>`;
                tbody.appendChild(tr);
            });
        }

        // Delegate sanitization for inline edits
        tbody.addEventListener('input', (e) => {
            const target = e.target;
            if (target && target.matches('input[data-field="name"]')) {
                const clean = sanitizeProgramName(target.value).substring(0, 100);
                if (target.value !== clean) target.value = clean;
            }
        });

        tbody.addEventListener('paste', (e) => {
            const target = e.target;
            if (target && target.matches('input[data-field="name"]')) {
                e.preventDefault();
                const paste = (e.clipboardData || window.clipboardData).getData('text');
                const cleanPaste = sanitizeProgramName(paste).substring(0, 100);
                const start = target.selectionStart;
                const end = target.selectionEnd;
                const newValue = (target.value.substring(0, start) + cleanPaste + target.value
                    .substring(end)).substring(0, 100);
                target.value = newValue;
                target.dispatchEvent(new Event('input'));
            }
        });

        function filterPrograms() {
            const searchTerm = searchInput.value.toLowerCase();
            const degreeFilterValue = degreeFilter.value;

            let filtered = allPrograms.filter(program => {
                const matchesSearch = program.name.toLowerCase().includes(searchTerm);
                const matchesDegree = !degreeFilterValue || program.degree === degreeFilterValue;
                return matchesSearch && matchesDegree;
            });

            displayPrograms(filtered);
        }

        // Search functionality
        searchInput.addEventListener('input', filterPrograms);
        degreeFilter.addEventListener('change', filterPrograms);

        // Helper functions for universal modals
        function showSuccess(message) {
            console.log('Showing success modal:', message);
            document.getElementById('OKtopText').textContent = "Success!";
            document.getElementById('OKsubText').textContent = message;
            document.getElementById('universal-ok-popup').style.display = 'flex';
        }

        function showError(message) {
            console.log('Showing error modal:', message);
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

        // Add Program button toggle
        addProgramBtn.addEventListener('click', () => {
            addProgramFormContainer.classList.toggle('hidden');
            if (!addProgramFormContainer.classList.contains('hidden')) {
                addProgramFormContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });

        cancelAddProgramBtn.addEventListener('click', () => {
            addProgramFormContainer.classList.add('hidden');
            document.getElementById('create-program-form').reset();
        });

        // Duplication check function
        function checkDuplicateProgram(name, degree) {
            const trimmedName = name.trim().toLowerCase();
            const exactDuplicate = allPrograms.some(program =>
                program.name.toLowerCase() === trimmedName && program.degree === degree
            );
            const crossDegreeDuplicate = allPrograms.some(program =>
                program.name.toLowerCase() === trimmedName && program.degree !== degree
            );

            console.log('Checking duplicate:', {
                name: trimmedName,
                degree,
                exactDuplicate,
                crossDegreeDuplicate,
                allPrograms
            });

            return {
                exact: exactDuplicate,
                crossDegree: crossDegreeDuplicate,
                hasAny: exactDuplicate || crossDegreeDuplicate
            };
        }

        document.getElementById('create-program-form').addEventListener('submit', e => {
            e.preventDefault();
            console.log('Form submission started');
            const form = e.target;
            const formData = new FormData(form);
            const name = sanitizeProgramName(formData.get('name') || '').trim();
            const degree = formData.get('degree');

            console.log('Form data:', {
                name,
                degree
            });

            if (!name || !degree) {
                console.log('Missing required fields');
                showError('Please fill in all required fields.');
                return;
            }

            // Check for duplicates
            const duplicateCheck = checkDuplicateProgram(name, degree);
            if (duplicateCheck.exact) {
                console.log('Exact duplicate found, stopping submission');
                showError(`A program with the name "${name}" and degree "${degree}" already exists.`);
                return;
            }

            if (duplicateCheck.crossDegree) {
                console.log('Cross-degree duplicate found, showing error');
                showError(
                    `A program named "${name}" already exists in a different degree.`
                );
                return;
            }

            console.log('No duplicate found, proceeding with submission');
            submitProgramForm(form, formData);
        });

        // Separate function for form submission
        function submitProgramForm(form, formData) {
            console.log('submitProgramForm called with formData:', formData);
            const body = new URLSearchParams(formData);
            console.log('Request body:', body.toString());
            fetch('/admin/programs', {
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
                console.log('API Response status:', r.status);

                if (r.ok) {
                    try {
                        const responseData = await r.json();
                        console.log('API Response data:', responseData);
                        showSuccess('Program added successfully!');
                        loadPrograms();
                        form.reset();
                        addProgramFormContainer.classList.add('hidden');
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        showSuccess('Program added successfully!');
                        loadPrograms();
                        form.reset();
                        addProgramFormContainer.classList.add('hidden');
                    }
                } else {
                    try {
                        const responseData = await r.json();
                        const errorMessage = responseData?.message ||
                            'Failed to add program. Please try again.';
                        showError(errorMessage);
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        showError('Failed to add program. Please try again.');
                    }
                }
            }).catch(error => {
                console.error('Network Error:', error);
                showError('Network error. Please check your connection and try again.');
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
            const delBtn = e.target.closest('.delete-program');
            const updBtn = e.target.closest('.update-program');

            if (delBtn) {
                const id = delBtn.dataset.id;
                const name = delBtn.dataset.name;

                showConfirm(
                    'Delete Program',
                    `Are you sure you want to delete "${name}"? This action cannot be undone.`,
                    () => {
                        console.log('Deleting program with ID:', id);
                        fetch(`/admin/programs/${id}`, {
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
                                    showSuccess('Program deleted successfully!');
                                    loadPrograms();
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showSuccess('Program deleted successfully!');
                                    loadPrograms();
                                }
                            } else {
                                try {
                                    const responseData = await r.json();
                                    const errorMessage = responseData?.message ||
                                        'Failed to delete program. Please try again.';
                                    showError(errorMessage);
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showError(
                                        'Failed to delete program. Please try again.'
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
                const name = sanitizeProgramName(
                    tbody.querySelector(`input[data-id="${id}"][data-field="name"]`)?.value || ''
                ).trim();
                const degree = tbody.querySelector(`select[data-id="${id}"][data-field="degree"]`)
                    ?.value;

                if (!name) {
                    showError('Program name cannot be empty');
                    return;
                }

                showConfirm(
                    'Update Program',
                    `Are you sure you want to update this program to "${name}" (${degree})?`,
                    () => {
                        // Check if any changes were made
                        const originalProgram = allPrograms.find(p => p.id == id);
                        if (originalProgram && originalProgram.name === name && originalProgram
                            .degree === degree) {
                            showError('No changes detected.');
                            return; // Do nothing if no changes
                        }

                        const body = new URLSearchParams({
                            name,
                            degree
                        });
                        console.log('Program update data:', {
                            id,
                            name,
                            degree,
                            body: body.toString()
                        });
                        fetch(`/admin/programs/${id}`, {
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
                            console.log('Program update response status:', r.status);
                            console.log('Program update response ok:', r.ok);

                            if (r.ok) {
                                try {
                                    const responseData = await r.json();
                                    console.log('Program update response data:',
                                        responseData);
                                    showSuccess('Program updated successfully!');
                                    loadPrograms();
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showSuccess('Program updated successfully!');
                                    loadPrograms();
                                }
                            } else {
                                try {
                                    const responseData = await r.json();
                                    const errorMessage = responseData?.message ||
                                        'Failed to update program. Please try again.';
                                    showError(errorMessage);
                                } catch (jsonError) {
                                    console.error('JSON parse error:', jsonError);
                                    showError(
                                        'Failed to update program. Please try again.'
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

        loadPrograms();
        attachSanitizers();
    });
</script>
