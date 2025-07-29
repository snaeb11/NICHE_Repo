@props(['undergraduate', 'graduate'])
<!-- Users Table -->
    <main id="users-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-4">
            <h1 class="text-2xl font-bold text-[#575757]">Users</h1>

            <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                <!-- Dropdown -->
                 @if(auth()->user() && auth()->user()->hasPermission('view-accounts'))
                <select name="accounts-dd" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Accounts</option>
                </select>
                @else
                    <select name="accounts-dd" class="hidden"></select>
                @endif

                <!-- Button -->
                @if(auth()->user() && auth()->user()->hasPermission('add-admin'))
                    <button id="add-admin-btn" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer">
                        Add admin
                    </button>
                @else
                    <button id="add-admin-btn" class="hidden"></button>
                @endif
            </div>
        </div>


        <div class="overflow-x-auto bg-[#fdfdfd] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                    @if(auth()->user() && auth()->user()->hasPermission('view-accounts'))
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
                    @else
                        <p class="text-red-600">You have no view permissions for Users.</p>
                    @endif
                        @if(auth()->user() && auth()->user()->hasPermission('edit-permissions'))
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                data-column="0" data-order="asc" onclick="sortTable(this)">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody id="users-table-body" class="bg-[#fdfdfd]] divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>
            @if(auth()->user() && auth()->user()->hasPermission('view-accounts'))
                <div id="pagination-controls-users" class="flex justify-end mt-4 space-x-2">
                    <button onclick="changePage('users', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&lt;</button>
                    <span id="pagination-info-users" class="px-3 py-1 text-[#575757]">Page 1</span>
                    <button onclick="changePage('users', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&gt;</button>
                </div>
            @endif
        </div>
    </main>