<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

  // Submission table
  const subBody = document.getElementById("submission-table-body");
  if (subBody) {
    subBody.innerHTML += generateRows(20, () => `
      <tr>
        <td class="px-6 py-4 whitespace-normal"><div class="max-w-[10vw] break-words">Project ${Math.random().toString(36).substring(7)}</div></td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}<br>${randomName()}</td>
        <td class="px-6 py-4 whitespace-normal"><div class="max-w-[20vw] break-words">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div></td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomProgram()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomYear()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomDate()}</td>
        <td class="px-6 py-4 whitespace-nowrap"><button class="text-green-600 hover:underline approve-btn">Approve</button><button class="text-red-600 hover:underline ml-2 decline-btn">Decline</button></td>
      </tr>
    `);
  }

  // Users table
    const usersBody = document.getElementById("users-table-body");
        if (usersBody) {
        usersBody.innerHTML += generateRows(20, () => {
            const name = randomName();
            const email = name.toLowerCase().replace(" ", ".") + "@usep.edu.ph";

            const accountType = Math.random() < 0.5 ? "Client" : "Admin";

            // Status depends on account type
            const clientStatuses = ["Active", "Deactivated", "Pending Deactivation"];
            const adminStatuses = ["Active", "Deactivated"];
            const statusOptions = accountType === "Client" ? clientStatuses : adminStatuses;
            const status = statusOptions[Math.floor(Math.random() * statusOptions.length)];

            // Only show action if Client AND Pending Deactivation
            const showActions = accountType === "Client" && status === "Pending Deactivation";
            const actionButtons = showActions
            ? `<button class="text-red-600 hover:underline ml-2 deactivate-btn">Deactivate</button>`
            : "";

            return `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">${name}</td>
                <td class="px-6 py-4 whitespace-nowrap">${email}</td>
                <td class="px-6 py-4 whitespace-nowrap">${accountType}</td>
                <td class="px-6 py-4 whitespace-nowrap">${randomProgram()}</td>
                <td class="px-6 py-4 whitespace-nowrap">Bachelor</td>
                <td class="px-6 py-4 whitespace-nowrap">${status}</td>
                <td class="px-6 py-4 whitespace-nowrap">${actionButtons}</td>
            </tr>
            `;
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

  // Backup table
  const backupTable = document.querySelector("#backup-table tbody");
  if (backupTable) {
    backupTable.innerHTML += generateRows(15, () => `
      <tr>
        <td class="px-6 py-4 whitespace-nowrap">Backup_${Math.random().toString(36).substring(2, 6)}.zip</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomDate()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-nowrap"><button class="text-green-600 hover:underline cursor-pointer download-backup-btn">Download</button></td>
      </tr>
    `);
  }

  // Re-show correct page
  ['submission', 'inventory', 'users', 'logs', 'backup'].forEach(key => showPage(key, 1));
});
//for data summoning
  document.addEventListener('DOMContentLoaded', () => {
    const tabs = [
      { buttonId: 'submission-tab', sectionId: 'submission-table' },
      { buttonId: 'inventory-tab', sectionId: 'inventory-table' },
      { buttonId: 'users-tab', sectionId: 'users-table' },
      { buttonId: 'logs-tab', sectionId: 'logs-table' },
      { buttonId: 'backup-tab', sectionId: 'backup-table' }
    ];

    const showSection = (idToShow) => {
      tabs.forEach(({ sectionId }) => {
        const section = document.getElementById(sectionId);
        if (section) {
          section.classList.toggle('hidden', sectionId !== idToShow);
        }
      });

      // Recalculate pagination when shown
      const key = idToShow.replace('-table', '');
      if (document.getElementById(`${key}-table-body`)) {
        showPage(key, 1);
      }
    };

    tabs.forEach(({ buttonId, sectionId }) => {
      const btn = document.getElementById(buttonId);
      if (btn) {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          showSection(sectionId);
        });
      }
    });

    showSection('submission-table');
  });
</script>

<body class="bg-[#fffff0] text-gray-900">

    <x-layout-partials.top-gradbar />
    <x-shared.sidebar />

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
    <x-popups.confirm-delete-account-m/>
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

const rowsPerPage = 10;
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

  const allTabs = ['submission-table', 'inventory-table', 'users-table', 'logs-table', 'backup-table', 'history-table', 'add-inventory-page'];

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

    //back to inventory
    const backToInventoryBtn = document.getElementById('backto-inventory-btn');
    if (backToInventoryBtn) {
        backToInventoryBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showOnly('inventory-table');
        });
    }

    //pending switch
    const pendingBtn = document.getElementById('pending-btn');
    if (pendingBtn) {
        pendingBtn.addEventListener('click', (e) => {
        e.preventDefault();
        showOnly('submission-table');
        });
    }

  //side bar
    const usernameBtn = document.getElementById('username');
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
  //Inventory buttons ==============================================================================================
    //year filter
    fetch('/inventory/filters')
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

    // popluate inv table
    function fetchInventoryData() {
        const program = document.querySelector('select[name="inv-dd-program"]').value;
        const year    = document.querySelector('select[name="inv-dd-academic_year"]').value;

        console.log(program, year);

        const params  = new URLSearchParams({ program, year });

        fetch(`/inventory/data?${params.toString()}`)
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById('inventory-table-body');
                tbody.innerHTML = ''; // Clear old rows

                data.forEach((item, idx) => {
                    const rowColor = idx % 2 === 0 ? 'bg-[#fffff0]' : 'bg-orange-50';
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
                        <td class="px-6 py-4 whitespace-nowrap">${item.program?.name || ''}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.academic_year}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.submission?.submitted_by || ''}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.archived_at)}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${item.archiver?.name || ''}</td>
                    `;
                    tbody.appendChild(row);

                    // Abstract row (initially hidden)
                    const abstractRow = document.createElement('tr');
                    abstractRow.id = abstractRowId;
                    abstractRow.className = `hidden`;
                    abstractRow.innerHTML = `
                        <td colspan="9" class="px-6 py-3 text-sm text-gray-700 bg-gray-50 ${rowColor}">
                            ${item.abstract}
                        </td>
                    `;
                    tbody.appendChild(abstractRow);
                });
            });
    }

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

        confirmAddAdminBtn.addEventListener('click', () => {
            addAdminPopup.style.display = 'none';
            adminAddSuccPopup.style.display = 'flex';
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

  //Backup buttons
        //download backup popup
    const downloadBackupBtn = document.getElementById('download-backup-btn');
    const downloadBackupPopup = document.getElementById('backup-download-popup');

    document.querySelectorAll('.download-backup-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            downloadBackupPopup.style.display = 'flex';
        });
    });

    //backup successful popup
    const backupBtn = document.getElementById('backup-btn');
    const backupPopup = document.getElementById('backup-successful-popup');
    backupBtn.addEventListener('click', () => {
        backupPopup.style.display = 'flex';
    });

    //restore backup popup
    const restoreBtn = document.getElementById('restore-btn');
    const restorePopup = document.getElementById('import-restore-popup');
    restoreBtn.addEventListener('click', () => {
        const step1 = document.getElementById('ir-step-1');
        const step2 = document.getElementById('ir-step-2');

        step1.classList.remove('hidden');
        step2.classList.add('hidden');
        restorePopup.style.display = 'flex';
    });


//logout button
    const logoutBtn = document.getElementById('logout-btn');
    const logoutPopup = document.getElementById('logout-popup');
    logoutBtn.addEventListener('click', () => {
        logoutPopup.style.display = 'flex';
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

