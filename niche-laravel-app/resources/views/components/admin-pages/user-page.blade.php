@props(['undergraduate', 'graduate'])
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