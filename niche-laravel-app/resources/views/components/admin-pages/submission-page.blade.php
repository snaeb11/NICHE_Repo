
<!-- Submission Table -->
    <main id="submission-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-4">
    @if(auth()->user() && auth()->user()->hasPermission('view-submissions'))
            <h1 class="text-2xl font-bold text-[#575757]">Pending Submission</h1>

            <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                <!-- Program Dropdown -->
                <select name="subs-dd-program" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Programs</option>
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

                <!-- A.Y. Dropdown -->
                <select name="subs-dd-academic_year" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All A.Y.</option>
                </select>

                <!-- History Button -->
                <button id="history-btn" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer">
                    History
                </button>
            </div>
        </div>


        <div class="overflow-x-auto bg-[#fdfdfd] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
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
                            Submitted by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        @if(auth()->user()->hasPermission('acc-rej-submissions'))
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="submission-table-body" class="bg-[#fdfdfd]] divide-y divide-gray-200 text-[#575757]">
                    
                </tbody>
            </table>

            <div id="pagination-controls-submission" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('submission', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"><</button>
                <span id="pagination-info-submission" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('submission', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">></button>
            </div>

        </div>
    @else
        <p class="text-red-600">You have no view permissions for Submissions.</p>

            <select name="subs-dd-program" class="hidden">
                <option value="">N/A</option>
            </select>

            <select name="subs-dd-academic_year" class="hidden">
                <option value="">N/A</option>
            </select>
    @endif
    </main>

    <!-- History Table -->
    <main id="history-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-4">
            <h1 class="text-2xl font-bold text-[#575757]">Submission History</h1>

            <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                <!-- Program Dropdown -->
                <select name="history-dd-program" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All Programs</option>
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

                <!-- A.Y. Dropdown -->
                <select name="history-dd-academic_year" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer">
                    <option value="">All A.Y.</option>
                </select>

                <!-- Pending Button -->
                <button id="pending-btn" class="px-4 py-2 w-full sm:w-auto rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer">
                    Pending
                </button>
            </div>
        </div>


    @if(auth()->user() && auth()->user()->hasPermission('view-submissions'))
        <div class="overflow-x-auto bg-[#fdfdfd] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
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
                <tbody id="history-table-body" class="bg-[#fdfdfd]] divide-y divide-gray-200 text-[#575757]">
                    {{-- <tr>
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
                        <td class="px-6 py-4 whitespace-nowrap">July 02, 2025 13:45</td> --}}
                    </tr>
                </tbody>
            </table>

            <div id="pagination-controls-history" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('history', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"><</button>
                <span id="pagination-info-history" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('history', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">></button>
            </div>

        </div>
    @else
        <p class="text-red-600">You have no view permissions for Submissions.</p>
    @endif
    </main>