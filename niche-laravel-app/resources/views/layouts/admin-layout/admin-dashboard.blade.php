<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin</title>
</head>

<script>
//for data summoning
    document.addEventListener("DOMContentLoaded", () => {
  function generateRows(count, generatorFn) {
    return Array.from({ length: count }, () => generatorFn()).join("");
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
    const d = new Date(2021 + Math.floor(Math.random() * 4), Math.floor(Math.random() * 12), Math.floor(Math.random() * 28) + 1, 9, 30);
    return d.toLocaleString("en-US", { month: "long", day: "2-digit", year: "numeric", hour: "2-digit", minute: "2-digit" });
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
    const tabs = [
    { baseId: 'submission', sectionId: 'submission-table' },
    { baseId: 'inventory', sectionId: 'inventory-table' },
    { baseId: 'users', sectionId: 'users-table' },
    { baseId: 'logs', sectionId: 'logs-table' },
    { baseId: 'backup', sectionId: 'backup-table' }
  ];

  const showSection = (idToShow) => {
    tabs.forEach(({ sectionId }) => {
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

  tabs.forEach(({ baseId, sectionId }) => {
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

<body class="bg-[#fdfdfd] text-gray-900">

    <x-layout-partials.top-gradbar />
    <x-shared.new-sidebar />

    <!-- hidden modals -->
    <x-popups.import-excel-file-m />
    <x-popups.import-restore-file-m />
    <x-popups.export-file-m />
    <x-popups.backup-download-successful-m/>
    <x-popups.backup-successful-m/>
    <x-popups.logout-m/>
    <x-popups.edit-acc />
    <x-popups.confirm-approval-m/>
    <x-popups.decline-approval-m/>
    <x-popups.add-admin-m/>
    <x-popups.admin-add-succ-m/>
    <x-popups.confirm-deactivation-m/>
    <x-popups.scan-option-m/>
    <x-popups.image-edit-m/>
    <x-popups.upload-thesis-m/>

    <!-- pages -->
    <x-admin-pages.inventory-page :undergraduate="$undergraduate" :graduate="$graduate" />
    <x-admin-pages.submission-page :undergraduate="$undergraduate" :graduate="$graduate"/>
    <x-admin-pages.user-page />
    <x-admin-pages.logs-page />
    <x-admin-pages.backup-page />
</body>
</html>

<script>
  //sideba thing
    window.user = {
        name: "{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}",
        type: "{{ Auth::user()->account_type }}"
    };

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
      return newOrder === "asc" ? parseFloat(aText) - parseFloat(bText) : parseFloat(bText) - parseFloat(aText);
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

// DOM Ready
document.addEventListener('DOMContentLoaded', () => {
let inventoryLoaded = false;
let submissionLoaded = false;
let usersLoaded = false;
let historyLoaded = false;

  const allTabs = ['submission-table', 'inventory-table', 'users-table', 'logs-table', 'backup-table', 'history-table', 'add-inventory-page', 'edit-inventory-page'];

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

  //side bar name
  if (window.user) {
      const nameEl = document.querySelector('.username-admin');
      const titleEl  = nameEl.nextElementSibling;  // the <div> below it

      nameEl.textContent = window.user.name;
      titleEl.textContent = window.user.type;      // e.g. "Admin", "Client"
    }

  // Sidebar Tab Buttons
  const tabs = [
    { buttonId: 'submission-tab', sectionId: 'submission-table' },
    { buttonId: 'inventory-tab', sectionId: 'inventory-table' },
    { buttonId: 'users-tab', sectionId: 'users-table' },
    { buttonId: 'logs-tab', sectionId: 'logs-table' },
    { buttonId: 'backup-tab', sectionId: 'backup-table' }
  ];

  tabs.forEach(({ buttonId, sectionId }) => {
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

    // edit inventory btn
    

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

    const programSelectSubs = document.querySelector('select[name="subs-dd-program"]');
    const yearSelectSubs = document.querySelector('select[name="subs-dd-academic_year"]');

    programSelectSubs.addEventListener('change', fetchSubmissionData);
    yearSelectSubs.addEventListener('change', fetchSubmissionData);

    fetchSubmissionData()
    
    //populate subs tabke
    function fetchSubmissionData() {
        const program = document.querySelector('select[name="subs-dd-program"]').value;
        const year = document.querySelector('select[name="subs-dd-academic_year"]').value;

        const params = new URLSearchParams({ program, year });

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
                    row.className = rowColor;
                    row.innerHTML = `
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
                        <td class="px-6 py-4 whitespace-nowrap">${item.adviser}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.program?.name || ''}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          ${item.submitted_by?.first_name || ''} ${item.submitted_by?.last_name || ''}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.submitted_at)}</td>
                        @if(auth()->user()->hasPermission('acc-rej-submissions'))
                            <td class="px-6 py-4 whitespace-nowrap"><button class="text-green-600 hover:underline approve-btn">Approve</button>
                            <button class="text-red-600 hover:underline ml-2 decline-btn">Decline</button></td>
                        @endif
                    `;
                    tbody.appendChild(row);

                    // Abstract toggle row
                    const abstractRow = document.createElement('tr');
                    abstractRow.id = abstractRowId;
                    abstractRow.className = 'hidden';
                    abstractRow.innerHTML = `
                        <td colspan="9" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-sm text-gray-700 bg-gray-50 ${rowColor}">
                            <div class="break-words overflow-wrap-break-word"> ${item.abstract} </div>
                        </td>
                    `;
                    tbody.appendChild(abstractRow);
                    tbody.addEventListener('click', e => {
                        const btn = e.target;
                        if (!btn.classList.contains('approve-btn') && !btn.classList.contains('decline-btn')) return;

                        const step1 = document.getElementById(btn.classList.contains('approve-btn')
                                                                ? 'ca-step1'          // approve popup
                                                                : 'cr-step1');        // decline popup
                        const step2 = document.getElementById(btn.classList.contains('approve-btn')
                                                                ? 'ca-step2'
                                                                : 'cr-step2');

                        if (step1 && step2) {
                            step1.classList.remove('hidden');
                            step2.classList.add('hidden');
                        }

                        const popup = document.getElementById(btn.classList.contains('approve-btn')
                                                                ? 'confirm-approval-popup'
                                                                : 'confirm-rejection-popup');
                        if (popup) popup.style.display = 'flex';
                    });
                });

                showPage('submission', 1);
            })
            .catch(err => {
                console.error('Failed to fetch submission data:', err);
            });
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
      const params = new URLSearchParams({ program, year });
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
                      <td class="px-6 py-4">${item.status}</td>
                      <td class="px-6 py-4">${item.reviewed_by}</td>
                      <td class="px-6 py-4 max-w-[15vw] break-words">${item.remarks}</td>
                      <td class="px-6 py-4">${formatDate(item.reviewed_at)}</td>
                  `;
                  tbody.appendChild(row);

                  const abstractRow = document.createElement('tr');
                  abstractRow.id = abstractRowId;
                  abstractRow.className = 'hidden';
                  abstractRow.innerHTML = `
                      <td colspan="12" class="px-6 py-3 text-sm text-gray-700 bg-gray-50 ${rowColor}">
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
        const year    = document.querySelector('select[name="inv-dd-academic_year"]').value;

        const params  = new URLSearchParams({ program, year });

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
                    row.innerHTML = `
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
                        <td class="px-6 py-4 whitespace-nowrap">${item.adviser}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.program || ''}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.academic_year}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.submitted_by || ''}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.archived_at)}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.reviewed_by || ''}</td>
                        @if(auth()->user() && auth()->user()->hasPermission('edit-inventory'))
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${item.archiver?.name || ''}
                                    <button id="edit-inventory-btn-${item.id}"
                                        class="ml-4 text-green-600 underline hover:brightness-110 cursor-pointer edit-inventory-btn"
                                        data-item='${JSON.stringify(item).replace(/'/g, "&apos;")}'
                                    >
                                        Edit
                                    </button>
                                </td>
                        @endif
                    `;
                    tbody.appendChild(row);

                    // Abstract row (initially hidden)
                    const abstractRow = document.createElement('tr');
                    abstractRow.id = abstractRowId;
                    abstractRow.className = `hidden`;
                    abstractRow.innerHTML = `
                        <td colspan="9" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-sm text-gray-700 bg-gray-50 ${rowColor}">
                            <div class="break-words overflow-wrap-break-word"> ${item.abstract}</div>
                        </td>
                    `;
                    tbody.appendChild(abstractRow);
                    showPage('inventory', 1);
                });
            });
    }

    document.addEventListener('click', function (e) {
        const target = e.target;
        if (!target.classList.contains('toggle-abstract-btn')) return;
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

    window.editArchiver = function (item) {
    console.log("Editing inventory item:", item);
    showOnly('edit-inventory-page');

    const titleInput = document.getElementById('edit-thesis-title');
    console.log("titleInput element:", titleInput);
    console.log("item.title value:", item.title);

    setTimeout(() => {
        const titleInput = document.getElementById('edit-thesis-title');
        if (titleInput) titleInput.value = item.title || '';

        const adviserInput = document.getElementById('edit-adviser');
        if (adviserInput) adviserInput.value = item.adviser || '';

        const authorsInput = document.getElementById('edit-authors');
        if (authorsInput) authorsInput.value = item.authors || '';

        const abstractInput = document.getElementById('edit-abstract');
        if (abstractInput) abstractInput.value = item.abstract || '';

        const programSelect = document.getElementById('edit-program-select');
        if (programSelect && item.program?.id) {
            const programId = item.program.id.toString();
            const programOption = [...programSelect.options].find(opt => opt.value === programId);
            if (programOption) programSelect.value = programId;
            else console.warn('Program not found in <select>: ', programId);
        }

        const yearSelect = document.querySelector('select[name="edit-academic_year"]');
        if (yearSelect && item.academic_year) {
            const yearStr = item.academic_year.toString();
            const yearOption = [...yearSelect.options].find(opt => opt.value === yearStr);
            if (yearOption) yearSelect.value = yearStr;
            else console.warn('Academic year not found in <select>: ', yearStr);
        }
    }, 0);
};


    const editInventoryBtn = document.getElementById('edit-inventory-btn');
    document.addEventListener('click', function (e) {
        if (e.target.matches('button[id^="edit-inventory-btn-"]')) {
            e.preventDefault();
            const id = e.target.id.replace('edit-inventory-btn-', '');
            editArchiver(item);
        }
    });

    
    //add-scan
    const scanOptionPopup = document.getElementById('scan-option-popup');
    const scanDocuBtn = document.getElementById('scan-docu-upload-btn');
    const editImagePopup = document.getElementById('image-edit-popup');
    const popupTitle = document.getElementById('popup-title');
    const ocrOutput = document.getElementById('ocrInput');

    let selectedScanTitle = "";

    document.querySelectorAll('.scan-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            selectedScanTitle = btn.getAttribute('data-title'); 
            window.selectedInputId = btn.getAttribute('data-input');  
            scanOptionPopup.style.display = 'flex';
        });
    });

    scanDocuBtn.addEventListener('click', () => {
        scanOptionPopup.style.display = 'none';
        editImagePopup.style.display = 'flex';
        popupTitle.textContent = selectedScanTitle || "Untitled";
    });

    //upload thesis popup
        const uploadThesisPopup = document.getElementById('upload-thesis-popup'); 
        const uploadConfirm = document.getElementById('pt-confirm-btn');
        const uploadBtn = document.getElementById('admin-upload-btn');

        const fileNameSpan = document.getElementById('adminUp-file-name');
        const uploadedFileContainer = document.getElementById('admin-uploaded-file');

        uploadBtn.addEventListener('click', () => {
            uploadThesisPopup.style.display = 'flex';
        });

        window.addEventListener('thesisFileSelected', (e) => {
            const fileName = e.detail.fileName;
            if (fileNameSpan && fileName) {
                fileNameSpan.textContent = `Selected: ${fileName}`;
                uploadedFileContainer.classList.remove('hidden');
                uploadedFileContainer.classList.add('flex');
            }
        });

    
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

  //Users buttons=======================================================================
        //add damin
        const addAdminBtn = document.getElementById('add-admin-btn');
        const addAdminPopup = document.getElementById('add-admin-popup');

        const confirmAddAdminBtn = document.getElementById('aa-confirm-btn');
        const adminAddSuccPopup = document.getElementById('add-admin-succ-popup');

        addAdminBtn.addEventListener('click', () => {
        addAdminPopup.style.display = 'flex';
        });

        document.getElementById('add-admin-form').addEventListener('submit', function (e) {
          e.preventDefault();

          const firstName = document.getElementById('first-name-input').value.trim();
          const lastName  = document.getElementById('last-name-input').value.trim();
          const email     = document.getElementById('email-input').value.trim();

         const permissionIds = [
                'view-dashboard', 
                'view-submissions', 'acc-rej-submission',
                'view-inventory', 'add-inventory', 'edit-inventory', 'export-inventory', 'import-inventory',
                'view-accounts', 'edit-permissions', 'add-admin',
                'view-logs',
                'view-backup', 'download-backup', 'allow-restore'
            ];

            const permissions = permissionIds
                .filter(id => document.getElementById(id)?.checked)
                .map(id => id);

            fetch('/admin/users/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    permissions: permissions.join(', ')
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
              if (data.message) {
                  document.getElementById('add-admin-popup').style.display = 'none';
                  document.getElementById('added-admin').textContent = email;
                  document.getElementById('add-admin-succ-popup').style.display = 'flex';
                  fetchUserData(); // refresh table
              } else if (data.errors) {
                  alert('Validation error: ' + Object.values(data.errors).flat().join('\n'));
              }
          })
          .catch(err => {
              console.error(err);
              alert(err);
          });
      });
        

        //confirm delete request
        const deactivatePopup = document.getElementById('confirm-delete-account-popup');
        const step1 = document.getElementById('cda-step1');
        const step2 = document.getElementById('cda-step2');

        document.querySelectorAll('.deactivate-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                deactivatePopup.style.display = 'flex';
            });
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
          fetch('/users/data')
              .then(res => res.json())
              .then(data => {
                  const tbody = document.getElementById('users-table-body');
                  tbody.innerHTML = '';

                  const selectedType = document.querySelector('select[name="accounts-dd"]').value;

                  const filtered = selectedType ? data.filter(u => u.account_type === selectedType) : data;

                  if (filtered.length === 0) {
                      tbody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-gray-500 italic">No users found.</td></tr>`;
                      return;
                  }

                  filtered.forEach((user, idx) => {
                      const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                      const fullName = `${user.first_name || ''} ${user.last_name || ''}`;
                      const program = user.program || '—';
                      const degree = user.degree || '—';
                      const actions = user.account_type === 'admin'
                    ? `<span class="ml-4 text-green-600 underline hover:brightness-110 cursor-pointer">Edit</span>`
                    : '';

                      const row = document.createElement('tr');
                      row.className = rowColor;
                      row.innerHTML = `
                        @if(auth()->user() && auth()->user()->hasPermission('view-accounts'))
                          <td class="px-6 py-4">${fullName}</td>
                          <td class="px-6 py-4">${user.email}</td>
                          <td class="px-6 py-4">${user.account_type.replace('_', ' ')}</td>
                          <td class="px-6 py-4">${program}</td>
                          <td class="px-6 py-4">${degree}</td>
                          <td class="px-6 py-4">${user.status}</td>
                            @if(auth()->user() && auth()->user()->hasPermission('edit-permissions'))
                                <td class="px-6 py-4">${actions}</td>
                            @endif
                        @endif
                      `;
                      tbody.appendChild(row);
                  });

                  showPage('users', 1);
              });
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

    const backupBtn = document.getElementById('backup-btn');
    const backupPopup = document.getElementById('backup-successful-popup');

    if (backupBtn && backupPopup) {
        backupBtn.addEventListener('click', () => {
            backupPopup.style.display = 'flex';
        });
    }



//logout button
    const logoutBtns = document.querySelectorAll('.logout-btn');
    const logoutPopup = document.getElementById('logout-popup');

    logoutBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            logoutPopup.style.display = 'flex';
        });
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

