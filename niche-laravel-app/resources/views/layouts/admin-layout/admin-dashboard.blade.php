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

  // Inventory table
  const invBody = document.getElementById("inventory-table-body");
  if (invBody) {
    invBody.innerHTML += generateRows(20, () => `
      <tr>
        <td class="px-6 py-4 whitespace-normal"><div class="max-w-[10vw] break-words">Inventory ${Math.random().toString(36).substring(6)}</div></td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-normal"><div class="max-w-[20vw] break-words">Sample abstract content for inventory.</div></td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomProgram()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomYear()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomDate()}</td>
        <td class="px-6 py-4 whitespace-nowrap">${randomName()}</td>
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

    <!-- Submission Table -->
    <main id="submission-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Pending Submission</h1>

            <div class="flex space-x-4">
                <!-- Program Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Programs</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCpE">BSCpE</option>
                    <option value="BSCS">BSCS</option>
                </select>

                <!-- S.Y. Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover: cursor-pointer">
                    <option value="">All S.Y.</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>

                <!-- History Button -->
                <button id="history-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer">
                    History
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Author/s
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Abstract
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Adviser
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            S.Y.
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody id="submission-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                    
                </tbody>
            </table>

            <div id="pagination-controls-submission" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('submission', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"><</button>
                <span id="pagination-info-submission" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('submission', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">></button>
            </div>

        </div>
    </main>

    <!-- History Table -->
    <main id="history-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Submission History</h1>

            <div class="flex space-x-4">
                <!-- Program Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Programs</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCpE">BSCpE</option>
                    <option value="BSCS">BSCS</option>
                </select>

                <!-- S.Y. Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover: cursor-pointer">
                    <option value="">All S.Y.</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>

                <!-- Pending Button -->
                <button id="pending-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer">
                    Pending
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Author/s
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Abstract
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Adviser
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            S.Y.
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Remarks
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed at
                        </th>
                    </tr>
                </thead>
                <tbody id="submission-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                    <tr>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[10vw] break-words">
                                SmartFarm: An IoT-Based Monitoring System for Sustainable Agriculture
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos<br>John P. Dela Cruz<br>Angela M. Reyes</td>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[20vw] break-words">
                                This study presents SmartFarm, an IoT-based solution designed to monitor soil moisture, temperature, and humidity in real time to aid small-scale Filipino farmers. Utilizing sensor nodes and a cloud-based dashboard, the system provides timely data for crop management. The goal is to improve yield prediction and resource efficiency through smart agriculture practices.
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Moana L. Tefiti</td>
                        <td class="px-6 py-4 whitespace-nowrap">BSIT</td>
                        <td class="px-6 py-4 whitespace-nowrap">2021</td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos</td>
                        <td class="px-6 py-4 whitespace-nowrap">July 02, 2025 13:45</td>
                    </tr>
                </tbody>
            </table>

            <div id="pagination-controls-history" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('history', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"><</button>
                <span id="pagination-info-history" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('history', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">></button>
            </div>

        </div>
    </main>

    <!-- Inventory Table -->
    <main id="inventory-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Inventory</h1>

            <div class="flex space-x-4">
                <!-- Program Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Programs</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCpE">BSCpE</option>
                    <option value="BSCS">BSCS</option>
                </select>

                <!-- S.Y. Dropdown -->
                <select class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover: cursor-pointer">
                    <option value="">All S.Y.</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>

                <!-- Button -->
                <button id="add-inventory-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer">
                    Add
                </button>

                <button id="import-excel-file" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer">
                    Import
                </button>

                <button id="export-file-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA405] shadow hover:brightness-110 cursor-pointer">
                    Export
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Author/s
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Abstract
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Adviser
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            S.Y.
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed by
                        </th>
                    </tr>
                </thead>
                <tbody id="inventory-table-body" class="bg-[#fffff0] divide-y divide-gray-200 text-[#575757]">
                    <tr>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[10vw] break-words">
                                SmartFarm: An IoT-Based Monitoring System for Sustainable Agriculture
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos<br>John P. Dela Cruz<br>Angela M. Reyes</td>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[20vw] break-words">
                                This study presents SmartFarm, an IoT-based solution designed to monitor soil moisture, temperature, and humidity in real time to aid small-scale Filipino farmers. Utilizing sensor nodes and a cloud-based dashboard, the system provides timely data for crop management. The goal is to improve yield prediction and resource efficiency through smart agriculture practices.
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Moana L. Tefiti</td>
                        <td class="px-6 py-4 whitespace-nowrap">BSIT</td>
                        <td class="px-6 py-4 whitespace-nowrap">2021</td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos</td>
                        <td class="px-6 py-4 whitespace-nowrap">July 02, 2025 13:45</td>
                        <td class="px-6 py-4 whitespace-nowrap">Joe B. Iden</td>
                    </tr>

                </tbody>
            </table>

            <div id="pagination-controls-inventory" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('inventory', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&lt;</button>
                <span id="pagination-info-inventory" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('inventory', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&gt;</button>
            </div>

        </div>
    </main>

    <!-- Add Inventory page -->
    <main id="add-inventory-page" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Add Inventory</h1>

            <button id="backto-inventory-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer">
                    Back
                </button>
        </div>

        <form method="POST" action="{{ route('inventory.store') }}">
            @csrf
            <div class="border-[#c2c2c2] border-1 rounded-xl p-10 pt-0">
                <div class="w-[70vw] px-4 md:px-12 lg:px-20 py-10 mx-auto flex flex-col gap-5 justify-center items-center md:grid md:grid-cols-2 md:grid-rows-4 md:gap-5">

                    <!-- LEFT COLUMN (4 stacked inputs) -->
                    <div class="flex flex-col w-full md:col-start-1 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl mt-13">Title</span>

                        <!-- Textarea -->
                        <textarea
                            name="title"
                            id="thesis-title"
                            placeholder="Thesis title"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="title-scan-btn"
                            data-title = "Title"
                            data-input = "thesis-title"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-2">
                        <span class="text-[#575757] font-semibold text-2xl">Adviser</span>

                        <!-- Textarea -->
                        <textarea
                            name="adviser"
                            id="adviser"
                            placeholder="Adviser"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="adviser-scan-btn"
                            data-title = "Adviser"
                            data-input = "adviser"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-3">
                        <span class="text-[#575757] font-semibold text-2xl">Program</span>

                        <div>
                            <div class="mt-5 relative">
                                <select id="program-select" name="program_id"
                                    class="min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none"
                                    required>
                                    <option value="" disabled selected>Select your program</option>

                                    @if ($undergraduate->isNotEmpty())
                                        <optgroup label="Undergraduate Programs">
                                            @foreach ($undergraduate as $program)
                                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif

                                    @if ($graduate->isNotEmpty())
                                        <optgroup label="Graduate Programs">
                                            @foreach ($graduate as $program)
                                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                </select>
                                <div
                                    class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 transform text-[#575757]">
                                    <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">School Year</span>
                        <div class="relative">
                            <select
                                name="academic_year"
                                class="w-full min-h-[45px] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 text-[#575757] font-light focus:border-[#D56C6C] focus:outline-none appearance-none"
                                required
                            >
                                <option value="" disabled selected>Select year</option>
                                @for ($year = 2025; $year >= 1990; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <div
                                class="pointer-events-none absolute right-3 bottom-1 -translate-y-1/2 transform text-[#575757]">
                                <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl">Author/s</span>

                        <!-- Textarea -->
                        <textarea
                            name="authors"
                            id="authors"
                            placeholder="Authors"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-2 md:row-span-2">
                        <span class="text-[#575757] font-semibold text-2xl">Abstract</span>

                        <!-- Textarea -->
                        <textarea
                            name="abstract"
                            id="abstract"
                            placeholder="Abstract"
                            class="w-full min-h-[41vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="abstract-scan-btn"
                            data-title = "Abstract"
                            data-input = "abstract"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">Upload thesis</span>
                        <button type="button" id="admin-upload-btn" class="mt-4 px-4 py-2 w-full min-h-[45px] rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer">
                            Upload file
                        </button>

                        <!-- dispay when fikle is chosen -->
                        <div id="admin-uploaded-file" class="hidden items-center space-x-2 ml-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span id="adminUp-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-5">
                        <div class="flex justify-end mt-10">
                            <button id="submit-inventory" class="px-6 py-3 rounded-lg bg-[#4CAF50] text-white hover:brightness-110">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Users Table -->
    <main id="users-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Users</h1>

            <div class="flex space-x-4">
                <!-- Button -->
                <button id="add-admin-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer">
                    Add admin
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Account Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Degree
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="users-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>

            <div id="pagination-controls-users" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('users', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&lt;</button>
                <span id="pagination-info-users" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('users', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&gt;</button>
            </div>
        </div>
    </main>

    <!-- Logs Table -->
    <main id="logs-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Logs</h1>
        </div>

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Action
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Target table
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Target ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Timestamp
                        </th>
                    </tr>
                </thead>
                <tbody id="logs-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Mark Cuban</td>
                        <td class="px-6 py-4 whitespace-nowrap">Approved submission</td>
                        <td class="px-6 py-4 whitespace-nowrap">Submissions</td>
                        <td class="px-6 py-4 whitespace-nowrap">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">July 04, 2025 11:31</td>
                </tbody>
            </table>
        </div>

        <div id="pagination-controls-logs" class="flex justify-end mt-4 space-x-2">
            <button onclick="changePage('logs', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">&lt;</button>
            <span id="pagination-info-logs" class="px-3 py-1 text-[#575757]">Page 1</span>
            <button onclick="changePage('logs', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">&gt;</button>
        </div>

    </main>

    <!-- Backup Table -->
    <main id="backup-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Backup</h1>
            
            <div class="flex space-x-4">
                <!-- Button -->
                <button id="backup-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                    Backup
                </button>
                <button id="restore-btn" class="px-4 py-2 rounded-lg text-[#fffff0] bg-gradient-to-r from-[#FFC058] to-[#FFA308] shadow hover:brightness-110 cursor-pointer">
                    Restore
                </button>
            </div>

        </div>
        

        <div class="overflow-x-auto bg-[#fffff0] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fffff0]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            File
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Date Backed-up
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Personnel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody id="backup-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                    <tr>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="pagination-controls-backup" class="flex justify-end mt-4 space-x-2">
            <button onclick="changePage('backup', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&lt;</button>
            <span id="pagination-info-backup" class="px-3 py-1 text-[#575757]">Page 1</span>
            <button onclick="changePage('backup', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&gt;</button>
        </div> 

    </main>
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

  const allTabs = ['submission-table', 'inventory-table', 'users-table', 'logs-table', 'backup-table', 'history-table', 'add-inventory-page'];

  function showOnly(idToShow) {
    allTabs.forEach(id => {
      const section = document.getElementById(id);
      if (section) section.classList.toggle('hidden', id !== idToShow);
    });

    const key = idToShow.replace('-table', '');
    if (document.getElementById(`${key}-table-body`)) {
      showPage(key, 1);
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
  showOnly('submission-table');

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
  //Inventory buttons
    
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

  //Users buttons
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
</script>

