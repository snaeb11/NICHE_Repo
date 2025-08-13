@extends('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd] text-gray-900'])
@section('title', 'Dashboard')

@section('childContent')
    <x-layout-partials.top-gradbar />
    <x-shared.new-sidebar />

    <!-- Edit Account Modals -->
    <x-popups.edit-acc :user="$user" />
    <x-popups.edit-admin-perms-m />

    <!-- Submissions Modals -->
    <x-popups.confirm-approval-m />
    <x-popups.decline-approval-m />

    <!-- Inventory Modals -->
    <x-popups.import-excel-file-m />
    <x-popups.export-file-m />
    <x-popups.scan-option-m />
    <x-popups.image-edit-m />
    <x-popups.upload-thesis-m />

    <!-- User Management Modals -->
    <x-popups.add-admin-m :user="$user" />

    <!-- Backup Modals -->
    <x-popups.backup-download-successful-m />
    <x-popups.import-restore-file-m />
    <x-popups.confirm-textbox-m />
    <x-popups.backup-successful-m />

    <!-- Logout modal -->
    <x-popups.logout-m />

    <!-- Fail modal -->
    <x-popups.universal-x-m />

    <!-- pages -->
    <x-admin-pages.inventory-page :undergraduate="$undergraduate" :graduate="$graduate" />
    <x-admin-pages.submission-page :undergraduate="$undergraduate" :graduate="$graduate" />
    <x-admin-pages.user-page />
    <x-admin-pages.logs-page />
    <x-admin-pages.backup-page />

    <script>
        //for data summoning
        document.addEventListener("DOMContentLoaded", () => {
            function generateRows(count, generatorFn) {
                return Array.from({
                    length: count
                }, () => generatorFn()).join("");
            }

            function randomName() {
                const fn = ["Juan", "Maria", "Pedro", "Ana", "Jose", "Kyla"];
                const ln = ["Santos", "Reyes", "Dela Cruz", "Garcia", "Lopez", "Torres"];
                return `${fn[Math.floor(Math.random() * fn.length)]} ${ln[Math.floor(Math.random() * ln.length)]}`;
            }

            function randomProgram() {
                return ["BSIT", "BSCS", "BSCpE"][Math.floor(Math.random() * 3)];
            }

            function randomYear() {
                return 2021 + Math.floor(Math.random() * 4);
            }

            function randomDate() {
                const d = new Date(2021 + Math.floor(Math.random() * 4), Math.floor(Math.random() * 12), Math.floor(
                    Math.random() * 28) + 1, 9, 30);
                return d.toLocaleString("en-US", {
                    month: "long",
                    day: "2-digit",
                    year: "numeric",
                    hour: "2-digit",
                    minute: "2-digit"
                });
            }

            // Logs table
            const logsTable = document.querySelector("#logs-table tbody");
            if (logsTable) {
                logsTable.innerHTML += generateRows(20, () => `
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">Edited entry</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">Inventory</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">${Math.floor(Math.random() * 100)}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">${randomDate()}</td>
                                                                </tr>
                                                                `);
            }

            // Re-show correct page
            ['submission', 'inventory', 'users', 'logs', 'backup'].forEach(key => showPage(key, 1));
        });
        //for data summoning
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = [{
                    baseId: 'submission',
                    sectionId: 'submission-table'
                },
                {
                    baseId: 'inventory',
                    sectionId: 'inventory-table'
                },
                {
                    baseId: 'users',
                    sectionId: 'users-table'
                },
                {
                    baseId: 'logs',
                    sectionId: 'logs-table'
                },
                {
                    baseId: 'backup',
                    sectionId: 'backup-table'
                }
            ];

            const showSection = (idToShow) => {
                tabs.forEach(({
                    sectionId
                }) => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.classList.toggle('hidden', sectionId !== idToShow);
                    }
                });

                const key = idToShow.replace('-table', '');
                if (document.getElementById(`${key}-table-body`)) {
                    showPage(key, 1);
                }
            };

            tabs.forEach(({
                baseId,
                sectionId
            }) => {
                // Add event listeners for both desktop and mobile buttons
                const buttonVariants = [
                    document.getElementById(`${baseId}-tab`),
                    document.getElementById(`${baseId}-tab-mobile`)
                ];

                buttonVariants.forEach(btn => {
                    if (btn) {
                        btn.addEventListener('click', (e) => {
                            e.preventDefault();
                            showSection(sectionId);
                        });
                    }
                });
            });

            showSection('submission-table');
        });
    </script>
    <script>
        window.user = {
            name: "{{ Auth::user()->decrypted_first_name }} {{ Auth::user()->decrypted_last_name }}",
            first_name: "{{ Auth::user()->decrypted_first_name }}",
            last_name: "{{ Auth::user()->decrypted_last_name }}",
            email: "{{ Auth::user()->email }}",
            type: "{{ Auth::user()->account_type === 'super_admin'
                ? 'Super Admin'
                : (Auth::user()->account_type === 'admin'
                    ? 'Admin'
                    : Auth::user()->account_type) }}"
        };

        //side bar
        const usernameBtn = document.querySelector('.edit-admin');
        const usernameBtns = document.querySelectorAll('.edit-admin');
        const editAccountPopup = document.getElementById('edit-account-popup');

        usernameBtns.forEach(usernameBtn => {
            usernameBtn.addEventListener('click', () => {
                const step1 = document.getElementById('aea-step1');
                const editAccountPopup = document.getElementById(
                    'edit-account-popup');

                step1.classList.remove('hidden');
                editAccountPopup.style.display = 'flex';

                document.getElementById('first-name').value = window.user.first_name || '';
                document.getElementById('last-name').value = window.user.last_name || '';
                document.getElementById('usep-email').value = window.user.email || '';

                // Clear password fields
                document.getElementById('new-password').value = '';
                document.getElementById('confirm-password').value = '';
                document.getElementById('current-password').value = '';
            });
        });

        //sidebar name
        if (window.user) {
            document.querySelectorAll('.username-admin').forEach(nameEl => {
                const titleEl = nameEl.nextElementSibling;

                if (nameEl) nameEl.textContent = window.user.name;
                if (titleEl) titleEl.textContent = window.user.type;
            });
        }

        function sortTable(header) {
            const table = header.closest("table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const colIndex = [...header.parentNode.children].indexOf(header);
            const currentOrder = header.getAttribute("data-order") || "asc";
            const newOrder = currentOrder === "asc" ? "desc" : "asc";
            header.setAttribute("data-order", newOrder);

            const normalize = (str) =>
                str.toLowerCase()
                .replace(/[^a-z]/g, '')
                .replace(/grad(ua|uae)?t(e|)/, 'graduate')
                .replace(/undergrad(uate)?/, 'undergrad');

            rows.sort((a, b) => {
                const aText = a.children[colIndex]?.textContent.trim() || '';
                const bText = b.children[colIndex]?.textContent.trim() || '';

                const aDate = Date.parse(aText);
                const bDate = Date.parse(bText);

                if (!isNaN(aDate) && !isNaN(bDate)) {
                    return newOrder === "asc" ? aDate - bDate : bDate - aDate;
                }

                if (!isNaN(aText) && !isNaN(bText)) {
                    return newOrder === "asc" ? parseFloat(aText) - parseFloat(bText) : parseFloat(bText) -
                        parseFloat(aText);
                }

                const aNorm = normalize(aText);
                const bNorm = normalize(bText);
                return newOrder === "asc" ? aNorm.localeCompare(bNorm) : bNorm.localeCompare(aNorm);
            });

            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));

            const tableKey = tbody.id.replace('-table-body', '');
            showPage(tableKey, 1);
        }

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
                row.style.display = (i >= (page - 1) * rowsPerPage && i < page * rowsPerPage) ? '' : 'none';
            });

            const info = document.getElementById(`pagination-info-${tableKey}`);
            if (info) info.textContent = `Page ${page} of ${totalPages}`;
        }

        function changePage(tableKey, offset) {
            const current = currentPages[tableKey] || 1;
            showPage(tableKey, current + offset);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const logoutBtns = document.querySelectorAll('.logout-btn');
            const logoutPopup = document.getElementById('logout-popup');

            console.log('Logout buttons found:', logoutBtns.length);

            logoutBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    logoutPopup.style.display = 'flex';
                });
            });
        });

        // DOM Ready
        document.addEventListener('DOMContentLoaded', () => {


            let inventoryLoaded = false;
            let submissionLoaded = false;
            let usersLoaded = false;
            let historyLoaded = false;

            const allTabs = ['submission-table', 'inventory-table', 'users-table', 'logs-table', 'backup-table',
                'history-table', 'add-inventory-page', 'edit-inventory-page'
            ];

            function showOnly(idToShow) {
                localStorage.setItem('admin-active-tab', idToShow);
                allTabs.forEach(id => {
                    const section = document.getElementById(id);
                    if (section) section.classList.toggle('hidden', id !== idToShow);
                });

                // Pagination for every table
                const key = idToShow.replace('-table', '');
                if (document.getElementById(`${key}-table-body`)) {
                    showPage(key, 1);
                }

                // Populate Inventory only the first time it is opened
                if (idToShow === 'inventory-table' && !inventoryLoaded) {
                    fetchInventoryData();
                    inventoryLoaded = true;
                }

                if (idToShow === 'submission-table' && !submissionLoaded) {
                    fetchSubmissionData();
                    submissionLoaded = true;
                }

                if (idToShow === 'users-table' && !usersLoaded) {
                    fetchUserData();
                    usersLoaded = true;
                }

                if (idToShow === 'history-table' && !historyLoaded) {
                    fetchHistoryData();
                    historyLoaded = true;
                }
            }


            // Sidebar Tab Buttons
            const tabs = [{
                    buttonId: 'submission-tab',
                    sectionId: 'submission-table'
                },
                {
                    buttonId: 'inventory-tab',
                    sectionId: 'inventory-table'
                },
                {
                    buttonId: 'users-tab',
                    sectionId: 'users-table'
                },
                {
                    buttonId: 'logs-tab',
                    sectionId: 'logs-table'
                },
                {
                    buttonId: 'backup-tab',
                    sectionId: 'backup-table'
                }
            ];

            tabs.forEach(({
                buttonId,
                sectionId
            }) => {
                const btn = document.getElementById(buttonId);
                if (btn) {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        showOnly(sectionId);
                    });
                }
            });

            // Show default on load
            const savedTab = localStorage.getItem('admin-active-tab') || 'submission-table';
            showOnly(savedTab);

            // History tab logic
            const historyBtn = document.getElementById('history-btn');
            if (historyBtn) {
                historyBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('history-table');
                });
            }

            // add inventory btn
            const addInventoryBtn = document.getElementById('add-inventory-btn');
            if (addInventoryBtn) {
                addInventoryBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('add-inventory-page');
                });
            }

            //back to inventory after add

            //back to inventory
            document.querySelectorAll('.backto-inventory-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('inventory-table');
                });
            });

            //pending switch
            const pendingBtn = document.getElementById('pending-btn');
            if (pendingBtn) {
                pendingBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('submission-table');
                });
            }

            //side bar
            const usernameBtn = document.querySelector('.username-admin');
            const editAccountPopup = document.getElementById('edit-account-popup');

            usernameBtn.addEventListener('click', () => {
                const step1 = document.getElementById('ea-step1');
                const step2 = document.getElementById('ea-step2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                editAccountPopup.style.display = 'flex';
            });
            //Submission buttons
            //approve
            const approvePopup = document.getElementById('confirm-approval-popup');

            document.querySelectorAll('.approve-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1.classList.remove('hidden');
                    step2.classList.add('hidden');
                    approvePopup.style.display = 'flex';
                });
            });


            //decline
            const declinePopup = document.getElementById('confirm-rejection-popup');

            document.querySelectorAll('.decline-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1.classList.remove('hidden');
                    step2.classList.add('hidden');
                    declinePopup.style.display = 'flex';
                });
            });

            //Submission==============================================================================================
            //year filter
            fetch('/submission/filtersSubs')
                .then(res => res.json())
                .then(data => {
                    const yearSelect = document.querySelector('select[name="subs-dd-academic_year"]');

                    if (data.years) {
                        data.years.forEach(y => {
                            const opt = document.createElement('option');
                            opt.value = y;
                            opt.textContent = y;
                            yearSelect.appendChild(opt);
                        });
                    }
                });

            console.log('All status selects:', document.querySelectorAll('select[name="subs-dd-status"]'))
            const programSelectSubs = document.querySelector('select[name="subs-dd-program"]');
            const yearSelectSubs = document.querySelector('select[name="subs-dd-academic_year"]');
            const statusSelect = document.querySelector('select[name="subs-dd-status"]');

            programSelectSubs.addEventListener('change', fetchSubmissionData);
            yearSelectSubs.addEventListener('change', fetchSubmissionData);
            statusSelect.addEventListener('change', fetchSubmissionData);

            fetchSubmissionData()

            //populate subs tabke
            function fetchSubmissionData() {
                const program = document.querySelector('select[name="subs-dd-program"]').value;
                const year = document.querySelector('select[name="subs-dd-academic_year"]').value;
                const status = document.querySelector('select[name="subs-dd-status"]').value;

                const params = new URLSearchParams({
                    program,
                    year,
                    status
                });

                fetch(`/submission/data?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('submission-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = ''; // Clear previous rows

                        if (data.length === 0) {
                            const noDataRow = document.createElement('tr');
                            noDataRow.innerHTML = `
                                <td colspan="9" class="text-center py-4 text-gray-500 italic">
                                    No matching results found.
                                </td>
                            `;
                            tbody.appendChild(noDataRow);
                            return;
                        }

                        data.forEach((item, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `submission-abstract-row-${idx}`;
                            const toggleBtnId = `submission-toggle-btn-${idx}`;

                            // Main row
                            const row = document.createElement('tr');
                            const color = {
                                accepted: 'bg-green-100 text-green-800',
                                pending: 'bg-yellow-100 text-yellow-800',
                                rejected: 'bg-red-100   text-red-800',
                            } [item.status.toLowerCase()] || 'bg-gray-100 text-gray-800';

                            const manuscriptHtml = item.manuscript_filename ? `
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="items-center gap-3 mt-1">
                                        <a href="/submissions/${item.id}/download"
                                            download="${item.manuscript_filename}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            ${item.manuscript_filename}
                                        </a>
                                        <span class="text-sm text-gray-500">
                                            (${formatFileSize(item.manuscript_size)} • ${item.manuscript_mime})
                                        </span>
                                    </div>
                                </td>
                            ` : '<div class="text-gray-500">No manuscript uploaded</div>';
                            const statusColumn =
                                `<td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${color} capitalize">
                                        ${item.status}
                                    </span>
                                </td>`;
                            let actionButtons = '';
                            if (item.status === 'Pending') {
                                actionButtons = `
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-green-600 hover:underline approve-btn" data-id="${item.id}">Approve</button>
                                            <button class="text-red-600 hover:underline ml-2 decline-btn" data-id="${item.id}">Decline</button>
                                        </td>
                                    `;
                            } else {
                                actionButtons = `
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-gray-500">—</span>
                                        </td>
                                    `;
                            }
                            row.innerHTML = `
                                <td class="px-6 py-4 whitespace-normal max-w-[10vw] break-words">${item.title}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${(item.authors || '').replace(/\n/g, '<br>')}</td>
                                <td class="items-center px-4 py-2">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                ${manuscriptHtml}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.adviser}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.program || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${new Date(item.submitted_at).getFullYear()}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${item.submitted_by ?? '—'}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.submitted_at)}</td>
                                ${statusColumn}
                                @if (auth()->user() && auth()->user()->hasPermission('acc-rej-submission'))
                                    ${actionButtons}
                                @endif
                            `;
                            tbody.appendChild(row);

                            // Abstract row
                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = 'hidden';
                            abstractRow.innerHTML = `
                                <td colspan="11" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    <div class="break-words overflow-wrap-break-word"> ${item.abstract} </div>
                                </td>
                            `;
                            tbody.appendChild(abstractRow);

                            tbody.addEventListener('click', e => {
                                const btn = e.target;
                                const id = btn.dataset.id;
                                document.getElementById('submission-id-holder').value = id;

                                if (!btn.classList.contains('approve-btn') && !btn.classList
                                    .contains('decline-btn')) {
                                    return;
                                }

                                const step1 = document.getElementById(btn.classList.contains(
                                    'approve-btn') ? 'ca-step1' : 'cr-step1');
                                const step2 = document.getElementById(btn.classList.contains(
                                    'approve-btn') ? 'ca-step2' : 'cr-step2');

                                if (step1 && step2) {
                                    step1.classList.remove('hidden');
                                    step2.classList.add('hidden');
                                }

                                const popup = document.getElementById(btn.classList.contains(
                                        'approve-btn') ? 'confirm-approval-popup' :
                                    'confirm-rejection-popup');
                                if (popup) popup.style.display = 'flex';
                            });
                        });

                        showPage('submission', 1);
                    })
                    .catch(err => {
                        console.error('Failed to fetch submission data:', err);
                    });
            }

            function formatFileSize(bytes) {
                if (!bytes) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            //hsitory year filter
            fetch('/submission/filtersHistory')
                .then(res => res.json())
                .then(data => {
                    const yearSelect = document.querySelector('select[name="history-dd-academic_year"]');

                    if (data.years) {
                        data.years.forEach(y => {
                            const opt = document.createElement('option');
                            opt.value = y;
                            opt.textContent = y;
                            yearSelect.appendChild(opt);
                        });
                    }
                });

            const programSelectHistory = document.querySelector('select[name="history-dd-program"]');
            const yearSelectHistory = document.querySelector('select[name="history-dd-academic_year"]');

            if (programSelectHistory) {
                programSelectHistory.addEventListener('change', fetchHistoryData);
            }

            if (yearSelectHistory) {
                yearSelectHistory.addEventListener('change', fetchHistoryData);
            }

            fetchHistoryData()

            function fetchHistoryData() {
                const program = document.querySelector('select[name="history-dd-program"]').value;
                const year = document.querySelector('select[name="history-dd-academic_year"]').value;
                const params = new URLSearchParams({
                    program,
                    year
                });
                fetch(`/submission/history?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('history-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = '';

                        if (data.length === 0) {
                            tbody.innerHTML = `
                      <tr>
                          <td colspan="12" class="text-center py-4 text-gray-500 italic">
                              No history entries found.
                          </td>
                      </tr>`;
                            return;
                        }

                        data.forEach((item, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `history-abstract-row-${idx}`;
                            const toggleBtnId = `history-toggle-btn-${idx}`;

                            const row = document.createElement('tr');
                            row.className = rowColor;
                            row.innerHTML = `
                                <td class="px-6 py-4 max-w-[10vw] break-words">${item.title}</td>
                                <td class="px-6 py-4">${(item.authors || '').replace(/\n/g, '<br>')}</td>
                                <td class="px-4 py-2">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="text-xs text-[#9D3E3E] underline hover:text-[#D56C6C]"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                <td class="px-6 py-4">${item.adviser}</td>
                                <td class="px-6 py-4">${item.program}</td>
                                <td class="px-6 py-4">${item.submitted_by}</td>
                                <td class="px-6 py-4">${formatDate(item.submitted_at)}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        ${({accepted:'bg-green-100 text-green-800',
                                            pending :'bg-yellow-100 text-yellow-800',
                                            rejected:'bg-red-100   text-red-800'
                                        }[item.status.toLowerCase()] || 'bg-gray-100 text-gray-800')} capitalize">
                                        ${item.status}
                                    </span>
                                </td>
                                <td class="px-6 py-4">${item.reviewed_by}</td>
                                <td class="px-6 py-4 max-w-[15vw] break-words">${item.remarks}</td>
                                <td class="px-6 py-4">${formatDate(item.reviewed_at)}</td>
                            `;
                            tbody.appendChild(row);

                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = 'hidden';
                            abstractRow.innerHTML = `
                                <td colspan="12" class="px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    ${item.abstract}
                                </td>
                            `;
                            tbody.appendChild(abstractRow);
                        });

                        showPage('history', 1);
                    });
            }

            //Inventory ==============================================================================================
            //year filter
            fetch('/inventory/filtersInv')
                .then(res => res.json())
                .then(data => {
                    const yearSelect = document.querySelector('select[name="inv-dd-academic_year"]');

                    if (data.years) {
                        data.years.forEach(y => {
                            const opt = document.createElement('option');
                            opt.value = y;
                            opt.textContent = y;
                            yearSelect.appendChild(opt);
                        });
                    }
                });

            const yearSelect = document.querySelector('select[name="inv-dd-academic_year"]');
            const programSelect = document.querySelector('select[name="inv-dd-program"]');

            if (yearSelect) {
                yearSelect.addEventListener('change', () => {
                    fetchInventoryData(); // re-fetch table when year changes
                });
            }

            if (programSelect) {
                programSelect.addEventListener('change', () => {
                    fetchInventoryData(); // re-fetch table when program changes
                });
            }

            // popluate inv table
            function fetchInventoryData() {
                const program = document.querySelector('select[name="inv-dd-program"]').value;
                const year = document.querySelector('select[name="inv-dd-academic_year"]').value;

                const params = new URLSearchParams({
                    program,
                    year
                });

                fetch(`/inventory/data?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('inventory-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = ''; // Clear old rows

                        if (data.length === 0) {
                            // Show "No matching results" if no data
                            const noDataRow = document.createElement('tr');
                            noDataRow.innerHTML = `
                        <td colspan="9" class="text-center py-4 text-gray-500 italic">
                            No matching results found.
                        </td>
                    `;
                            tbody.appendChild(noDataRow);
                            return;
                        }


                        data.forEach((item, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `abstract-row-${idx}`;
                            const toggleBtnId = `toggle-btn-${idx}`;

                            // Main row
                            const row = document.createElement('tr');
                            row.className = rowColor;

                            const manuscriptHtml = item.manuscript_filename ? `
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="items-center gap-3 mt-1">
                                        <a href="${item.download_url}"
                                            download="${item.manuscript_filename}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoins="round" stroke-width="2" 
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                                ${item.manuscript_filename}
                                        </a>
                                        <span class="text-sm text-gray-500">
                                            (${formatFileSize(item.manuscript_size)} • ${item.manuscript_mime})
                                        </span>
                                    </div>
                                </td>
                            ` : '<div class="text-gray-500">No manuscript uploaded</div>';
                            row.innerHTML = `
                                <td class="px-6 py-4 whitespace-normal max-w-[10vw] break-words">${item.inventory_number}</td>
                                <td class="px-6 py-4 whitespace-normal max-w-[10vw] break-words">${item.title}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${(item.authors || '').replace(/\n/g, '<br>')}</td>
                                <td class="px-4 py-2 align-top">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="text-xs text-[#9D3E3E] underline hover:text-[#D56C6C]"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                ${manuscriptHtml}
                                <td class="px-6 py-4 whitespace-nowrap">${item.adviser}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.program || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.academic_year}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.submitted_by || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.archived_at)}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${item.reviewed_by || ''}</td>
                                ${item.can_edit
                                ? `<td class="px-6 py-4 whitespace-nowrap">
                                                                                                    <button id="edit-inventory-btn-${item.id}"
                                                                                                            class="ml-4 text-green-600 underline hover:brightness-110 cursor-pointer edit-inventory-btn"
                                                                                                            data-item='${JSON.stringify(item).replace(/'/g, "&apos;")}'>
                                                                                                        Edit
                                                                                                    </button>
                                                                                                </td>`
                                : ''}
                            `;
                            tbody.appendChild(row);

                            // Abstract row (initially hidden)
                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = `hidden`;
                            abstractRow.innerHTML = `
                                <td colspan="12" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    <div class="break-words overflow-wrap-break-word"> ${item.abstract}</div>
                                </td>
                            `;
                            tbody.appendChild(abstractRow);
                            showPage('inventory', 1);
                        });
                    });
            }

            //add
            const uploadBtnAdd = document.getElementById('admin-upload-btn');
            const fileInputAdd = document.getElementById('admin-upload-input');
            const uploadedFileContainerAdd = document.getElementById('admin-uploaded-file');
            const fileNameSpanAdd = document.getElementById('adminUp-file-name');
            const formAdd = document.getElementById('add-inventory-form');
            const errorMessageAdd = document.getElementById('error-message');
            const cancelUploadBtnAdd = document.getElementById('admin-cancel-upload-btn');

            // Trigger file input click when button is clicked
            uploadBtnAdd.addEventListener('click', function() {
                fileInputAdd.click();
            });

            // Handle file selection
            fileInputAdd.addEventListener('change', function() {
                if (fileInputAdd.files.length > 0) {
                    const fileNameAdd = fileInputAdd.files[0].name;
                    fileNameSpanAdd.textContent = fileName;
                    uploadedFileContainerAdd.classList.remove('hidden');
                    uploadedFileContainer.AddclassList.add('flex');
                } else {
                    uploadedFileContainerAdd.classList.add('hidden');
                }
            });

            // Handle cancel button click
            cancelUploadBtnAdd.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent any form submission or default action
                fileInputAdd.value = ''; // Clear the file input
                fileNameSpanAdd.textContent = ''; // Clear the file name display
                uploadedFileContainerAdd.classList.add('hidden'); // Hide the uploaded file container
            });

            // Form submission validation
            formAdd.addEventListener('submit', function(event) {
                if (fileInput.files.length === 0) {
                    event.preventDefault();
                    errorMessage.textContent = 'Please select a file to upload.';
                    errorMessage.classList.remove('hidden');
                } else {
                    errorMessage.textContent = '';
                    errorMessage.classList.add('hidden');
                }
            });

            //inventory edit

            document.addEventListener('click', function(e) {
                const target = e.target;
                if (target.classList.contains('edit-inventory-btn')) {
                    e.preventDefault();
                    const itemData = target.getAttribute('data-item');
                    try {
                        const item = JSON.parse(itemData.replace(/&apos;/g, "'"));
                        editArchiver(item);
                    } catch (err) {
                        console.error("Failed to parse item data:", err);
                    }
                }
            });

            window.editArchiver = function(item) {
                console.log("Editing inventory item:", item);
                showOnly('edit-inventory-page');

                // Set form values
                setTimeout(() => {
                    // Set the ID first
                    const idField = document.getElementById('edit-item-id');
                    if (idField) idField.value = item.id;

                    // Set other fields
                    document.getElementById('edit-thesis-title').value = item.title || '';
                    document.querySelector('select[name="adviser"]').value = item.adviser || '';
                    document.getElementById('edit-authors').value = item.authors || '';
                    document.getElementById('edit-abstract').value = item.abstract || '';

                    if (item.program_id) {
                        document.getElementById('edit-program-select').value = item.program_id;
                    }

                    if (item.academic_year) {
                        document.querySelector('select[name="academic_year"]').value = item
                            .academic_year;
                    }
                }, 0);
            };


            // update/edit form submission handler
            document.getElementById('edit-inventory-form')?.addEventListener('submit', async function(e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);
                const itemId = formData.get('id');

                if (!itemId) {
                    alert('Error: No inventory item selected');
                    return;
                }

                try {
                    const response = await fetch(`/inventories/${itemId}`, {
                        method: 'POST', // Laravel will treat as PUT due to _method field
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        const kpopup = document.getElementById('universal-ok-popup');
                        const kTopText = document.getElementById('OKtopText');
                        const kSubText = document.getElementById('OKsubText');
                        const kButton = document.getElementById('uniOK-confirm-btn');

                        kTopText.textContent = "Update Sucessful!";
                        kSubText.textContent = "Thesis has been updated successfully.";
                        kpopup.style.display = 'flex';

                        kButton.addEventListener('click', () => {
                            kpopup.style.display = 'none';
                            fetchInventoryData(); // Refresh inventory data
                            showOnly('inventory-table');
                        });

                    } else {
                        throw new Error(result.message || 'Failed to update thesis');
                    }
                } catch (error) {
                    console.error('Error updating thesis:', error);
                    alert('Error updating thesis: ' + error.message);
                }
            });

            //edit ui shit
            //edit inv
            const uploadBtnEdit = document.getElementById('edit-admin-upload-btn');
            const fileInputEdit = document.getElementById('edit-admin-upload-input');
            const uploadedFileContainerEdit = document.getElementById('edit-admin-uploaded-file');
            const fileNameSpanEdit = document.getElementById('adminEdit-file-name');
            const formEdit = document.getElementById('edit-inventory-form');
            const cancelUploadBtnEdit = document.getElementById('admin-cancel-upload-btn');

            uploadBtnEdit.addEventListener('click', function() {
                console.log('edit button')
                fileInputEdit.click();
            });

            // Handle file selection
            fileInputEdit.addEventListener('change', function() {
                if (fileInputEdit.files.length > 0) {
                    const fileNameEdit = fileInputEdit.files[0].name;
                    fileNameSpanEdit.textContent = fileNameEdit;
                    uploadedFileContainerEdit.classList.remove('hidden');
                    uploadedFileContainerEdit.classList.add('flex');
                } else {
                    uploadedFileContainerEdit.classList.add('hidden');
                }
            });

            // Handle cancel button click
            cancelUploadBtnEdit.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent any form submission or default action
                fileInputEdit.value = ''; // Clear the file input
                fileNameSpanEdit.textContent = ''; // Clear the file name display
                uploadedFileContainerEdit.classList.add('hidden'); // Hide the uploaded file container
            });

            // Form submission validation
            formEdit.addEventListener('submit', function(event) {
                if (fileInputEdit.files.length === 0) {
                    event.preventDefault();
                    errorMessage.textContent = 'Please select a file to upload.';
                    errorMessage.classList.remove('hidden');
                } else {
                    errorMessage.textContent = '';
                    errorMessage.classList.add('hidden');
                }
            });

            const scanOptionPopup = document.getElementById('scan-option-popup');
            const scanDocuBtn = document.getElementById('scan-docu-upload-btn');
            const editImagePopup = document.getElementById('image-edit-popup');
            const popupTitle = document.getElementById('popup-title');
            const ocrOutput = document.getElementById('ocrInput');

            let currentSubmissionId = null;
            let selectedScanTitle = "";

            document.querySelectorAll('.scan-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    console.log('selectedScanTitle:', window.selectedScanTitle);
                    window.selectedScanTitle = btn.getAttribute('data-title');
                    window.selectedInputId = btn.getAttribute('data-input');
                    scanOptionPopup.style.display = 'flex';
                });
            });

            //upload thesis popup
            // const uploadThesisPopup = document.getElementById('upload-thesis-popup');
            // const uploadConfirm = document.getElementById('pt-confirm-btn');
            // const uploadBtn = document.getElementById('admin-upload-btn');

            // const fileNameSpan = document.getElementById('adminUp-file-name');
            // const uploadedFileContainer = document.getElementById('admin-uploaded-file');

            // uploadBtn.addEventListener('click', () => {
            //     uploadThesisPopup.style.display = 'flex';
            // });

            // window.addEventListener('thesisFileSelected', (e) => {
            //     const fileName = e.detail.fileName;
            //     if (fileNameSpan && fileName) {
            //         fileNameSpan.textContent = `Selected: ${fileName}`;
            //         uploadedFileContainer.classList.remove('hidden');
            //         uploadedFileContainer.classList.add('flex');
            //     }
            // });


            //import
            const importExcelFileBtn = document.getElementById('import-excel-file');
            const importExcelFilePopup = document.getElementById('import-excel-popup');

            importExcelFileBtn.addEventListener('click', () => {
                const step1 = document.getElementById('ie-step-1');
                const step2 = document.getElementById('ie-step-2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                importExcelFilePopup.style.display = 'flex';
            });

            //export
            const exportFileBtn = document.getElementById('export-file-btn');
            const exportFilePopup = document.getElementById('export-file-popup');

            exportFileBtn.addEventListener('click', () => {
                exportFilePopup.style.display = 'flex';
            });

            /**
             * Add Admin Button handler
             */

            const addAdminBtn = document.getElementById('add-admin-btn');
            const addAdminPopup = document.getElementById('add-admin-popup');

            addAdminBtn.addEventListener('click', () => {
                addAdminPopup.style.display = 'flex';
            });

            // Load filter options
            fetch('/users/data')
                .then(res => res.json())
                .then(data => {
                    const accountSelect = document.querySelector('select[name="accounts-dd"]');
                    const accountTypes = [...new Set(data.map(u => u.account_type))]; // unique account types

                    accountTypes.forEach(type => {
                        const opt = document.createElement('option');
                        opt.value = type;
                        opt.textContent = type.replace('_', ' ');
                        accountSelect.appendChild(opt);
                    });
                });

            // Filter when dropdown changes
            const accountSelect = document.querySelector('select[name="accounts-dd"]');
            if (accountSelect) {
                accountSelect.addEventListener('change', () => {
                    fetchUserData();
                });
            }

            // Populate users table
            function fetchUserData() {
                fetch('/users/data?with_permissions=1')
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('users-table-body');
                        tbody.innerHTML = '';

                        const selectedType = document.querySelector('select[name="accounts-dd"]').value;

                        const filtered = selectedType ? data.filter(u => u.account_type === selectedType) :
                            data;

                        if (filtered.length === 0) {
                            tbody.innerHTML =
                                `<tr><td colspan="7" class="text-center py-4 text-gray-500 italic">No users found.</td></tr>`;
                            return;
                        }

                        filtered.forEach((user, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const fullName = `${user.first_name || ''} ${user.last_name || ''}`;
                            const program = user.program || '—';
                            const degree = user.degree || '—';
                            const actions = user.account_type.toLowerCase() === 'admin' ?
                                `<span class="ml-4 text-green-600 underline hover:brightness-110 cursor-pointer edit-admin-account" data-user-id="${user.id}">Edit</span>` :
                                '';

                            const row = document.createElement('tr');
                            row.className = rowColor;
                            row.innerHTML = `
                                @if (auth()->user() && auth()->user()->hasPermission('view-accounts'))
                                <td class="px-6 py-4">${fullName}</td>
                                <td class="px-6 py-4">${user.email}</td>
                                <td class="px-6 py-4">${user.account_type.replace('_', ' ')}</td>
                                <td class="px-6 py-4">${program}</td>
                                <td class="px-6 py-4">${degree}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        ${user.status.toLowerCase() === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                        ${user.status}
                                    </span>
                                </td>
                                    @if (auth()->user() && auth()->user()->hasPermission('edit-permissions'))
                                        <td class="px-6 py-4">${actions}</td>
                                    @endif
                                @endif
                            `;
                            tbody.appendChild(row);
                        });

                        showPage('users', 1);
                    });
            }

            //edit addmin account
            const editPermsPopup = document.getElementById('edit-admin-perms-popup');
            const permissionCheckboxes = {
                'view-dashboard': document.getElementById('edit-perms-view-dashboard'),
                'view-submissions': document.getElementById('edit-perms-view-submissions'),
                'acc-rej-submission': document.getElementById('edit-perms-acc-rej-submission'),
                'view-inventory': document.getElementById('edit-perms-view-inventory'),
                'add-inventory': document.getElementById('edit-perms-add-inventory'),
                'edit-inventory': document.getElementById('edit-perms-edit-inventory'),
                'import-inventory': document.getElementById('edit-perms-import-inventory'),
                'export-inventory': document.getElementById('edit-perms-export-inventory'),
                'view-accounts': document.getElementById('edit-perms-view-accounts'),
                'edit-permissions': document.getElementById('edit-perms-edit-permissions'),
                'add-admin': document.getElementById('edit-perms-add-admin'),
                'view-logs': document.getElementById('edit-perms-view-logs'),
                'view-backup': document.getElementById('edit-perms-view-backup'),
                'download-backup': document.getElementById('edit-perms-download-backup'),
                'allow-restore': document.getElementById('edit-perms-allow-restore')
            };

            document.addEventListener('click', function(e) {
                const editBtn = e.target.closest('.edit-admin-account');
                if (editBtn) {
                    const userId = editBtn.dataset.userId;
                    if (!userId) {
                        console.error('No user ID found on edit button');
                        return;
                    }

                    const form = document.querySelector('#edit-admin-perms-popup form');
                    form.dataset.userId = userId;

                    editAdminAccount(userId);
                }
            });

            async function editAdminAccount(userId) {
                if (!userId) {
                    alert('Error: No user selected');
                    return;
                }

                const editPermsPopup = document.getElementById('edit-admin-perms-popup');
                editPermsPopup.style.display = 'flex';

                try {
                    const response = await fetch(`/admin/users/${userId}/permissions`);

                    if (!response.ok) throw new Error(`HTTP ${response.status}`);

                    const data = await response.json();
                    console.log('Permissions data:', data);

                    Object.values(permissionCheckboxes).forEach(checkbox => {
                        if (checkbox) checkbox.checked = false;
                    });

                    // Update checkboxes - handle both hyphen and underscore formats
                    data.permissions.forEach(perm => {
                        const formattedPerm = perm.replace(/_/g, '-');
                        const checkboxId = `edit-perms-${formattedPerm}`;
                        const checkbox = document.getElementById(checkboxId);

                        if (checkbox) {
                            checkbox.checked = true;
                            checkbox.dispatchEvent(new Event('change'));
                        } else {
                            console.warn(
                                `No checkbox found for permission: ${perm} (looked for ${checkboxId})`
                            );
                        }
                    });

                } catch (error) {
                    console.error('Error loading permissions:', error);
                    alert('Failed to load permissions. Check console for details.');
                    editPermsPopup.style.display = 'none';
                }
            }


            //Backup buttons =======================================================================================================
            //download backup popup
            const downloadBackupPopup = document.getElementById('backup-download-popup');
            document.querySelectorAll('.download-backup-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1?.classList.remove('hidden');
                    step2?.classList.add('hidden');
                    if (downloadBackupPopup) downloadBackupPopup.style.display = 'flex';
                });
            });


            const backupDownloadForm = document.getElementById('backup-form');
            const button = document.getElementById('backup-btn');
            const backupPopup = document.getElementById('backup-download-popup');

            backupDownloadForm.addEventListener('submit', function(e) {
                const now = new Date();
                const formatted = now.toISOString().replace(/T/, '_').replace(/:/g, '-').split('.')[0];
                const filename = `backup_${formatted}.sqlite`;
                const fileNameInput = document.getElementById('bds-file-name');
                const confirmBtn = document.getElementById('bds-confirm-btn');

                e.preventDefault();
                fileNameInput.textContent = filename;
                backupPopup.style.display = 'flex';

                confirmBtn.addEventListener('click', () => {
                    backupPopup.style.display = 'none';
                    backupDownloadForm.submit();
                });
            });

            const backupAndResetForm = document.getElementById('backupAndResetForm');
            const backupAndResetBtn = document.getElementById('backup-and-reset-btn');

            const CTPmodal = document.getElementById('confirm-textbox-popup');
            const CTPconfirmInput = document.getElementById('confirm-textbox-input');
            const CTPnameInput = document.getElementById('ctp-confirm-name-input');
            const CTPconfirmBtn = document.getElementById('ctp-confirm-submit-btn');
            const CTPcancelBtn = document.getElementById('ctp-cancel-confirm-btn');

            backupAndResetForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Backup and reset form submitted');
                CTPmodal.style.display = 'flex';

                function updateConfirmButtonState() {
                    const isConfirmed = CTPconfirmInput.value === 'BACKUPANDRESET';
                    const hasName = CTPnameInput.value.trim().length > 0;
                    CTPconfirmBtn.disabled = !(isConfirmed && hasName);
                }

                CTPconfirmInput.addEventListener('input', updateConfirmButtonState);
                CTPnameInput.addEventListener('input', updateConfirmButtonState);

                CTPconfirmBtn.addEventListener('click', function(e) {
                    backupAndResetForm.submit();

                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                });

                updateConfirmButtonState();
            });


            // Init pagination for all
            ['users', 'submission', 'inventory', 'logs', 'backup', 'history'].forEach(id => showPage(id, 1));


        });

        // Toggle function to show/hide abstract
        function toggleAbstract(rowId, btnId) {
            const row = document.getElementById(rowId);
            const btn = document.getElementById(btnId);

            if (row.classList.contains('hidden')) {
                row.classList.remove('hidden');
                btn.innerText = 'Hide Abstract';
            } else {
                row.classList.add('hidden');
                btn.innerText = 'View Abstract';
            }
        }

        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleString("en-US", {
                month: "long",
                day: "2-digit",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            });
        }
    </script>

@endsection
