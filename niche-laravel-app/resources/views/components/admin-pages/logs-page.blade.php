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