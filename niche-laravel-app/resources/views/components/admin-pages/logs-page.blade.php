<!-- Logs Table -->
<main id="logs-table" class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-[#575757]">Logs</h1>
    </div>

    <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
        @if (auth()->user()->hasPermission('view-logs'))
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Name
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Action
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Target table
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Target ID
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Timestamp
                        </th>
                    </tr>
                </thead>
                <tbody id="logs-table-body" class="bg-[#fdfdfd]] divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>
        @else
            <p class="text-red-600">You have no view permissions for Logs.</p>
        @endif
    </div>

    @if (auth()->user()->hasPermission('view-logs'))
        <div id="pagination-controls-logs" class="mt-4 flex justify-end space-x-2">
            <button onclick="changePage('logs', -1)"
                class="rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
            <span id="pagination-info-logs" class="px-3 py-1 text-[#575757]">Page 1</span>
            <button onclick="changePage('logs', 1)"
                class="rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
        </div>
    @endif

</main>
